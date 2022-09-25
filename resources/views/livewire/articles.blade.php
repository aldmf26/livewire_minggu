<div>
    @foreach ($articles as $index => $i)
        <h1>{{ $i->title }}</h1>
        <p>{{ $i->body }}</p>
    @endforeach
    @if ($count < $articlesCount)
    <button class="btn btn-primary" wire:click="loadMore">Load More</button>
    <span wire:loading>Loading....</span>
    @else
    @endif
</div>
