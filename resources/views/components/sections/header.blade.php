@props(['cta' => true])

<section class="intro flex items-center pt-2 sm:pt-6 bg-grey-100 bg-cover bg-no-repeat"
    style="background-image: url({{ asset('assets/images/wave.png') }})">

    <div class="max-w-7xl mx-auto flex flex-wrap px-5 pt-6 sm:pt-12 lg:pt-20">
        <div class="w-full mb-8">
            <h1
                class="pb-4 text-4xl text-center sm:text-center tracking-wide text-primary">
                {{ $slot }}
            </h1>
        </div>

        @if ($cta)
        <div class="sm:block bg-secondary flex flex-wrap rounded-lg py-4 px-4 sm:px-16 -mb-8">
            <h2 class="w-full text-3xl text-white text-center font-light py-4">
                Lleva tu plástico <span class="font-bold">limpio y seco</span> a cualquiera de nuestros centros de
                acopio donde obtendras <span class="font-bold">Plasticoins</span> para canjear por beneficios.
            </h2>
        </div>
        @endif
    </div>
</section>