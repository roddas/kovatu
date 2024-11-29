<x-layout>
    @auth
        @php
            $imageDir = '/images/';
            $width = 125;
            $height = 125;

            $items = [
                [
                    'text' => 'Dicionário',
                    'link' => 'dicionario',
                    'image' => $imageDir . 'dic.svg',
                    'height' => $height,
                    'width' => $width,
                ],
                [
                    'text' => 'Gramática',
                    'link' => 'gramatica',
                    'image' => $imageDir . 'gramatica.svg',
                    'height' => $height,
                    'width' => $width,
                ],
                [
                    'text' => 'Suporte',
                    'link' => 'suporte',
                    'image' => $imageDir . 'suporte.svg',
                    'height' => $height,
                    'width' => $width,
                ],
                [
                    'text' => 'Provérbios',
                    'link' => 'proverbio',
                    'image' => $imageDir . 'proverbios.svg',
                    'height' => $height,
                    'width' => $width,
                ],
                [
                    'text' => 'Sobre',
                    'link' => 'sobre',
                    'image' => $imageDir . 'sobre.svg',
                    'height' => $height,
                    'width' => $width,
                ],
                [
                    'text' => 'Fórum',
                    'link' => 'forum',
                    'image' => $imageDir . 'forum.svg',
                    'height' => $height,
                    'width' => $width,
                ],
            ];
        @endphp

        {{-- Menu --}}
        <x-base.menu :items="$items"></x-base.menu>


    @endauth
</x-layout>
