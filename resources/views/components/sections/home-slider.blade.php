<section id="inicio" class="min-h-screen md:min-h-0">

    <div class="relative"
        x-data="{items: {{ json_encode(indexSliders()->pluck('id')->toArray()) }}, active: 0, interval: null}" x-init="
        interval = setInterval(function(){ 
            $refs.slider.scrollLeft = $refs.slider.scrollLeft + ($refs.slider.scrollWidth / items.length);
        }, 5000);
    ">
        <div class="snap overflow-auto relative flex-no-wrap flex transition-all" x-ref="slider"
            x-on:scroll.debounce="active = Math.round($event.target.scrollLeft / ($event.target.scrollWidth / items.length));">

            @foreach (indexSliders() as $slide)
            <div id="slide-{{ $slide->id }}"
                class="w-full flex-shrink-0 bg-black text-white flex items-center justify-center">
                @if ($slide->url)
                <a target="_blank" href="{{ $slide->url }}">
                    @endif

                    <img src="{{ $slide->image_url }}" class="hidden sm:block">
                    <img src="{{ $slide->mobile_image_url }}" class="block sm:hidden">

                    @if ($slide->url)
                </a>
                @endif
            </div>
            @endforeach

        </div>
        <div class="absolute inset-y-0 left-0 ml-8 flex items-center">
            <button class="shadow bg-gray-700 opacity-75 px-4 py-3 text-xl outline-none focus:outline-none text-white"
                x-on:click=" $refs.slider.scrollLeft = $refs.slider.scrollLeft - ($refs.slider.scrollWidth / items.length); clearInterval(interval);">
                < </button>
        </div>
        <div class="absolute bottom-0 inset-x-0 mb-8 flex items-end justify-center flex-grow">
            <template x-for="(item,index) in items" :key="index">
                <span class="bg-white w-3 h-3 block mx-1 bg-opacity-25 shadow rounded-full"
                    x-bind:class="{'bg-opacity-100': active === index }"></span>
            </template>
        </div>
        <div class="absolute inset-y-0 right-0 mr-8 flex items-center">
            <button class="shadow bg-gray-700 opacity-75 px-4 py-3 text-xl outline-none focus:outline-none text-white"
                x-on:click="$refs.slider.scrollLeft = $refs.slider.scrollLeft + ($refs.slider.scrollWidth / items.length); clearInterval(interval);">
                >
            </button>
        </div>
    </div>
</section>