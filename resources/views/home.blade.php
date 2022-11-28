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
                    Check and rate all of Parlament's drink!
                </div>
                <div class="promo__content__links">
                    <a href="{{ config('app.url', '/') }}/drinks" class="button button__primary">All Drinks</a>
                    <a href="{{ config('app.url', '/') }}/login" class="button button__secondary">Login</a>
                </div>
            </div>
        </div>
    </div>

    <div class="top4">
        <div class="top4__description">
            <h1 class="top4__description__title">Best Rated Cocktails</h1>
            <div class="top4__description__body">
                Check out four best rated cocktails!
            </div>
            <div class="top4__description__links">
                <a href="{{ config('app.url', '/') }}/drinks" class="button button__primary">All Drinks</a>
            </div>
        </div>

        <x-cocktail-grid class="top4__inner" :cocktails="$drinks" />
        
    </div>

    <div class="registerinfo">
        <h1 class="registerinfo__title">Sign up</h1>
        <div class="registerinfo__body">
            When you sign up, you will be able to:
            <ul>
                <li>Rate cocktails</li>
                <li>Save cocktails to your personal collection</li>
            </ul>
        </div>
        <div class="registerinfo__links">
            <a href="{{ config('app.url', '/') }}/login" class="button button__primary">Login</a>
        </div>
    </div>
</x-app-layout>