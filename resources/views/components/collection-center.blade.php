<div class="h-full flex flex-col justify-between">
    <div>
        <div class="bg-white shadow-lg rounded mb-3 sm:mb-6">
            <div class="flex flex-wrap items-center justify-center">
                <img src="{{ $collectionCenter->image_url }}" class="h-48 w-auto">
            </div>
        </div>

        <p class="text-black">{{ $collectionCenter->address }}</p>

        <a href="{{ $collectionCenter->url }}" target="_blank" class="text-primary hover:text-secondary">
            ¿Cómo llegar?
        </a>
    </div>

    <div>
        <p class="mt-4 text-lg leading-normal tracking-widest">
            Días: {{ $collectionCenter->open_days }}
        </p>

        <p class="text-lg leading-normal tracking-widest">
            Horarios: {{ $collectionCenter->open_times }}
        </p>
    </div>
</div>