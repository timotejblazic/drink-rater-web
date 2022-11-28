@props(['cocktail'])

<div class="cocktail">
    <a class="cocktail__overlay" href="{{ config('app.url', '/') }}/drink/{{ $cocktail->id }}"></a>
    <div class="cocktail__media">
        <img src="{{ asset('images/cocktails/' . $cocktail->image) }}" alt="Promo" width="100" height="150">
    </div>
    <div class="cocktail__name">
        {{ $cocktail->name }}
    </div>
</div>