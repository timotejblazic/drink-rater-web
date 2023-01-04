<x-app-layout>
    <x-slot:pageTitle>
        {{ config('app.name', 'Laravel') }} - Add Drink
    </x-slot>

    <div class="drinkadd">
        <h1 class="drinkadd__title">Add New Drink</h1>
        <div class="drinkadd__main">
            @auth
                <form action="{{ route('drinkadd') }}" method="POST" class="drinkadd__form" enctype="multipart/form-data">
                    @csrf
                    <div class="drinkadd__form__item">
                        <label for="name" class="drinkadd__form__label">Name</label>
                        <input type="text" name="name" id="name" class="drinkadd__form__input">
                    </div>
                    @error('name')
                        <p class="drinkadd__form__item__error">{{ $message }}</p>
                    @enderror
                    
                    <div class="drinkadd__form__item">
                        <label for="description" class="drinkadd__form__label">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="drinkadd__form__input"></textarea>
                    </div>
                    @error('description')
                        <p class="drinkadd__form__item__error">{{ $message }}</p>
                    @enderror

                    <div class="drinkadd__form__item">
                        <label for="image" class="drinkadd__form__label">Choose image</label>
                        <input type="file" name="image" id="image" class="drinkadd__form__input">
                    </div>
                    @error('image')
                        <p class="drinkadd__form__item__error">{{ $message }}</p>
                    @enderror
                    
                    <div class="drinkadd__form__checkbox">
                        <div class="drinkadd__form__checkbox__text">Choose ingredients:</div>
                        <div class="drinkadd__form__checkbox__wrap">
                            @foreach ($ingredients as $ingredient)
                                <div class="drinkadd__form__checkbox__item">
                                    <input type="checkbox" name="ingredient[]" id="ingredient-{{ $ingredient->id }}" value="{{ $ingredient->id }}" class="drinkadd__form__checkbox__input">
                                    <label for="ingredient-{{ $ingredient->id }}" class="drinkadd__form__checkbox__label">{{ $ingredient->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('ingredient')
                            <p class="drinkadd__form__item__error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="drinkadd__form__item">
                        <button class="drinkadd__form__button button button__primary">
                            Add drink
                        </button>
                    </div>

                </form>
            @endauth
        </div>

        <h1 class="drinkadd__title">Add New Ingredient</h1>
        <div class="drinkadd__main">
            @auth
                <form action="{{ route('drinkaddIngredient') }}" method="POST" class="drinkadd__form">
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
            

    </div>
</x-app-layout>