@extends('layouts.master')

@section('content')

<section class="py-8 bg-gray-100">
    <div class="max-w-3xl mx-auto">
        <div class="my-8 max-w-xl m-auto bg-white shadow-lg p-6">

            <x-title class="text-center">
                <span class="font-light">¡Beneficio creado!</span>
            </x-title>

            <p class="traking-wide font-light text-center pb-4 text-lg text-primary">
                Su beneficio ha sido creado con éxito.
                
                <br><br>

                Puede obtener el beneficio de <span class="font-bold">{{ $voucher->company->name }}</span> con el siguiente código: 
                <br><br>
                <span class="font-bold text-2xl">{{ $voucher->code }}</span>
            </p>

            <div class="w-full text-center mt-6">

                <a href="{{ route('site.benefit.index') }}" class="mx-4">Volver a Beneficios</a>
            </div>
        </div>
    </div>

</section>

@endsection