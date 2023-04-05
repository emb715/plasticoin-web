@extends('layouts.master')

@section('content')

<x-sections.home-slider />

<section id="nosotros" class="min-h-screen md:min-h-0 py-16 bg-grey-100 bg-cover bg-no-repeat"
    style="background-image: url({{ asset('assets/images/wave-17.png') }})">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-wrap">

            <div class="w-full sm:w-1/2">

                <x-title>
                    ¿Quiénes Somos?
                </x-title>

                <p class="font-light leading-normal text-primary text-lg text-center sm:text-left pt-4 pb-5">
                    Somos Plasticoin, un proyecto de Economía Circular apoyado por la Agencia Nacional de Desarrollo
                    (ANDE).
                    <br><br>
                    Generamos una moneda virtual ecológica que le da valor de cambio a los residuos plásticos para
                    estimular
                    su limpieza, clasificación y entrega en nuestros Centros de Acopio.
                    <br><br>
                    Nuestro objetivo es fomentar cambios en el tratamiento irresponsable que le damos a nuestros
                    desechos plásticos en el día a día, educando y recompensando en el proceso.
                </p>
            </div>

            <div class="w-full sm:w-1/2 sm:p-4 mb-8 sm:mb-0">
                <div class="bg-primary shadow-lg p-3">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/3GXkaRh0g5M" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="clients" class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-wrap py-8">

            <div class="w-full">
                <x-title>
                    Clientes
                </x-title>
            </div>

            @foreach (clients() as $client)
                <div class="w-full sm:w-1/4 max-h-48 px-4 py-2 flex items-center justify-center" class="text-center mb-8">
                    <img src="{{ $client->image_url }}" alt="{{ $client->name }}"
                        class="w-auto max-h-48">
                </div>
            @endforeach
        </div>
    </div>
</section>

<x-sections.metrics />

@endsection