<section class="bg-white py-8 md:pb-20">
    <div class="max-w-5xl mx-auto">
        <div class="pt-4 pb-8">
            <h2 class="text-4xl tracking-wide font-bold text-center">
                Transacciones realizadas
            </h2>
        </div>
        <div class="flex flex-col max-w-3xl mx-auto">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    
                    @if(count($transfers) > 0)
                    
                        <x-transfers-table :transfers="$transfers" />

                        <div class="my-4">
                            {{ $transfers->links() }}
                        </div>
                    @else
                        <div class="rounded-md bg-blue-50 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3 flex-1 md:flex md:justify-between">
                                    <p class="text-sm leading-5 text-blue-700">
                                        No has realizado ninguna transferencia.
                                    </p>
                                    <p class="mt-3 text-sm leading-5 md:mt-0 md:ml-6">
                                        <a href="{{ route('site.transfer.create') }}"
                                            class="whitespace-no-wrap font-medium text-blue-700 hover:text-blue-600 transition ease-in-out duration-150">
                                            Realizar transferencia &rarr;
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>