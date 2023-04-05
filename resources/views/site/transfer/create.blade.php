@extends('layouts.master')

@section('content')

<section class="py-8 bg-gray-100">
    <div class="max-w-3xl mx-auto">
        <form class="my-8 m-auto bg-white shadow-lg rounded p-6" method="POST"
            action="{{ route('site.transfer.confirm') }}">

            @csrf

            <x-title class="text-center">
                <span class="font-light">Transferir Plasticoins</span>
            </x-title>

            <p class="traking-wide font-light text-center pb-4 text-lg text-primary mb-8">
                Estás por transferir plasticoins a otro usuario.
            </p>

            <x-form.input name="email" label="Email" type="email" />

            <div class="mt-4">
                <x-form.input name="amount" label="Cantidad de plasticoins" type="numner" />
            </div>

            <div class="w-full flex justify-center items-center px-2 my-8">
                <a href="{{ url()->previous() }}" class="mx-4">Cancelar</a>

                <button {{ isset($error) ? 'disabled' : '' }} type="submit"
                    class="mx-4 flex items-center shadow-lg py-2 px-6 rounded-full text-white {{ isset($error) ? 'bg-secondary' : 'bg-primary hover:bg-secondary hover:shadow-2xl' }}">
                    Transferir
                </button>
            </div>

        </form>
    </div>

</section>

@endsection