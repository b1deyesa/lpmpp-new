<x-layout.dashboard title="Edit Berita">
    
    {{-- Form --}}
    <form class="form" action="{{ route('dashboard.berita.update', ['beritum' => $berita]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-input type="text" name="title" label="Judul Berita" value="{{ $berita->title }}" />
        <x-input type="editor" name="body" label="Content Berita" value="{{ $berita->body }}" />
        <x-input type="file" name="cover" label="Thumbnail Berita" />
        <x-button type="submit">Update</x-button>
    </form>
    
</x-layout.dashboard>