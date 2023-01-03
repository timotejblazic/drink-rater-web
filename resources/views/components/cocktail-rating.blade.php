@props(['drink'])

<div class="cocktail__rating" title="{{ $drink->ratings->avg('rating') }}">
    <span class="cocktail__rating__number">{{ $drink->ratings->avg('rating') }}</span>
    <div class="cocktail__rating__star" data-rating="1"></div>
    <div class="cocktail__rating__star" data-rating="2"></div>
    <div class="cocktail__rating__star" data-rating="3"></div>
    <div class="cocktail__rating__star" data-rating="4"></div>
    <div class="cocktail__rating__star" data-rating="5"></div>
</div>