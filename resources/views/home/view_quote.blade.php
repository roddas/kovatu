<x-layout>
    @auth
        <div class="">
            <span class="literata-bold  title">{{ "Provérbio ".$proverbio['lingua'] }}</span>
            <hr class="bg-primaryBlue my-2">
            <form action="" method="post">
                <div class="lg:flex">
                    <section class="proverbios  text-lg text-justify leading-10">
                        <p class="mt-2  literata-medium-italic ">{{ $proverbio['proverbio'] }}</p>
                        <p class="mt-2  literata-medium-italic">{{ $proverbio['interpretacao'] }}</p>
                        <p class="mt-2 right-0">Postado por {{ $proverbio['author']['fullname'] }} {{ $proverbio->created_at->diffForHumans() }} </p>
                    </section>
                </div>
            </form>
        </div>
    @endauth
</x-layout>
