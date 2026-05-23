@props(['product'])

<article class="ne-card ne-reveal" data-reveal>
    <a class="ne-card__link" href="#" aria-label="{{ $product->name }}">
        <div class="ne-card__media">
            <img
                loading="lazy"
                class="ne-card__img"
                src="{{ asset($product->image) }}"
                alt="{{ $product->name }}"
                width="900"
                height="900"
            />
        </div>

        <div class="ne-card__body">
            <div class="ne-card__top">
                <h3 class="ne-card__title">{{ $product->name }}</h3>
                <p class="ne-card__price">${{ number_format((float) $product->price, 2) }}</p>
            </div>
            <p class="ne-card__meta">{{ $product->category }}</p>
        </div>
    </a>
</article>

