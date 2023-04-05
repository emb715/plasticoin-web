<section class="py-8 bg-secondary">
    <div class="max-w-5xl mx-auto">
        <div class="pt-4 pb-4">
            <h2 class="text-4xl tracking-wide font-bold text-center text-white">
                BENEFICIOS OBTENIDOS ANTERIORMENTE
            </h2>

        </div>

        <div class="py-4 flex flex-wrap">

            <div class="w-full flex flex-wrap">

                @php
                    $date = null;
                @endphp

                @if(count($vouchers) > 0)

                    @foreach ($vouchers as $voucher)

                        @if(optional($date)->format('Ymd') !== $voucher->created_at->format('Ymd'))
                            <div class="w-full px-4 sm:px-0">
                                <h2 class="text-xl tracking-wide font-bold text-white mt-4 mb-2">
                                    {{ $voucher->created_at->format('d/m/Y') }}</h2>
                            </div>
                        @endif

                        <div class="w-full sm:w-1/4 px-3 mb-6">
                            <x-benefit :benefit="$voucher->benefit" />
                        </div>

                        @php
                            $date = $voucher->created_at;
                        @endphp

                    @endforeach

                @else

                    <div class="w-full flex justify-center mt-6">
                        <a href="{{ route('site.benefit.index') }}">
                            <x-button>
                                ¡Obtener beneficios!
                            </x-button>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>