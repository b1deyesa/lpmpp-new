<x-layout.dashboard title="Tambah User">
    
    {{-- Form --}}
    <form class="form" action="{{ route('dashboard.user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-input type="text" name="name" label="Nama User" />
        <x-input type="text" name="email" label="Email" />
        <x-input type="password" name="password" label="Password" />
        <x-input type="password" name="password_confirmation" label="Confirm Password" />
        <x-button type="submit">Submit</x-button>
    </form>
    
</x-layout.dashboard>