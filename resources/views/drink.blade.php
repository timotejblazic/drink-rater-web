<x-app-layout>
    <x-slot:pageTitle>
        {{ config('app.name', 'Laravel') }} - Drink
    </x-slot>

    <div class="drink">
        <div class="drink__header">
            <div class="drink__header__top">
                <a href="{{ config('app.url', '/') }}/drinks" class="drink__header__back">
                    Back to All Drinks
                </a>
            </div>

            <div class="drink__header__bottom">
                <h2 class="drink__header__title">{{ $drink->name }}</h2>
                <div class="drink__header__rating">Z Z Z Z Z</div>
            </div>
            
        </div>

        <div class="drink__info">
            <div class="drink__media">
                <img src="{{ asset('images/cocktails/' . $drink->image) }}" alt="drink" width="200" height="250">
            </div>
            <div class="drink__description">
                <h2 class="drink__description__title">{{ $drink->name }}</h2>
                <div class="drink__description__body">
                    Drink is made of:
                    <ul>
                        <li>Vodka</li>
                        <li>Rum</li>
                        <li>Orange juice</li>
                        <li>Red Bull</li>
                        <li>Monster</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="drink__comments">
            <h2 class="drink__comments__title">
                Comments
            </h2>
            <h4 class="drink__comments__subtitle">

                @auth
                    <form class="drink__comments__form" method="POST" action="{{ config('app.url', '/') }}/drink/{{ $drink->id }}/comment">
                        @csrf
                        <header class="drink__comments__form__header">
                            <img class="drink__comments__form__header__image" src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" >
                            <h3 class="drink__comments__form__header__text">Want to participate?</h3>
                        </header>

                        <div class="drink__comments__form__body">
                            <textarea name="body"
                                    class="drink__comments__form__body__textarea"
                                    rows="5"
                                    placeholder="What do you think about this drink?"
                                    required></textarea>

                            @error('body')
                                <span class="drink__comments__form__error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="drink__comments__form__footer">
                            <button class="button button__primary">Submit</button>
                        </div>
                    </form>
                @else
                    <a href="{{ config('app.url', '/') }}/login">Log in</a> to post a comment
                @endauth

            </h4>
            <div class="drink__comments__body">
                

                <!-- COCKTAIL COMMENTS -->

                @if ($drink->comments->count())
                    @foreach ($drink->comments as $comment)
                        <x-cocktail-comment :comment="$comment" />
                    @endforeach
                @else
                    <div class="drink__comments__body__empty">
                        <i>No comments yet.</i>
                    </div>
                @endif
                
            </div>
        </div>
    </div>


</x-app-layout>  