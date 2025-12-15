<x-layout.page>
    
    <div class="article">
        <div class="article__container">
            <h1 class="article__title">{{ $berita->title }}</h1>
            <div class="article__info">
                <small><i class="far fa-clock"></i>{{ $berita->created_at?->format('d F Y') }}</small>
            </div>
            <div class="article__cover">
                @if ($berita->cover)
                    <img src="{{ asset('storage/berita/'. $berita->cover) }}" class="post__thumbnail">
                @else
                    <img src="{{ asset('img/default.jpg') }}" class="post__thumbnail">
                @endif
            </div>
            <div class="article__body">
                {!! $berita->body !!}
            </div>
        </div>
    </div>
    
</x-layout.page>