@props(['rating'])

<div class="rating__item">
    <div class="rating__item__left">
        <div class="rating__item__left__name">
            <a href="{{ route('drink', ['drink' => $rating->cocktail->id ]) }}">{{ $rating->cocktail->name }}</a>
        </div>
        <div class="rating__item__left__rating">
            <span class="rating__item__left__rating__number" style="display:none;">{{ $rating->rating }}</span>
            <div class="rating__item__left__rating__star" data-rating="1"></div>
            <div class="rating__item__left__rating__star" data-rating="2"></div>
            <div class="rating__item__left__rating__star" data-rating="3"></div>
            <div class="rating__item__left__rating__star" data-rating="4"></div>
            <div class="rating__item__left__rating__star" data-rating="5"></div>
        </div>
    </div>
    <div class="rating__item__right">
        <div class="rating__item__header__date">Posted {{ $rating->updated_at }}</div>
    </div>
</div>



