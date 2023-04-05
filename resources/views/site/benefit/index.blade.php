@extends('layouts.master')

@push('scripts')
    @if (request()->has('province_id') || request()->has('city_id'))
        <script>
            var scrollDiv = document.getElementById("search").offsetTop;
                    window.scrollTo({ top: scrollDiv, behavior: 'smooth'});
        </script>
    @endif
@endpush

@section('content')

<x-sections.header>
    Obtené beneficios con tus <span class="font-bold">Plasticoins</span>
</x-sections.header>

<x-sections.benefit-slider />

<section class="py-8 bg-gray-100 ">
    <div class="max-w-7xl mx-auto">

        <div class="my-8">

            <x-title class="text-center">
                Beneficios <span class="font-light">de Nuestras Empresas Adheridas</span>
            </x-title>

            <p class="traking-wide font-light text-center pb-4 text-lg text-primary">
                Click sobre el Beneficio para ver la ubicación e información de la empresa</p>
        </div>

        <div class="pt-6 flex flex-wrap items-start" id="search">

            <div class="flex flex-wrap w-full sm:w-1/4 p-3 bg-white shadow mb-8">

                <h3 class="w-full font-bold text-center text-lg mb-2">Buscador</h3>

                <div class="w-full">

                    <form action="{{ route('site.benefit.index') }}" class="flex flex-col space-y-4">

                        <x-form.select name="province_id" label="Departamento" placeholder="Seleccione un Departamento"
                            :options="$provinces" :value="request()->get('province_id')" />

                        <x-form.select name="city_id" label="Ciudad" placeholder="Seleccione una Ciudad"
                            :options="$cities" :value="request()->get('city_id')" />

                        <x-form.input name="search" label="Nombre / Empresa" :value="request()->get('search')" />

                        <div>
                            <button type="submit"
                                class="px-6 sm:px-4 bg-transparent hover:bg-primary-500 text-primary-700 font-semibold hover:text-primary py-2 border border-primary-500 hover:border-transparent rounded">
                                Buscar
                            </button>
                        </div>

                    </form>

                </div>
            </div>

            <div class="w-full sm:w-3/4 flex flex-wrap px-0 md:px-4">
                <div class="w-full flex flex-wrap px-0 md:px-4">
                    @foreach ($benefits as $benefit)
                        <div class="w-full sm:w-1/3 px-0 md:px-3 mb-6">
                            <x-benefit :benefit="$benefit" />
                        </div>
                    @endforeach
                </div>

                <div class="px-2 md:px-8 py-4 w-full">
                    {{
                        $benefits
                            ->appends([
                                'province_id' => request()->get('province_id'),
                                'city_id' => request()->get('city_id'),
                                'search' => request()->get('search'),
                            ])
                            ->onEachSide(1)
                            ->links()
                    }}
                </div>
            </div>
        </div>
    </div>
</section>

<x-sections.collection-centers />

@endsection