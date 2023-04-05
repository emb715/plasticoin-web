@extends('layouts.master')

@section('content')

<section class="py-8 bg-gray-100">
    <div class="max-w-5xl mx-auto">
        <form class="my-8 max-w-xl m-auto bg-white shadow-lg p-6" method="POST"
            action="{{ route('site.voucher.store') }}">

            @csrf

            <input type="hidden" name="benefit_id" value="{{ $benefit->id }}">

            <x-title class="text-center">
                <span class="font-light">Canjear Plasticoins</span>
            </x-title>

            <p class="traking-wide font-light text-center pb-4 text-lg text-primary">
                Estás por canjear
                <span class="font-bold">
                    {{ $benefit->value }}
                    plasticoins
                </span>
                para obtener
                <span class="font-bold">{{ $benefit->name }}</span>
                en
                <span class="font-bold">{{ $benefit->company->name }}</span>.
            </p>

            @if($benefit->product && !is_null($benefit->image))
                <div class="w-full flex items-center justify-center my-6">
                    <img src="{{ $benefit->image_url }}" class="h-24 w-auto">
                </div>
            @endif

            @if($errors->all())

                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Hubo un error!</strong>
                    @foreach ($errors->all() as $item)
                        <span class="block sm:inline">{{ $item }}</span>
                    @endforeach
                </div>

            @endif

            <div class="w-full flex justify-center items-center px-2 my-4">
                <a href="{{ route('site.benefit.index') }}" class="mx-4">Cancelar</a>
                <button type="submit"
                    class="mx-4 flex items-center shadow-lg py-2 px-6 rounded-full text-white bg-primary hover:bg-secondary hover:shadow-2xl">
                    Obtener beneficio
                </button>
            </div>

            @if(!is_null($benefit->promotion))
                <p class="text-sm text-center mt-8">* Solo válido en: {{ $benefit->promotion }}</p>
            @endif
        </form>
    </div>
</section>

@endsection