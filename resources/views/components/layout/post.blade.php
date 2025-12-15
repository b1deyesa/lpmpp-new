<x-layout.page class="post">
    
    <header class="header">
        <img src="{{ asset('img/gedung-unpatti.jpg') }}">
        <div class="header__container">
            <h1 class="title">{{ $title }}</h1>
        </div>
    </header>
    
    <section>
        {{ $slot }}
    </section>
    
</x-layout.page>