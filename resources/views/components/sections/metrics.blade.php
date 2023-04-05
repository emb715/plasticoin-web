<section id="metrics" class="min-h-screen md:min-h-0 py-10 -mt-2 bg-scroll"
    style="background-image: url({{ asset('assets/images/bg-plasticoin.jpg') }})">
    <div class="max-w-7xl mx-auto">
        <div class="pt-4 pb-4">
            <h2 class="text-4xl pb-4 tracking-wide font-bold text-center text-primary">
                Impacto del Proyecto
            </h2>
        </div>

        <div class="pt-6 flex flex-wrap pb-10">

            <div class="w-full sm:w-1/3 p-2 justify-center mt-8 sm:mt-0 py-4 sm:border-r-2 border-primary">

                <h3 class="text-6xl text-center text-primary font-bold">
                    <x-count-up :value="metrics()['users']" delay="1500" />
                </h3>

                <p class="text-center text-primary text-xl">USUARIOS REGISTRADOS</p>
            </div>

            <div class="w-full sm:w-1/3 p-2 justify-center mt-8 sm:mt-0 py-4 sm:border-r-2 border-primary">

                <h3
                    class="text-6xl text-center text-primary font-bold w-full flex space-x-2 justify-center items-center">
                    <x-count-up :value="metrics()['plastic_delivery']" delay="4500" />
                    <span class="text-lg">kg</span>
                </h3>

                <p class="text-center text-primary text-xl">PLÁSTICOS RECOLECTADOS</p>
            </div>

            <div class="w-full sm:w-1/3 p-2 justify-center mt-8 sm:mt-0 py-4">

                <h3 class="text-6xl text-center text-primary font-bold">
                    <x-count-up :value="metrics()['vouchers']" />
                </h3>

                <p class="text-center text-primary text-xl">BENEFICIOS EMITIDOS</p>
            </div>
        </div>
    </div>
</section>