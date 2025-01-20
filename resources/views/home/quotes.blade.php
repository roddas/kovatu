<x-layout>
    @auth
        <div class="">
            <x-base.title title="Provérbios" />
            <form action="{{ route('proverbio') }}" method="post">
                @csrf
                <div class="lg:flex">
                    {{-- Filter section --}}
                    <section class="filter md:w-[30%] block">
                        <p class="text-lg font-medium">Filtre por língua:</p>
                        @foreach ($linguas as $index => $language)
                            <div class="block">
                                @if (isset($selected) and $selected == $language)
                                    <input type="radio" name="language" id="checkbox{{ $index }}"
                                        value="{{ $language }}" class="mr-2 checkbox " checked required>
                                    <label for="checkbox{{ $index }}" class="font-normal text-gray-800">
                                        {{ $language }}
                                    </label>
                                @else
                                    <input type="radio" name="language" id="checkbox{{ $index }}"
                                        value="{{ $language }}" class="mr-2 checkbox " required>
                                    <label for="checkbox{{ $index }}" class="font-normal ">
                                        {{ $language }}
                                    </label>
                                @endif
                            </div>
                        @endforeach
                        <div class="block">

                            <input
                                class="my-2 bg-blue-500 px-3 w-32  text-white rounded-md hover:bg-blue-600 hover:cursor-pointer"
                                type="submit" value="Filtrar" required />
                            <p></p>
                            @if (isset($selected))
                                <a class="my-2 bg-red-500 w-32 px-[17px] py-2  text-white rounded-md hover:bg-red-600 hover:cursor-pointer"
                                    href="{{ route('proverbio') }}">Limpar filtro</a>
                            @else
                                <input
                                    class="my-2 bg-red-500 w-32 px-3  text-white rounded-md hover:bg-red-600 hover:cursor-pointer"
                                    type="reset" value="Limpar" />
                            @endif

                            @error('language')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                    </section>
                    <section class="proverbios literata-medium-italic text-lg text-justify leading-10">
                        @foreach ($proverbios as $proverbio)
                            <p> <a href={{ route('ver_proverbio', $proverbio['id_proverbio']) }}
                                    class="mt-2 italic hover:underline my-1">{{ Str::words($proverbio['proverbio'], 10) }}</a>
                            </p>
                        @endforeach
                    </section>


                </div>
            </form>
            <div class="paginacao  my-2 ">
                {{ $proverbios->onEachSide(5)->links() }}
            </div>
            <x-base.home />
        </div>

    @endauth
</x-layout>
