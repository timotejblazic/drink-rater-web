<x-app-layout>
    <x-slot:pageTitle>
        {{ config('app.name', 'Laravel') }} - Dashboard
    </x-slot>

    <div class="dashboard">
        <div class="dashboard__inner">
            <div class="dashboard__header white-box">
                <h3 class="dashboard__header__title">Welcome to your profile, <span>{{ Auth::user()->name }}</span>!</h3>
            </div>
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
                    <a class="accordion__title" href="#">Navigation</a>
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
                        My favorite drinks content
                    </div>
                    <div class="dashboard__content__item" id="myRatings">
                        My ratings content
                    </div>
                    <div class="dashboard__content__item" id="myComments">
                        My comments content
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
