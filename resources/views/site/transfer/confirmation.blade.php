@extends('layouts.master')

@section('content')

<section class="py-8 bg-gray-100">
    <div class="max-w-3xl mx-auto">
        <form class="my-8 max-w-xl m-auto bg-white shadow-lg p-6" method="POST"
            action="{{ route('site.transfer.store') }}">

            @csrf

            <x-title class="text-center">
                <span class="font-light">Transferir Plasticoins</span>
            </x-title>

            <p class="traking-wide font-light text-center pb-4 text-lg text-primary mb-8">
                Estás por transferir {{ $data['amount'] }} plasticoins a {{ $data['email']}}.
            </p>

            <input type="text" class="hidden" name="email" value="{{ $data['email'] }}">
            <input type="text" class="hidden" name="amount" value="{{ $data['amount'] }}">

            <div class="w-full flex justify-center items-center px-2 my-8">
                <a href="{{ url()->previous() }}" class="mx-4">Cancelar</a>
                <button {{ isset($error) ? 'disabled' : '' }} type="submit"
                    class="mx-4 flex items-center shadow-lg py-2 px-6 rounded-full text-white {{ isset($error) ? 'bg-secondary' : 'bg-primary hover:bg-secondary hover:shadow-2xl' }}">Confirmar</button>
            </div>

        </form>
    </div>

</section>

@endsection