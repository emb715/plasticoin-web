<section id="centros-de-acopio" class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto">

        <x-title class="text-center">
            Centros de Acopio
        </x-title>

        <div class="flex flex-wrap">
            <div class="w-full mb-8 py-8 flex flex-wrap">

                @foreach (collectionCenters()->random(3) as $collectionCenter)
                <div class="w-full sm:w-1/3 sm:px-4 mt-10 sm:mt-0">
                    <x-collection-center :collectionCenter="$collectionCenter" />
                </div>
                @endforeach
            </div>

            <div class="w-full flex items-center justify-center">
                <a href="{{ route('site.collection-center.index') }}">
                    <x-button>
                        Ver más
                    </x-button>
                </a>
            </div>
        </div>
    </div>
</section>