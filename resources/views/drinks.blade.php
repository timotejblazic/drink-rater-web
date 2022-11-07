<x-app-layout>
    <x-slot:pageTitle>
        {{ config('app.name', 'Laravel') }} - Drinks
    </x-slot>

    <div class="drinks">
        <aside class="drinks__aside">
            <div class="accordion">
                <a class="accordion__title" href="#">Filtri</a>
                <div class="accordion__content">
                    This is accordion content
                </div>
            </div>
        </aside>

        <div class="drinks__main">
            <h1 class="drinks__main__title">All Drinks</h1>

            <div class="drinks__list__header">
                <div class="drinks__list__header__number">
                    25 items
                </div>
                <div class="drinks__list__header__order">
                    Order By:
                </div>
            </div>

            <div class="drinks__list__items">
                <x-cocktail />
                <x-cocktail />
                <x-cocktail />
                <x-cocktail />
                <x-cocktail />
                <x-cocktail />
                <x-cocktail />
            </div>
        </div>
    </div>

</x-app-layout>