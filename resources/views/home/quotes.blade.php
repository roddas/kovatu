<x-layout>
    @auth
        <div>
            <x-base.title title="Provérbios" />
            <form action="" method="post">
                <div class="lg:flex">
                    {{-- Filter section --}}
                    <section class="filter md:w-[30%] block">
                        <p class="text-lg font-medium">Língua:</p>
                        @foreach ($linguas as $index => $language)
                            <div class="block">
                                <input type="radio" name="lingua" id="checkbox{{ $index }}"
                                    value="{{ $language }}" class="mr-2 checkbox"
                                    @if ($selectedLanguageId === $language['id']) checked @endif />
                                <label for="checkbox{{ $index }}" class="font-normal italic">
                                    {{ $language['lingua'] }}
                                </label>
                            </div>
                        @endforeach
                        <input class="my-2 underline hover:cursor-pointer" type="reset" value="Limpar" />
                    </section>

                    {{-- <!-- Proverbs Section -->
                    <section class="proverbios text-justify">
                        @if (count($quotes))
                            @foreach ($quotes as $quote)
                                @php
                                    $LIMIT = 50;
                                    $decodedProverbio = htmlspecialchars_decode($quote['proverbio']);
                                    $phrase =
                                        strlen($decodedProverbio) > $LIMIT
                                            ? substr($decodedProverbio, 0, $LIMIT) . '...'
                                            : $decodedProverbio;
                                @endphp
                                <p class="mt-2 italic roboto-serif">
                                    {{ $phrase }}
                                    <a href="" class="font-normal hover:underline text-primaryBlue">
                                        Ver mais
                                    </a>
                                </p>
                            @endforeach
                        @else
                            <x-no-content />
                        @endif
                    </section>
                </div> --}}

                    <!-- Pagination Section -->
                    <div class="my-3 mx-auto justify-center p-1 flex">
                        @foreach ($pages as $index => $value)
                            <div class="text-primaryBlue">
                                <span
                                    class="p-3 mx-2 {{ $selectedPage == $value ? 'rounded bg-primaryBlue text-white' : '' }}">
                                    {{ $value }}
                                </span>
                            </div>
                        @endforeach
                    </div>
            </form>
        </div>

    @endauth
</x-layout>
