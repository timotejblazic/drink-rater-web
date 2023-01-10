<x-app-layout>
    <x-slot:pageTitle>
        {{ config('app.name', 'Laravel') }}
    </x-slot>

    <div class="promo full-width">
        <div class="promo__media">
            <picture>
                <source media="(min-width:820px)" srcset="{{ asset('images/promo/promo.jpg') }}">
                <img src="{{ asset('images/promo/promo_mobile.jpg') }}" alt="Promo">
            </picture>



        </div>
        <div class="promo__content">
            <div class="promo__content__inner">
                <h1 class="promo__content__heading">Welcome to Parlament Drinks</h1>
                <div class="promo__content__body">
                    Check and rate all of Parlament's drinks!
                </div>
                <div class="promo__content__links">
                    <a href="{{ route('drinks') }}" class="button button__primary">All Drinks</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="button button__secondary">Favorites</a>
                    @else
                        <a href="{{ route('register') }}" class="button button__secondary">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <div class="advantages section">
        <h3 class="advantages__description__title">Join the community</h3>
        <div class="advantages__items">
            <div class="advantages__item">
                <div class="advantages__item__icon">
                    <img src="{{ asset('images/svgs/rating-star-empty.svg') }}" alt="advantages1" width="40" height="40">
                </div>
                <div class="advantages__item__content">
                    Rate every drink you've tried. Good or bad.
                </div>
            </div>

            <div class="advantages__item">
                <div class="advantages__item__icon">
                    <img src="{{ asset('images/svgs/comment.svg') }}" alt="advantages1" width="40" height="40">
                </div>
                <div class="advantages__item__content">
                    Leave comments and share your experience.
                </div>
            </div>

            <div class="advantages__item">
                <div class="advantages__item__icon">
                    <img src="{{ asset('images/svgs/favorite-heart-empty.svg') }}" alt="advantages1" width="40" height="40">
                </div>
                <div class="advantages__item__content">
                    Save your favorite drinks and check them out anytime.
                </div>
            </div>

        </div>
    </div>

    <div class="search section">
        <h3 class="search__title">Search for specific cocktail</h3>
        <div class="search__wrap">
            <!-- form for searching specific drink by name -->
            <form action="{{ route('drinks') }}" method="GET" class="search__form">

                <!-- search keywords -->
                <div class="search__form__search">
                    <input type="text" name="q" placeholder="Search drink..." class="search__form__search__input">
                </div>
                
                <!-- submit button -->
                <div class="search__form__submit">
                    <button type="submit" class="search__form__submit__button">
                        <span class="search__form__submit__button__icon"></span>
                    </button>
                </div>
            
            </form>
        </div>
    </div>

    <div class="top4 section">
        <div class="top4__description">
            <h3 class="top4__description__title">Best Rated Cocktails</h3>
            <div class="top4__description__body">
                Check out four best rated cocktails!
            </div>
            <div class="top4__description__links">
                <a href="{{ config('app.url', '/') }}/drinks" class="button button__primary">All Drinks</a>
            </div>
        </div>

        <x-cocktail-grid class="top4__inner" :cocktails="$drinks" />
        
    </div>
</x-app-layout>