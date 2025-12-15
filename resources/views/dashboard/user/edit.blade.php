<x-layout.dashboard title="Edit User">
    
    {{-- Form --}}
    <form class="form" action="{{ route('dashboard.user.update', compact('user')) }}" method="POST">
        @csrf
        @method('PUT')
        <x-input type="text" name="name" label="Nama User" value="{{ $user->name }}" />
        <x-input type="text" name="email" label="Email" value="{{ $user->email }}" />
        <x-button type="submit">Submit</x-button>
    </form>
    
</x-layout.dashboard>