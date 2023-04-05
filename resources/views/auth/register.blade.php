@extends('layouts.master')

@push('scripts')
    @if (count($errors->all()) > 0)
        <script>
            var scrollDiv = document.getElementById("form").offsetTop;
                    window.scrollTo({ top: scrollDiv, behavior: 'smooth'});
        </script>
    @endif
@endpush

@section('content')

<section class="intro flex items-center py-16 bg-grey-100 bg-scroll"
    style="background-image: url({{ asset('assets/images/wave.png') }})">

    <div class="max-w-7xl mx-auto flex flex-wrap items-center px-5 ">

        <div class="w-full sm:w-1/2 px-6 pb">

            <h1 class="text-primary text-4xl text-left pb-4 tracking-wide font-light">
                <span class="font-bold">
                    Hola! Bienvenido a Plasticoin </span>
            </h1>
        </div>

        <div class="w-full sm:w-1/2 py-5 px-5    ">

            <div class="flex flex-wrap items-center justify-center">

                <p class="font-light   leading-normal text-lg text-left pt-4  text-grey-600">
                    Con tu colaboración, vamos a poder combatir la creciente acumulación de desechos plásticos en
                    nuestras playas y potenciar las cadenas de reciclaje y otros proyectos de economía circular.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-10 px-4 -mt-2 bg-secondary">
    <div class="max-w-5xl mx-auto">
        <div class="pt-4 pb-4">
            <p class="font-bold  text-white leading-normal text-lg text-center pt-4 pb-10 ">
                ¿ERES NUEVO? REGISTRATE ACÁ y EMPIEZA A SER PARTE DEL CAMBIO
            </p>
        </div>

        <div class="flex flex-wrap ">

            <div class="w-full sm:w-1/2 flex flex-wrap p-4 justify-center">
                <div class="flex flex-wrap content-center">
                    <div class="w-full flex content-start mb-6 text-white">
                        <i class="material-icons text-white pr-3">check</i>
                        Al crear tu cuenta recibirás un mail con las instrucciones de uso de la moneda y los medios para
                        acceder
                        a los beneficios de nuestras empresas adheridas
                    </div>
                    <div class="w-full flex content-start mb-6 text-white">
                        <i class="material-icons text-white pr-3">check</i>
                        Dale seguir a nuestras redes para estar atento a las novedades y comenzar a ser parte del cambio
                    </div>
                    <div class="w-full flex content-start mb-6 pl-8 text-white">
                        <div class="inline text-white text-center px-1 py-1">
                            <a href="https://www.facebook.com/Plasticoin" target="_blank">
                                <img src="{{ asset('assets/images/facebook.svg') }}" width="30" class="shadow-lg">
                            </a>
                        </div>
                        <div class="ml-4 inline text-white text-center px-1 py-1">
                            <a href="https://www.instagram.com/plasticoin.uy/" target="_blank">
                                <img src="{{ asset('assets/images/instagram.svg') }}" width="30" class="shadow-lg">
                            </a>
                        </div>
                        <div class="ml-4 inline text-white text-center px-1 py-1">
                            <a href="https://www.youtube.com/channel/UCg0K73K9a9VWUmxWDiJXAkw" target="_blank">
                                <img src="{{ asset('assets/images/youtube.svg') }}" width="30" class="shadow-lg">
                            </a>
                        </div>
                    </div>
                    <div class="w-full flex content-start mb-6 text-white">
                        <i class="material-icons text-white pr-3">check</i>
                        Cualquier duda o comentario puedes comunicarte con nosotros al +59892115940
                    </div>
                </div>
            </div>

            <div class="w-full sm:w-1/2 flex flex-wrap p-4 justify-center">
                
                <form id="form" class="py-8 w-full max-w-lg flex flex-col space-y-3" action="{{ route('register') }}"
                    method="POST">

                    @csrf

                    <x-form.input name="name" label="Nombre" />

                    <x-form.input name="email" label="Email" type="email" />

                    <x-form.input name="phone" label="Teléfono" />

                    <x-form.select name="country_id" label="País" :options="$countries" />

                    <x-form.input name="city" label="Ciudad" />

                    <x-form.input name="password" label="Contraseña" type="password" />

                    <div class="flex flex-wrap items-center mb-6">
                        <label class="w-full block text-gray-100 font-bold">

                            <input class="mr-2 leading-tight" name="terms" type="checkbox" {{ old('terms') ? 'checked' : '' }} value="{{ old('terms', 1) }}">

                            <span class="text-sm">
                                <a href="{{ route('site.terms') }}" target="_blank" class="underline">
                                    Aceptar Términos y Condiciones
                                </a>
                            </span>
                        </label>

                        <div class="w-full">
                            @error('terms')
                                <p class="mt-2 text-sm text-red-600" id="terms-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="md:flex md:items-center">
                        <button
                            class="shadow bg-primary hover:bg-secondary focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit">
                            Registrarme
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection