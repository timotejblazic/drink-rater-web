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
                    <!-- form for searching specific drink by name -->
                    <form action="{{ route('drinks') }}" method="GET" class="drinks__aside__form">
                        <!-- if there is get parameter 'o', put it in hidden input -->
                        @if (request()->has('o'))
                            <input type="hidden" name="o" value="{{ request()->o }}">
                        @endif

                        <!-- search keywords -->
                        <div class="drinks__aside__search">
                            <input type="text" name="q" placeholder="Search drink..." class="drinks__aside__search__input"
                                value="{{ request()->has('q') ? request()->q : '' }}">
                        </div>

                        <!-- filter by ingredients -->
                        <div class="drinks__aside__ingredients">
                            <div class="drinks__aside__ingredients__title">Ingredients</div>
                            <div class="drinks__aside__ingredients__list">
                                @foreach ($ingredients as $ingredient)
                                    <div class="drinks__aside__ingredients__list__item">
                                        <input type="checkbox"
                                            name="i[]"
                                            value="{{ $ingredient->id }}" 
                                            id="ingredient-{{ $ingredient->id }}"
                                            class="drinks__aside__ingredients__list__item__checkbox"
                                            {{ request()->has('i') && in_array($ingredient->id, request()->i) ? 'checked' : ''}}
                                            >
                                        <label for="ingredient-{{ $ingredient->id }}" class="drinks__aside__ingredients__list__item__label">{{ $ingredient->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        

                        <!-- submit button -->
                        <div class="drinks__aside__submit">
                            <button type="submit" class="drinks__aside__submit__button button button__primary">Confirm</button>
                        </div>
                        
                    </form>
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
                        @php
                            $search = request()->has('q') ? request()->q : '';
                            $ingredients = request()->has('i') ? request()->i : [];
                        @endphp
                        <div class="dropdown__title">Order By:</div>
                        <div class="dropdown__menu">
                            <a href="{{ route('drinks', ['o'=>'name', 'q'=>$search, 'i'=>$ingredients]) }}" class="dropdown__link">Name DESC</a>
                            <a href="{{ route('drinks', ['o'=>'_name', 'q'=>$search, 'i'=>$ingredients]) }}" class="dropdown__link">Name ASC</a>
                            <a href="{{ route('drinks', ['o'=>'rating', 'q'=>$search, 'i'=>$ingredients]) }}" class="dropdown__link">Rating DESC</a>
                            <a href="{{ route('drinks', ['o'=>'_rating', 'q'=>$search, 'i'=>$ingredients]) }}" class="dropdown__link">Rating ASC</a>
                        </div>
                    </div>
                </div>
            </div>

            <x-cocktail-grid :cocktails="$drinks" />
        </div>
    </div>

</x-app-layout>