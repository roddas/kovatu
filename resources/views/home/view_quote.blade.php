<x-layout>
    @auth
        <div class="">
            <span class="literata-bold  title">{{ 'Provérbio ' . $proverbio['lingua'] }}</span>
            <hr class="bg-primaryBlue my-2">
            <form action="" method="post">
                <div class="lg:flex">
                    <section class="proverbios  text-lg text-justify leading-10">
                        <p class="my-2  literata-medium-italic  text-gray-950 ">{{ $proverbio['proverbio'] }}</p>
                        <p class="mb-2    text-gray-700 literata-medium">{{ $proverbio['interpretacao'] }}</p>
                        <p class="mt-2 float-right roboto-medium-400 text-gray-600 ">Postado por <a
                                class="hover:underline text-primaryBlue"
                                href="#">{{ $proverbio['author']['fullname'] }}</a>
                            {{ $proverbio->created_at->diffForHumans() }} </p>
                    </section>
                </div>
            </form>
            <x-base.back />
        </div>
    @endauth
</x-layout>
