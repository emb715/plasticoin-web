@extends('layouts.master')

@section('content')

<section class="py-8 bg-gray-100">
    <div class="max-w-3xl mx-auto">
        <div class="my-8 max-w-xl m-auto bg-white shadow-lg p-6">

            <x-title class="text-center">
                <span class="font-light">¡Transferencia realizada con éxito!</span>
            </x-title>

            <p class="traking-wide font-light text-center pb-4 text-lg text-primary mb-8">
                Se han transferido {{ $transfer->amount }} plasticoins a {{ $transfer->toUser->email}}.
            </p>

            <div class="w-full flex justify-center items-center px-2 my-8">
                <a href="{{ url('') }}" class="mx-4">Volver</a>
            </div>
        </div>
    </div>
</section>

@endsection