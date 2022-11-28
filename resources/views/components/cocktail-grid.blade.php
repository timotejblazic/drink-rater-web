@props(['cocktails'])

@if ($cocktails->count())
    <div class="drinks__list__items">
        @foreach ($cocktails as $cocktail)
            <x-cocktail-card :cocktail="$cocktail" />
        @endforeach
    </div>
@else
    <p>No cocktails yet.</p>
@endif