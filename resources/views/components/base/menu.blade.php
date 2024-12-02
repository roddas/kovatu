@props(['items'])

<div class="mx-auto my-[5rem] w-[60%] grid grid-cols-3 gap-6 content-center text-center">
    @foreach ($items as $item)
        <section class="block">
            <a href="{{ route($item['link']) }}"><img src="{{ $item['image'] }}" width="{{ $item['width'] }}"
                    height="{{ $item['height'] }}" alt="image"
                    class="mx-auto scale-75 duration-500 hover:cursor-pointer hover:scale-100 ease-in-out" />
                <span class="w-full relative font-normal text-normal text-primaryBlue">
                    {{ $item['text'] }}
                </span></a>

        </section>
    @endforeach
</div>
