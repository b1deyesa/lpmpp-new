<x-layout.dashboard title="Tambah Berita">
    
    {{-- Form --}}
    <form class="form" action="{{ route('dashboard.berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-input type="text" name="title" label="Judul Berita" />
        <x-input type="editor" name="body" label="Content Berita" />
        <x-input type="file" name="cover" label="Thumbnail Berita" />
        <x-button type="submit">Submit</x-button>
    </form>
    
</x-layout.dashboard>