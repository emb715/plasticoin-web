@extends('layouts.master')

@section('content')

<section class="intro flex items-center py-6 bg-grey-100 bg-scroll"
    style="background-image: url({{ asset('assets/images/wave.png') }})">
    <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-center px-5 py-12">

        <div class="w-full sm:w-1/3 px-16">
            <img src="{{ asset('assets/logo.svg') }}">
        </div>

        <div class="w-full sm:w-2/3 pl-4">

            <p class="text-2xl text-left pt-4 font-bold text-primary">¿Quiénes Sómos? </p>
            <p class="font-light   leading-normal text-lg text-left pt-4  text-grey-600">
                Plasticoin es la moneda virtual ecológica Uruguaya que le da valor a los residuos plásticos.
                Somos un emprendimiento de triple impacto. Nuestro objetivo es fomentar cambios en el tratamiento
                irresponsable que le damos a nuestros desechos plásticos en el día a dia, educando y recompensando en el
                proceso.
                <br><br>
                Mitigar los efectos del uso desmedido de productos plásticos es responsabilidad de todos.
                <br><br>
                Tus residuos plásticos tienen un valor!
            </p>
        </div>
    </div>
</section>

<section id="us" class="flex  relative py-10 bg-scroll" style="background-image: url({{ asset('assets/images/us.jpg') }})">
    <div class="max-w-7xl mx-auto flex flex-wrap px-5">
        <div class="flex flex-wrap">
            <div class="w-full sm:w-1/2  flex flex-wrap p-2 justify-center">
                <div
                    class="flex flex-wrap items-center justify-center bg-white py-6 px-6 border-solid border-primary border shadow-md hover:shadow-lg ">

                    <p class="text-2xl text-center pt-4 font-bold text-primary pb-2">¿Qué Hacemos? </p>

                    <p class="text-secondary text-center leading-normal">A través de los incentivos y estímulos que
                        proponemos a nuestros usuarios, trabajamos como agente concentrador de residuos plásticos,
                        mitigando su acumulación en el medio ambiente y estimulando su recolección y limpieza.
                        <br><br>
                        Educamos sobre los efectos que tiene el uso irresponsable de productos plásticos, involucramos a
                        nuestros usuarios en el proceso de reciclaje, agregándole valor a la cadena y aumentando los
                        grados de recuperación.
                    </p>
                </div>
            </div>

            <div class="w-full sm:w-1/2  flex flex-wrap p-2 justify-center">
                <div
                    class="flex flex-wrap items-center justify-center bg-white py-6 px-6 border-solid border-primary border shadow-md hover:shadow-lg">

                    <p class="text-2xl text-center pt-4 font-bold text-primary pb-2">¿Cómo lo hacemos?</p>

                    <p class="text-center text-secondary leading-normal">
                        Retribuimos con Plasticoins a nuestros usuarios a cambio de la correcta disposición sus residuos
                        plásticos domiciliarios y también por aquellos recolectados en playas. Los Plasticoins
                        acumulados podrán ser cambiados por beneficios y promociones de nuestras empresas adheridas.
                        <br><br>
                        Mediante una sinergia entre empresas, los Centros de Acopio y con una logística organizada,
                        proponemos una gestión completa, desde que el residuo es generado hasta su posterior reciclaje.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection