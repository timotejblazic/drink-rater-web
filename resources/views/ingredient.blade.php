<x-app-layout>
    <x-slot:pageTitle>
        {{ config('app.name', 'Laravel') }} - Add Ingredient
    </x-slot>

    <div class="drinkadd">
        <h1 class="drinkadd__title">Add New Ingredient</h1>
        <div class="drinkadd__main">
            @auth
                <form action="{{ config('app.url', '/') }}/ingredient/add" method="POST" class="drinkadd__form">
                    @csrf
                    <div class="drinkadd__form__item">
                        <label for="nameIngredient" class="drinkadd__form__label">Name</label>
                        <input type="text" name="name" id="nameIngredient" class="drinkadd__form__input">
                    </div>

                    <div class="drinkadd__form__item">
                        <button class="drinkadd__form__button button button__primary">
                            Add ingredient
                        </button>
                    </div>
                </form>
            @endauth
        </div>
        <div class="drinkadd__ingredients">
            <h2>List of ingredients</h2>
            @foreach ($ingredients as $ingredient)
                <p>{{ $ingredient->id }} - {{ $ingredient->name }}</p>
            @endforeach
        </div>


    </div>
</x-app-layout>
