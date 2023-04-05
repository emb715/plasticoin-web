@extends('layouts.master')

@section('content')

<section class="py-8 sm:py-32 bg-grey-100 bg-scroll bg-cover bg-no-repeat"
    style="background-image: url({{ asset('assets/images/wave.png') }})">

    <div class="max-w-5xl mx-auto flex flex-wrap items-center px-5">

        <div class="w-full sm:w-1/2 px-6">

            <h1 class="text-primary text-4xl text-left pb-4 tracking-wide font-light">
                <span class="font-bold">Ingresar</span>
            </h1>
        </div>

        <div class="w-full sm:w-1/2 py-5 px-5 bg-gray-100 shadow-md">

            <div class="flex flex-wrap items-center justify-center">

                <form class="w-full" method="post" action="{{ route('login') }}">

                    @csrf

                    <x-form.input name="email" type="email" label="Email" />

                    <x-form.input name="password" type="password" label="Contraseña" />

                    <div class="md:flex flex-wrap md:items-center mb-6">

                        <div class="my-2">
                            <a href="{{ route('password.request') }}" class="hover:text-primary">
                                ¿Hás olvidado tu contraseña?
                            </a>
                        </div>
                    </div>

                    <div class="md:flex md:items-center">
                        <button
                            class="shadow bg-primary hover:bg-secondary focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit">
                            Ingresar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection