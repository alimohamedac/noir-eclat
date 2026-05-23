(() => {
  const prefersReducedMotion =
    typeof window !== "undefined" &&
    window.matchMedia &&
    window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  const toggle = document.querySelector("[data-ne-nav-toggle]");
  const nav = document.getElementById("ne-nav");

  // Reveal on scroll
  try {
    const revealEls = Array.from(document.querySelectorAll("[data-reveal]"));
    if (revealEls.length) {
      revealEls.forEach((el, i) => {
        if (!el.classList.contains("ne-reveal")) el.classList.add("ne-reveal");
        if (!el.getAttribute("data-reveal-delay")) {
          el.setAttribute("data-reveal-delay", String((i % 3) + 1));
        }
      });

      if (prefersReducedMotion) {
        revealEls.forEach((el) => el.classList.add("is-in"));
      } else if ("IntersectionObserver" in window) {
        const revealInView = () => {
          for (const el of revealEls) {
            if (el.classList.contains("is-in")) continue;
            const r = el.getBoundingClientRect();
            const inView = r.bottom > 0 && r.top < window.innerHeight * 0.92;
            if (inView) el.classList.add("is-in");
          }
        };

        const io = new IntersectionObserver(
          (entries) => {
            for (const entry of entries) {
              if (entry.isIntersecting) {
                entry.target.classList.add("is-in");
                io.unobserve(entry.target);
              }
            }
          },
          { root: null, threshold: 0.12, rootMargin: "0px 0px -10% 0px" },
        );
        revealEls.forEach((el) => io.observe(el));

        // Fallback: ensure nothing (like the footer) gets stuck hidden.
        let raf = 0;
        const schedule = () => {
          if (raf) return;
          raf = window.requestAnimationFrame(() => {
            raf = 0;
            revealInView();
          });
        };
        window.addEventListener("scroll", schedule, { passive: true });
        window.addEventListener("resize", schedule, { passive: true });
        schedule();
      } else {
        revealEls.forEach((el) => el.classList.add("is-in"));
      }
    }
  } catch {
    // non-critical
  }

  // Micro-interactions: ripple
  const addRipple = (el, e) => {
    if (prefersReducedMotion) return;
    const rect = el.getBoundingClientRect();
    const ink = document.createElement("span");
    ink.className = "ne-ripple__ink";
    ink.style.left = `${e.clientX - rect.left}px`;
    ink.style.top = `${e.clientY - rect.top}px`;
    el.appendChild(ink);
    window.setTimeout(() => ink.remove(), 650);
  };

  document.addEventListener(
    "pointerdown",
    (e) => {
      const target = e.target?.closest?.(".ne-ripple");
      if (target) addRipple(target, e);
    },
    { passive: true },
  );

  // Card spotlight (CSS vars for radial gradient)
  const cards = Array.from(document.querySelectorAll(".ne-card"));
  if (!prefersReducedMotion && cards.length) {
    for (const card of cards) {
      card.addEventListener(
        "pointermove",
        (e) => {
          const r = card.getBoundingClientRect();
          const mx = ((e.clientX - r.left) / r.width) * 100;
          const my = ((e.clientY - r.top) / r.height) * 100;
          card.style.setProperty("--mx", `${mx}%`);
          card.style.setProperty("--my", `${my}%`);
        },
        { passive: true },
      );
    }
  }

  // Smooth in-page navigation and active section highlighting
  const navLinks = Array.from(document.querySelectorAll("[data-ne-nav-link]"));
  const sectionIds = ["collections", "lookbook", "about"];
  const sections = sectionIds
    .map((id) => document.getElementById(id))
    .filter(Boolean);

  if (!prefersReducedMotion) {
    document.addEventListener("click", (e) => {
      const a = e.target?.closest?.('a[href^="#"]');
      if (!a) return;
      const href = a.getAttribute("href");
      if (!href || href.length < 2) return;
      const target = document.getElementById(href.slice(1));
      if (!target) return;
      e.preventDefault();
      target.scrollIntoView({ behavior: "smooth", block: "start" });
      history.replaceState(null, "", href);
    });
  }

  const setActive = (id) => {
    for (const link of navLinks) {
      const href = link.getAttribute("href") || "";
      link.classList.toggle("is-active", href === `#${id}`);
    }
  };

  if (sections.length && "IntersectionObserver" in window) {
    const io = new IntersectionObserver(
      (entries) => {
        const visible = entries
          .filter((x) => x.isIntersecting)
          .sort((a, b) => b.intersectionRatio - a.intersectionRatio)[0];
        if (visible?.target?.id) setActive(visible.target.id);
      },
      { threshold: [0.2, 0.35, 0.5], rootMargin: "-20% 0px -60% 0px" },
    );
    sections.forEach((s) => io.observe(s));
  }

  // Mobile nav toggle
  if (!toggle || !nav) return;

  const setOpen = (open) => {
    nav.classList.toggle("is-open", open);
    toggle.setAttribute("aria-expanded", open ? "true" : "false");
  };

  toggle.addEventListener("click", () => {
    const open = nav.classList.contains("is-open");
    setOpen(!open);
  });

  nav.addEventListener("click", (e) => {
    const a = e.target?.closest?.("a");
    if (a) setOpen(false);
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") setOpen(false);
  });

  window.addEventListener(
    "resize",
    () => {
      if (window.innerWidth > 640) setOpen(false);
    },
    { passive: true },
  );
})();

