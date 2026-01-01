<x-layout>
  <main class="py-10">
    <section class="bg-white max-w-[600px] mx-auto p-10 pb-6 mt-4 habit-shadow-lg">
      <h1 class="font-bold text-3xl mb-4">
        Registre-se
      </h1>

      <p>
        Preencha as informações para se cadastrar seus hábitos
      </p>

      <form action="{{ route('auth.register') }}" method="POST" class="flex flex-col [&_input]: ">
        @csrf

        <div class="flex flex-col gap-2 mb-2 ">
          <label for="name">
            Nome
          </label>

          <input type="text"
                 name="name"
                 placeholder="Seu nome"
                 class="bg-white p-2 habit-shadow outline-none
                 @error('name') border-red-500 @enderror"
          >

          @error('name')
          <p class="text-red-500 text-sm">
            {{ $message }}
          </p>
          @enderror
        </div>

        <div class="flex flex-col gap-2 mb-2">
          <label for="email">
            Email
          </label>

          <input type="email"
                 name="email"
                 placeholder="your@email.com"
                 class="bg-white p-2 habit-shadow outline-none
                 @error('email') border-red-500 @enderror"
          >
          @error('email')
          <p class="text-red-500 text-sm">
            {{ $message }}
          </p>
          @enderror

        </div>


        <div class="flex flex-col gap-2 mb-4">
          <label for="password">
            Senha
          </label>

          <input type="password"
                 name="password"
                 placeholder="******"
                 class="bg-white p-2 habit-shadow outline-none
                 @error('password') border-red-500 @enderror"
          >

          @error('password')
          <p class="text-red-500 text-sm">
            {{ $message }}
          </p>
          @enderror
        </div>

        <div class="flex flex-col gap-2 mb-4">
          <label for="password_confirmation">
            Repita sua senha
          </label>

          <input type="password"
                 name="password_confirmation"
                 placeholder="******"
                 class="bg-white p-2 habit-shadow outline-none
                 @error('password') border-red-500 @enderror"
          >

          @error('password')
          <p class="text-red-500 text-sm">
            {{ $message }}
          </p>
          @enderror
        </div>


        <button type="submit"
                class="bg-habit-orange habit-shadow-lg habit-button p-2"
        >
          Cadastrar
        </button>
      </form>

      <p class="text-center mt-4" >
        Já tem uma conta?
        <a href="{{ route('site.login') }}" class="underline hover:opacity-50 transition">
          Faça login
        </a>
      </p>

    </section>
  </main>
</x-layout>
