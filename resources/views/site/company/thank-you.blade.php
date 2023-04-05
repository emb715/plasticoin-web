@extends('layouts.master')

@section('content')

<section class="intro flex items-center  py-6 bg-grey-100 bg-scroll bg-center bg-no-repeat"
    style="background-image: url({{ asset('assets/images/wave.png') }})">

    <div class="max-w-7xl mx-auto flex flex-wrap items-center px-5 py-12">
        <div class="w-full sm:pr-16 flex flex-col items-center justify-center space-y-3">

            <h1 class="text-4xl text-center pb-4 tracking-wide font-bold text-primary">Muchas Gracias</h1>

            <p class="font-light text-center sm:pl-10 leading-normal text-lg  px-10 text-grey-600">
                Le responderemos a la brevedad
            </p>

            <a href="{{ route('site.index') }}" class="mt-8">
                <x-button>
                    Volver al inicio
                </x-button>
            </a>
        </div>
    </div>
</section>

@endsection