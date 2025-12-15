<x-layout.dashboard title="Semua Berita">
    
    {{-- Create New --}}
    <x-button type="link" href="{{ route('dashboard.berita.create') }}" style="margin-left: auto">Tambah Berita</x-button>
    
    {{-- Table --}}
    <table id="table" class="display">
        <thead>
            <tr>
                <th width="120px">Thumbnail</th>
                <th>Judul Berita</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beritas as $berita)
            <tr>
                <td><img src="{{ asset('storage/berita/'. $berita->cover) }}" width="100%"></td>
                <td>{{ $berita->title }}</td>
                <td>
                    <a href="{{ route('dashboard.berita.edit', ['beritum' => $berita]) }}">Edit</a>
                    <form action="{{ route('dashboard.berita.destroy', ['beritum' => $berita]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <script>
        $(document).ready( function () {
            $('#table').DataTable();
        } )
    </script>
    
</x-layout.dashboard>