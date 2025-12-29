<x-layout>
  <main class="py-10">

    <h1 class="font-bold text-4xl text-center">
      Dashboard
    </h1>

    <a href="{{ route('habit.create') }}" class=" block bg-white p-2 border-2 font-bold cursor-pointer">
        Cadastrar Hábito
    </a>

    @session('success')
      <div class="flex">
        <p class="bg-green-100 border-2 border-green-400 text-green-700 p-3 mb-4">
          {{ session('success') }}
        </p>
      </div>
    @endsession

    @session('error')
    <div class="flex">
      <p class="bg-red-100 border-2 border-red-400 text-red-700 p-3 mb-4">
        {{ session('error') }}
      </p>
    </div>
    @endsession

    <div>
      <h2 class="text-xl mt-4">
        Listagem dos habitos
      </h2>
    </div>

    <ul class="flex flex-col gap-2">
      @forelse($habits as $item)
        <li class="pl-4">
          <div class="flex gap-2 items-center">
            <p class="font-bold text-xl">
              – {{ $item -> name }}
            </p>

            <p>
              {{ $item ->habitLogs -> count() }} dia(s) completado(s)
            </p>

            <a href="{{ route('habit.edit', $item->id) }}">
              <button class="bg-white p-1 hover:opacity-50 transform cursor-pointer">
                <x-icons.edit />
              </button>
            </a>

            <form action="{{ route('habit.destroy', $item) }}" method="POST">

              @csrf
              @method('DELETE')

              <button type="submit" class="bg-red-500 p-1 hover:opacity-50 transform cursor-pointer">
                <x-icons.trash />
              </button>
            </form>

          </div>
        </li>
      @empty
        <p>
          Ainda não há hábitos cadastrados.
        </p>
        <a href="{{ route('habit.create') }}" class=" bg-white p-2 border-2 hover:opacity-50 transform underline">
          Cadastre um hábito agora!
        </a>
      @endforelse
    </ul>

  </main>
</x-layout>
