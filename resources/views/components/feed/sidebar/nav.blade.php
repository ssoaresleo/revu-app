  <nav class="mt-6">
      <x-feed.sidebar.nav-item href="{{ route('feed') }}" label="Início">
          <x-heroicon-s-home />
      </x-feed.sidebar.nav-item>
      <x-feed.sidebar.nav-item href="{{ route('login') }}" label="Buscar">
          <x-bi-search />
      </x-feed.sidebar.nav-item>
      <x-feed.sidebar.nav-item href="{{ route('login') }}" label="Meu perfil">
          <x-heroicon-s-user />
      </x-feed.sidebar.nav-item>
      <x-feed.sidebar.nav-item href="{{ route('login') }}" label="Minhas postagens">
          <x-heroicon-o-book-open />
      </x-feed.sidebar.nav-item>
  </nav>
