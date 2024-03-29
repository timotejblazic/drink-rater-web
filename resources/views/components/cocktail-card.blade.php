@props(['cocktail'])

<div class="cocktail">
    <a class="cocktail__overlay" href="{{ config('app.url', '/') }}/drink/{{ $cocktail->id }}"></a>
    <div class="cocktail__media">

        <div class="cocktail__media__favorites">
            <form class="drink__favorite__form favorite__form" method="POST" action="{{ config('app.url', '/') }}/drink/{{ $cocktail->id }}/favorite">
                @csrf
                <button class="drink__favorite__form__button favorite__form__button">
                    @auth
                        @if ($cocktail->favorites()->where('user_id', auth()->user()->id)->exists())
                            <span class="drink__favorite__form__button__heart favorite__form__button__heart active"></span>
                        @else
                            <span class="drink__favorite__form__button__heart favorite__form__button__heart"></span>
                        @endif
                    @else
                        <span class="drink__favorite__form__button__heart favorite__form__button__heart"></span>
                    @endauth
                </button>
            </form>
        </div>

        <img src="{{ asset('storage/') }}/{{ $cocktail->image }}" alt="cocktail" width="100" height="150">
    </div>
    <div class="cocktail__name">
        <span class="cocktail__name__text">
            {{ $cocktail->name }}
        </span>
    </div>
    <x-cocktail-rating :drink="$cocktail" />
</div>