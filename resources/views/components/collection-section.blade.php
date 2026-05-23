<main class="ne-main">
    <section id="collections" class="ne-section ne-reveal" data-reveal aria-label="Featured products">
        <div class="ne-container">
            <div class="ne-section__head ne-reveal" data-reveal>
                <h2 class="ne-h2">Featured</h2>
                <p class="ne-muted">A curated edit of our latest pieces.</p>
            </div>

            <div class="ne-grid">
                {{ $slot }}
            </div>
        </div>
    </section>

    <section id="lookbook" class="ne-section ne-reveal" data-reveal aria-label="Lookbook">
        <div class="ne-container">
            <div class="ne-section__head ne-reveal" data-reveal>
                <h2 class="ne-h2">Lookbook</h2>
                <p class="ne-muted">Silhouettes, textures, and light.</p>
            </div>

            <div class="ne-lookbook">
                @foreach ([1, 2, 3, 4, 5, 6] as $i)
                    <figure class="ne-lookbook__item ne-reveal" data-reveal>
                        <img
                            loading="lazy"
                            class="ne-lookbook__img"
                            src="{{ asset("images/lookbook/lookbook-$i.png") }}"
                            alt="Lookbook image {{ $i }}"
                            width="1200"
                            height="1200"
                        />
                    </figure>
                @endforeach
            </div>
        </div>
    </section>

    <section id="about" class="ne-section ne-section--tight ne-reveal" data-reveal aria-label="About NOIR ÉCLAT">
        <div class="ne-container ne-about ne-surface">
            <div class="ne-about__copy ne-reveal" data-reveal>
                <h2 class="ne-h2">Craft, refined</h2>
                <p class="ne-muted">
                    NOIR ÉCLAT blends modern minimalism with rich materials—designed to elevate everyday rituals.
                </p>
            </div>
            <div class="ne-about__media ne-reveal" data-reveal>
                <img
                    loading="lazy"
                    class="ne-about__img"
                    src="{{ asset('images/lookbook/story-craft.png') }}"
                    alt="Craft story"
                    width="1200"
                    height="900"
                />
            </div>
        </div>
    </section>
</main>

