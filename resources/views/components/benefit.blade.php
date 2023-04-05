<div
    class="relative bg-white rounded-lg h-full flex flex-wrap items-center md:items-start shadow-lg">

    <div class="h-32 w-1/3 md:w-full flex flex-wrap items-center justify-center md:mb-4">

        @if(!is_null($benefit->company->url))
            <a href="{{ $benefit->company->url }}" target="_blank">
        @endif

            @if(is_null($benefit->image))
                <img src="{{ $benefit->company->image_url }}" class="max-h-32 w-auto">
            @else
                <img src="{{ $benefit->company->image_url }}" class="hidden sm:block h-32 w-auto">
                <img src="{{ $benefit->image_url }}" class="sm:hidden max-h-32 w-auto">
            @endif

        @if(!is_null($benefit->company->url))
            </a>
        @endif

        <div class="hidden md:block w-full mx-4 mt-2 border-b-2 boder-primary"></div>
    </div>

    <div class="w-2/3 md:w-full text-center leading-normal md:py-3 flex flex-wrap items-center">

        <p class="w-full text-xl sm:text-2xl text-center font-bold text-grey-darker">{{ $benefit->name }}</p>

        @if(!is_null($benefit->promotion))
            <p class="w-full">{{ $benefit->promotion }}</p>
        @endif

        @if(!is_null($benefit->image))
            <div class="hidden md:flex w-full items-center justify-center my-3">
                <img src="{{ $benefit->image_url }}" class="h-32 w-auto">
            </div>
        @endif

    </div>

    @auth
        @if($benefit->enabled)
            <div class="w-full pb-3 md:py-6 self-end text-center">
                <div class="inline-block">
                    <a href="{{ route('site.benefit.show', ['benefit' => $benefit]) }}"
                        class="flex items-center bg-primary shadow-lg py-2 px-6 rounded-full hover:bg-secondary hover:shadow-2xl no-underline font-light tracking-wide text-white">
                        Obtener por
                        
                        <span class="mx-2">
                            {{ $benefit->value }}
                        </span>

                        <img src="{{ asset('assets/images/plasticoins-white.png') }}" class="ml-2 h-6" />
                    </a>
                </div>
            </div>
        @endif
    @endauth
</div>