@props(['comment'])

<div class="drink__comments__item">
    <div class="drink__comments__item__header">
        <div class="drink__comments__item__header__left">
            <div class="drink__comments__item__header__name">
                <a href="{{ route('drink', ['drink' => $comment->cocktail->id ]) }}">{{ $comment->cocktail->name }}</a>
            </div>
        </div>
        <div class="drink__comments__item__header__right">
            <div class="drink__comments__item__header__date" title="Edited {{ $comment->updated_at }}">Posted {{ $comment->created_at }}</div>
        </div>
    </div>
    <div class="drink__comments__item__body">
        {{ $comment->body }}
    </div>
</div>