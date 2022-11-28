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
                <span class="drink__comments__subtitle"><a href="{{ config('app.url', '/') }}/login">Log in</a> to post a comment</span>
            </h2>
            <div class="drink__comments__body">
                

                <div class="drink__comments__item">
                    <div class="drink__comments__item__header">
                        <div class="drink__comments__item__header__left">
                            <div class="drink__comments__item__header__name">
                                <a href="#">John Doe</a>
                            </div>
                            <div class="drink__comments__item__header__rating">Z Z Z Z Z</div>
                        </div>
                        <div class="drink__comments__item__header__right">
                            <div class="drink__comments__item__header__date">12.12.2020</div>
                        </div>
                    </div>
                    <div class="drink__comments__item__body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                    </div>
                </div>


                <div class="drink__comments__item">
                    <div class="drink__comments__item__header">
                        <div class="drink__comments__item__header__left">
                            <div class="drink__comments__item__header__name">John Doe</div>
                            <div class="drink__comments__item__header__rating">Z Z Z Z Z</div>
                        </div>
                        <div class="drink__comments__item__header__right">
                            <div class="drink__comments__item__header__date">12.12.2020</div>
                        </div>
                    </div>
                    <div class="drink__comments__item__body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                    </div>
                </div>


                <div class="drink__comments__item">
                    <div class="drink__comments__item__header">
                        <div class="drink__comments__item__header__left">
                            <div class="drink__comments__item__header__name">John Doe</div>
                            <div class="drink__comments__item__header__rating">Z Z Z Z Z</div>
                        </div>
                        <div class="drink__comments__item__header__right">
                            <div class="drink__comments__item__header__date">12.12.2020</div>
                        </div>
                    </div>
                    <div class="drink__comments__item__body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                    </div>
                </div>




                
            </div>
        </div>
    </div>


</x-app-layout>  