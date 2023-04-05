<section>
    <div class="py-4 md:py-8">

        <div class="block relative px-20 max-w-7xl mx-auto" x-data="{items: {{ json_encode(benefitSliders()->pluck('id')->toArray()) }}, active: 0, interval: null}" x-init="
            interval = setInterval(function(){ 
                $refs.slider.scrollLeft = $refs.slider.scrollLeft + ($refs.slider.scrollWidth / items.length);
            }, 5000);
        ">
            <div class="snap overflow-auto flex flex-no-wrap transition-all" x-ref="slider"
                x-on:scroll.debounce="active = Math.round($event.target.scrollLeft / ($event.target.scrollWidth / items.length));">

                @foreach (benefitSliders() as $slide)
                    <div id="slide-{{ $slide->id }}" class="p-4 w-full max-w-64 flex-shrink-0 flex items-center justify-center">
                
                        @if ($slide->url)
                            <a target="_blank" href="{{ $slide->url }}" class="w-full">
                        @endif

                        <img src="{{ $slide->image_url }}" class="w-full h-auto">
                        
                        @if ($slide->url)
                            </a>
                        @endif
                    </div>
                @endforeach
    
            </div>
            <div class="absolute inset-y-0 left-0 ml-8 flex items-center">
                <button
                    class="shadow bg-gray-700 opacity-75 px-4 py-3 text-xl outline-none focus:outline-none text-white"
                    x-on:click=" $refs.slider.scrollLeft = $refs.slider.scrollLeft - ($refs.slider.scrollWidth / items.length); clearInterval(interval);">
                    <
                </button>
            </div>
            <div class="absolute inset-y-0 right-0 mr-8 flex items-center">
                <button
                    class="shadow bg-gray-700 opacity-75 px-4 py-3 text-xl outline-none focus:outline-none text-white"
                    x-on:click="$refs.slider.scrollLeft = $refs.slider.scrollLeft + ($refs.slider.scrollWidth / items.length); clearInterval(interval);">
                >
                </button>
            </div>
        </div>
    </div>
</section>