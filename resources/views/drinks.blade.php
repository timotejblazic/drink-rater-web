<x-app-layout>
    <x-slot:pageTitle>
        {{ config('app.name', 'Laravel') }} - Drinks
    </x-slot>

    <div class="drinks">
        <aside class="drinks__aside">
            <div class="accordion">
                <a class="accordion__title" href="#">
                    <span class="accordion__title__content">Filtri</span>
                    <span class="accordion__title__arrow"></span>
                </a>
                <div class="accordion__content">
                    This is accordion content
                </div>
            </div>
        </aside>

        <div class="drinks__main">
            <h1 class="drinks__main__title">All Drinks</h1>

            <div class="drinks__list__header">
                <div class="drinks__list__header__number">
                    {{ $drinks->count() }} drinks
                </div>
                <div class="drinks__list__header__order">
                    <div class="dropdown">
                        <div class="dropdown__title">Order By:</div>
                        <div class="dropdown__menu">
                            <a href="{{ route('drinksOrderBy', 'o=name') }}" class="dropdown__link">Name DESC</a>
                            <a href="{{ route('drinksOrderBy', 'o=_name') }}" class="dropdown__link">Name ASC</a>
                            <a href="{{ route('drinksOrderBy', 'o=rating') }}" class="dropdown__link">Rating DESC</a>
                            <a href="{{ route('drinksOrderBy', 'o=_rating') }}" class="dropdown__link">Rating ASC</a>
                        </div>
                    </div>
                </div>
            </div>

            <x-cocktail-grid :cocktails="$drinks" />
        </div>
    </div>

</x-app-layout>