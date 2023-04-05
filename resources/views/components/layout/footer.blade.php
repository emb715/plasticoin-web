<footer id="footer">
    <section class="bg-primary py-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-wrap">

                <div class="w-full sm:w-1/3 mb-8 sm:mb-0 sm:pl-6">
                    <img src="{{ asset('assets/images/contact-logo-white.png') }}" class="h-48 mx-auto sm:ml-0">
                </div>

                <div class="w-full sm:w-1/4 mb-8 sm:mb-0 sm:pl-6">

                    <div class="flex py-4 sm:py-8 justify-center sm:justify-start">

                        <div class="inline text-white text-center px-3">
                            <a href="https://www.facebook.com/Plasticoin" target="_blank">
                                <img src="{{ asset('assets/images/facebook.svg') }}" width="30" class="shadow-lg">
                            </a>
                        </div>

                        <div class="inline text-white text-center px-3">
                            <a href="https://www.instagram.com/plasticoin.uy/" target="_blank">
                                <img src="{{ asset('assets/images/instagram.svg') }}" width="30" class="shadow-lg">
                            </a>
                        </div>
                        <div class="inline text-white text-center px-3">
                            <a href="https://www.youtube.com/channel/UCg0K73K9a9VWUmxWDiJXAkw" target="_blank">
                                <img src="{{ asset('assets/images/youtube.svg') }}" width="30" class="shadow-lg">
                            </a>
                        </div>
                    </div>

                    <div class="my-8 sm:my-4 flex flex-wrap justify-center sm:justify-start">

                        <div>
                            <a href="mailto:info@plasticoin.com.uy"
                                class="text-white flex items-center text-grey-darker mb-4 mail">
                                <i class="text-2xl material-icons mr-4">mail</i>
                                info@plasticoin.com.uy
                            </a>

                            <a href="tel:+598 92 115 940"
                                class="text-white flex items-center text-grey-darker mb-4 phone">
                                <i class="text-2xl material-icons mr-4">call</i>
                                +598 92 115 940
                            </a>

                            <div class="flex items-center text-white location">
                                <i class="text-2xl material-icons mr-4">location_on</i>
                                Uruguay
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3 bg-gray-100">
        <div class="max-w-7xl mx-auto">
            <p class="text-center text-gray-500"> © {{ date('Y') }}
                <span>Plasticoin</span>
                <span>|</span>
                <a href="{{ route('site.terms') }}" target="_blank">
                    Términos y Condiciones
                </a>
                <span>|</span>
                <span>
                    Desarrollado por
                    <a href="https://ivirtual.la" target="_blank" class="hover:text-primary">
                        iVirtual
                    </a>
                </span>
            </p>
        </div>
    </section>
</footer>