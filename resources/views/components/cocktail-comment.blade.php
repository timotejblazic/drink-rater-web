@props(['comment'])

<div class="drink__comments__item">
    <div class="drink__comments__item__header">
        <div class="drink__comments__item__header__left">
            <div class="drink__comments__item__header__name">
                <a href="#">{{ $comment->user->name }}</a>
            </div>
            <div class="drink__comments__item__header__rating">Z Z Z Z Z</div>
        </div>
        <div class="drink__comments__item__header__right">
            <div class="drink__comments__item__header__date">Posted {{ $comment->created_at }}</div>
        </div>
    </div>
    <div class="drink__comments__item__body">
        {{ $comment->body }}
    </div>
</div>