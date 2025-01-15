<x-layout>
    @auth
        <div>
            <x-base.title title="Provérbios" />
            <form action="" method="post">
                <div class="lg:flex">
                    {{-- Filter section --}}
                    <section class="filter md:w-[30%] block">
                        <p class="text-lg font-medium">Filtre por língua:</p>
                        @foreach ($linguas as $index => $language)
                            <div class="block">
                                <input type="radio" name="lingua" id="checkbox{{ $index }}"
                                    value="{{ $language }}" class="mr-2 checkbox">
                                <label for="checkbox{{ $index }}" class="font-normal ">
                                    {{ $language['lingua'] }}
                                </label>
                            </div>
                        @endforeach
                        <input class="my-2 bg-red-500 px-3  text-white rounded-md hover:bg-red-600 hover:cursor-pointer"
                            type="reset" value="Limpar" />
                    </section>
                    <section class="proverbios literata-medium-italic text-lg text-justify leading-10">
                        @foreach ($proverbios as $proverbio)
                            <p> <a href="#"
                                    class="mt-2 italic hover:underline my-1">{{ Str::words($proverbio['proverbio'], 10) }}</a>
                            </p>
                        @endforeach
                    </section>
            </form>
            <div class="a">
                {{ $proverbios->links() }}
            </div>
        </div>

    @endauth
</x-layout>
