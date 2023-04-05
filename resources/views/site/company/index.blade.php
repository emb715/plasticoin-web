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

<section class="intro flex items-center  py-6 bg-grey-100 bg-scroll bg-center bg-no-repeat"
    style="background-image: url({{ asset('assets/images/wave.png') }})">

    <div class="max-w-7xl mx-auto flex flex-wrap items-center px-5 py-12">
        <div class="w-full sm:pr-16">
            <h1 class="text-4xl text-center sm:text-left pb-4 tracking-wide font-bold text-primary">Empresas</h1>
            <p class="font-light text-left sm:pl-10  leading-normal text-lg  px-10 text-grey-600">
                Te invitamos a formar parte de nuestra plataforma virtual de beneficios, y a pertenecer a un nuevo
                modelo de
                exposición publicitaria, con un impacto social y ambiental positivo para la comunidad. Un lugar de
                encuentro
                para empresas responsables que buscan ayudar a mitigar los efectos del uso desmedido de plásticos.
                <br><br>
                Somos un emprendimiento de triple impacto, ponemos de acuerdo el funcionamiento de la economía con la
                sociedad y
                el medio ambiente. <br><br>

            </p>
        </div>
    </div>
</section>

<section class="bg-white ">
    <div class="max-w-7xl mx-auto">

        <div class="bg-secondary flex flex-wrap items-center rounded-lg shadow-2xl px-4 sm:px-0 py-8 sm:py-16">
            <div class="w-full sm:w-1/2 sm:px-16 flex flex-wrap justify-center">

                <h2 class="text-4xl text-white text-center font-light mb-8 sm:mb-4">
                    ¿Querés saber más?
                </h2>

                <div class="mb-8 sm:mb-0">
                    <a href="#form">
                        <x-button>
                            SOLICITAR ASESORAMIENTO
                        </x-button>
                    </a>
                </div>
            </div>

            <div class="w-full sm:w-1/2 text-white sm:pr-4">
                <div class="flex content-start mb-6">
                    <i class="material-icons text-white pr-3">check</i>
                    Nuestro modelo solo se concreta cuando logramos una propuesta óptima para todos. Nuestra misión es
                    el
                    cuidado del medio ambiente y el potenciamiento de la economía circular.
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-8 bg-gray-100 -mt-2">
    <div class="max-w-7xl mx-auto">

        <div class="max-w-7xl mx-auto flex flex-wrap  px-5 ">

            <div class="w-full  sm:pr-16">

                <p class="font-light   leading-normal text-lg text-left  pb-4  text-secondary">
                    Las empresas pueden sumarse al proyecto brindando beneficios (descuentos, productos etc.) que
                    nuestros
                    usuarios podrán canjear por sus Plasticoins.
                    <br>
                    La exposición en nuestro catálogo virtual publicitario es gratuita, solo siendo necesario la entrega
                    de
                    beneficios para nuestros usuarios.
                    <br>
                    Tu empresa puede patrocinar nuestras acciones de publicidad, siempre enfocadas a generar impactos
                    positivos
                    para el medio ambiente.
                </p>
            </div>


            <div class="w-full sm:w-1/2 text-secondary py-6 md:pr-8 hover:shadow-lg px-6">

                <h2 class="font-bold pb-6 text-2xl  text-primary">¿POR QUÉ ES BUENO PARA TU NEGOCIO? </h2>

                <div class="flex content-start mb-6">
                    <i class="material-icons text-primary pr-3">check</i>
                    Porque vas a poder atraer más clientes que respalden tu compromiso ambiental.
                </div>
                <div class="flex content-start mb-6">
                    <i class="material-icons text-primary pr-3">check</i>

                    Porque más personas van a conocer tu negocio de una forma diferente en nuestras redes con acciones
                    de
                    publicidad sustentable.
                </div>
                <div class="flex content-start ">
                    <i class="material-icons text-primary pr-3">check</i>
                    Porque vas a saber cuanto plástico ayudaste a retirar del medio ambiente.
                </div>
            </div>

            <!-- col-2 -->

            <div class="w-full sm:w-1/2 text-secondary py-6  px-6 md:pr-8 hover:shadow-lg ">

                <h2 class="font-bold pb-6 text-primary text-2xl">¿CÓMO FUNCIONA?</h2>

                <div class="flex content-start mb-6">
                    <i class="material-icons text-primary pr-3">check</i>
                    Los usuarios se registran en la plataforma web, para crear su cuenta y comenzar a acumular
                    Plasticoins.
                </div>
                <div class="flex content-start mb-6">
                    <i class="material-icons text-primary pr-3">check</i>
                    Clasifican, LIMPIAN, Y COMPACTAN LOS envases plásticos de su hogar ó aquellos que recolectan en la
                    playa
                </div>
                <div class="flex content-start mb-6">
                    <i class="material-icons text-primary pr-3">check</i>
                    En las Jornadas de Reciclaje, intercambian los residuos plásticos por Plasticoins, que se acreditan
                    en sus
                    cuentas, para acceder con ellas, a productos y beneficios de empresas responsables y comprometidas
                    con LA
                    SOCIEDAD Y EL MEDIO AMBIENTE
                </div>
                <div class="flex content-start ">
                    <i class="material-icons text-primary pr-3">check</i>
                    Todos los beneficios serán expuestos en nuestras redes sociales y en nuestro catálogo virtual
                    publicitario.
                </div>
            </div>

            <!-- col 1 -->

            <div class="w-full sm:w-1/2 text-secondary py-6 md:pr-8 hover:shadow-lg px-6">

                <h2 class="font-bold pb-6 text-primary text-2xl">¿CÓMO PUEDE PARTICIPAR TU EMPRESA? </h2>

                <div class="flex content-start mb-6">
                    <i class="material-icons text-primary pr-3">check</i>
                    Ofreciendo beneficios y/o descuentos para cambiar por una determinada cantidad de Plasticoins.
                </div>
                <div class="flex content-start mb-6">
                    <i class="material-icons text-primary pr-3">check</i>
                    Ofreciendo ofertas especiales para sortear entre los usuarios ECO-PLUS de Plasticoin.

                </div>
            </div>

            <!-- col-2 -->

            <div class="w-full sm:w-1/2 text-secondary py-6  px-6 md:pr-8  ">

                <div class="items-center justify-center">
                    <img src="{{ asset('assets/images/companies.jpg') }}">

                </div>
            </div>

        </div>
        <div class="w-full bg-white shadow-md hover:shadow-lg  h-full  text-secondary py-6 px-6 md:pr-8 ">

            <h2 class="font-bold pb-6 text-primary text-2xl">RECUERDA </h2>

            <div class="flex content-start mb-6">
                <i class="material-icons text-primary pr-3">check</i>

                Nuestro modelo solo se concreta cuando logramos una propuesta óptima para todos. Nuestra misión es el
                cuidado
                del medio ambiente y el potenciamiento de la economía circular.
            </div>
            <div class="flex content-start mb-6">
                <i class="material-icons text-primary pr-3">check</i>
                Cualquier duda, comentario o consulta puedes comunicarte con nosotros.
            </div>
        </div>
    </div>
</section>

<section id="form" class="py-10 -mt-2 bg-secondary">
    <div class="max-w-7xl mx-auto">
        <div class="py-4">
            <p class="font-bold  text-white leading-normal text-lg text-center pt-4 pb-10">
                Sumá a tu empresa!
                Envianos tu consulta y EMPIEZA A SER PARTE DEL CAMBIO
            </p>
        </div>

        <div class="flex flex-wrap">
            <div class="w-full flex flex-wrap p-2 justify-center">

                <form class="w-full max-w-xl flex flex-col space-y-4" method="POST"
                    action="{{ route('site.company.contact') }}">

                    @csrf

                    <x-form.input name="name" label="Nombre" />

                    <x-form.input name="phone" label="Teléfono" />

                    <x-form.input name="company" label="Empresa" />

                    <x-form.input name="email" label="Email" type="email" />

                    <x-form.input name="city" label="Ciudad" />

                    <x-form.textarea name="message" label="Mensaje" />

                    <div class="flex justify-center">
                        <button
                            class="shadow bg-primary hover:bg-secondary focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit">
                            Sumarse
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection