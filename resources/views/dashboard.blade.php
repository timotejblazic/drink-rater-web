<x-app-layout>
    <x-slot:pageTitle>
        {{ config('app.name', 'Laravel') }} - Dashboard
    </x-slot>

    <div class="dashboard">
        <div class="dashboard__inner">
            <div class="dashboard__header white-box">
                <h3 class="dashboard__header__title">Welcome to your profile, <span>{{ Auth::user()->name }}</span>!</h3>
            </div>
            @if (Auth::user()->isAdmin())
            <div class="dashboard__admin white-box">
                <a href="{{ route('drinkadd') }}" class="dashboard__admin__link button button__primary">Add Drinks</a>
            </div>
            @endif
            <div class="dashboard__body">
                <div class="dashboard__nav">
                    <div class="dashboard__nav__item active">
                        <button class="dashboard__nav__link" data-content="myProfile">My Profile</button>
                    </div>
                    <div class="dashboard__nav__item">
                        <button class="dashboard__nav__link" data-content="favoriteDrinks">Favorite Drinks</button>
                    </div>
                    <div class="dashboard__nav__item">
                        <button class="dashboard__nav__link" data-content="myRatings">My Ratings</button>
                    </div>
                    <div class="dashboard__nav__item">
                        <button class="dashboard__nav__link" data-content="myComments">My Comments</button>
                    </div>
                </div>

                <!-- ACCORDION MENU FOR MOBILE -->
                <div class="accordion">
                    <a class="accordion__title" href="#">
                        <span class="accordion__title__content">My Profile</span>
                        <span class="accordion__title__arrow"></span>
                    </a>
                    <div class="accordion__content">
                        <div class="dashboard__nav__item active">
                            <button class="dashboard__nav__link" data-content="myProfile">My Profile</button>
                        </div>
                        <div class="dashboard__nav__item">
                            <button class="dashboard__nav__link" data-content="favoriteDrinks">Favorite Drinks</button>
                        </div>
                        <div class="dashboard__nav__item">
                            <button class="dashboard__nav__link" data-content="myRatings">My Ratings</button>
                        </div>
                        <div class="dashboard__nav__item">
                            <button class="dashboard__nav__link" data-content="myComments">My Comments</button>
                        </div>
                    </div>
                </div>
                <!-- ACCORDION MENU FOR MOBILE -->


                <div class="dashboard__content white-box">
                    <div class="dashboard__content__item active" id="myProfile">
                        My profile content
                    </div>

                    <div class="dashboard__content__item" id="favoriteDrinks">
                        @if (Auth::user()->favorites->count())
                            @php
                                $cocktails = Auth::user()->getFavoriteDrinks();
                            @endphp
                            <x-cocktail-grid class="top4__inner" :cocktails="$cocktails" />
                        @else
                            <div class="dashboard__content__item__empty">
                                <i>No favorite drinks yet.</i>
                            </div>
                        @endif
                    </div>

                    <div class="dashboard__content__item" id="myRatings">
                        @if (Auth::user()->ratings->count())
                            @foreach (Auth::user()->ratings as $rating)
                                <x-user-rating :rating="$rating" />
                            @endforeach
                        @else
                            <div class="dashboard__content__item__empty">
                                <i>No ratings yet.</i>
                            </div>
                        @endif
                    </div>

                    <div class="dashboard__content__item" id="myComments">
                        @if (Auth::user()->comments->count())
                            @foreach (Auth::user()->comments as $comment)
                                <x-user-comment :comment="$comment" />
                            @endforeach
                        @else
                            <div class="dashboard__content__item__empty">
                                <i>No comments yet.</i>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
