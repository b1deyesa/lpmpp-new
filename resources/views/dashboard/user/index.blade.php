<x-layout.dashboard title="Semua User">
    
    {{-- Create New --}}
    <x-button type="link" href="{{ route('dashboard.user.create') }}" style="margin-left: auto">Tambah User</x-button>
    
    {{-- Table --}}
    <table id="table" class="display">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('dashboard.user.edit', compact('user')) }}">Edit</a>
                    <form action="{{ route('dashboard.user.destroy', compact('user')) }}" method="POST">
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