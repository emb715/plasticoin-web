@extends('layouts.master')

@section('content')

<x-sections.header>
    ¿Cómo ayudar a <span class="font-bold">reciclar</span>?
</x-sections.header>

<section id="centros-de-acopio" class="py-8 -mt-2 bg-gray-100 z-20">
    <div class="max-w-7xl mx-auto">

        <div class="w-full mt-16">
            <x-title class="text-center">
                Centros de Acopio
            </x-title>
        </div>

        <div class="w-full mb-8 py-8 flex flex-wrap">
            
            @foreach (collectionCenters() as $collectionCenter)
                <div class="w-full sm:w-1/3 sm:px-4 mb-8 sm:mb-12">
                    <x-collection-center :collectionCenter="$collectionCenter" />
                </div>
            @endforeach
        </div>

        <div class="w-full sm:w-4/5 mx-auto flex my-6">
            <div class="flex items-center bg-blue-100 border border-blue-500 text-blue-400 px-4 py-3 rounded relative">
                <i class="material-icons text-blue-400 pr-3">info</i>
                Los centros de acopio están identificados con una bandera de proyecto. En el centro de acopio la persona
                responsable realizará el pesaje y chequeo del plástico entregado y se acreditarán los Plasticoins
                correspondientes a la entrega.
            </div>
        </div>
    </div>
</section>

<section class="py-8 bg-gray-100">
    <div class="max-w-7xl mx-auto">

        <div class="pt-4 pb-4">
            <h2 class="text-4xl pb-4 tracking-wide font-light text-center text-primary">Valor de Canje</h2>
        </div>

        <div class="flex flex-wrap ">

            <div class="w-full sm:w-1/3  flex flex-wrap  p-2 justify-center">
                <div class="flex flex-wrap items-center justify-center bg-white py-6 px-6  shadow-md hover:shadow-lg  ">

                    <div class="flex space-x-4 justify-center items-center">
                        <span class="text-5xl text-primary font-bold">
                            {{ config('plasticoins.rewards.home') }}
                        </span>
                        <img class="max-h-10" src="{{ asset('assets/images/plasticoins.png') }}" alt="">
                    </div>

                    <p class="text-2xl text-center pt-4 font-bold text-primary">1kg. <br>Residuos plásticos
                        domiciliarios </p>
                </div>
            </div>

            <div class="w-full sm:w-1/3  flex flex-wrap p-2 justify-center">
                <div class="flex flex-wrap items-center justify-center bg-white py-6 px-6  shadow-md hover:shadow-lg  ">

                    <div class="flex space-x-4 justify-center items-center">
                        <span class="text-5xl text-primary font-bold">
                            {{ config('plasticoins.rewards.beach') }}
                        </span>
                        <img class="max-h-10" src="{{ asset('assets/images/plasticoins.png') }}" alt="">
                    </div>


                    <p class="text-2xl text-center pt-4 font-bold text-primary">1kg. <br>Residuos plásticos retirados de
                        la playa </p>

                </div>
            </div>

            <div class="w-full sm:w-1/3  flex flex-wrap p-2 justify-center">
                <div class="flex flex-wrap items-center justify-center bg-white py-6 px-6  shadow-md hover:shadow-lg  ">


                    <div class="flex space-x-4 justify-center items-center">
                        <span class="text-5xl text-primary font-bold">
                            {{ config('plasticoins.rewards.micro_plastic') }}
                        </span>
                        <img class="max-h-10" src="{{ asset('assets/images/plasticoins.png') }}" alt="">
                    </div>


                    <p class="text-2xl text-center pt-4 font-bold text-primary">1kg. <br>Micro plásticos retirados de la
                        playa </p>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection