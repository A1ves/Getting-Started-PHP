<header class="bg-white border-b-2 flex items-center justify-between p-4">
  <div class="flex items-center gap-2">
    <a href="{{ route(auth()->check() ? 'habits.index' : 'site.index') }}"
       class="habit-button habit-shadow-lg px-2 py-1 bg-habit-orange">
      HT
    </a>
    <p>
      Habit Tracker
    </p>
  </div>

  <div>

    {{--LOGADO--}}
    @auth
      <form action="{{ route('auth.logout') }}" method="post" class="inline">
        @csrf

        <button type="submit" class="p-2 habit-shadow-lg habit-button">
          Sair
        </button>

      </form>
    @endauth
    {{--DESLOGADO--}}
    @guest
      <div class="flex gap-2">
        <a href="{{ route('site.login') }}" class="p-2 habit-shadow-lg bg-habit-orange habit-button">
          Entrar
        </a>

        <a href="{{ route('site.register') }}" class="p-2 habit-shadow-lg habit-button ">
          Cadastrar
        </a>
      </div>

    @endguest
  </div>
</header>
