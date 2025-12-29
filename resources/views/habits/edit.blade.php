<x-layout>
  <main class="py-10">
    <h1>
      Altere o habito
    </h1>
    <section class="bg-white max-w-[600px] mx-auto p-10 pb-6 border-2 mt-4">
      <form action="{{ route('habit.update', $habit->id) }}" method="POST" class="flex flex-col">
        @csrf
        @method('PUT')

        <div class="flex flex-col gap-2 mb-2">
          <label for="name">
            Hábito:
          </label>

          <input type="text"
                 name="name"
                 placeholder="Ex: Correr 10 minutos"
                 class="bg-white p-2 border-2
                   @error('name') border-red-500 @enderror"
                 value="{{ $habit->name }}"
          >

          @error('name')
          <p class="text-red-500 text-sm">
            {{ $message }}
          </p>
          @enderror
        </div>

        <button type="submit"
                class="bg-white border-2 p-2 cursor-pointer"
        >
          Editar Hábito
        </button>
      </form>
    </section>
  </main>
</x-layout>
