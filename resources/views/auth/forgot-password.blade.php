@extends('layouts.master')

@section('content')

<section class="flex items-center py-8 sm:py-32 bg-grey-100 bg-scroll bg-cover bg-no-repeat"
    style="background-image: url({{ asset('assets/images/wave.png') }})">

    <div class="max-w-5xl mx-auto flex flex-wrap items-center px-5">

        <div class="w-full sm:w-1/2 px-6 pb">

            <h1 class="text-primary text-4xl text-left pb-4 tracking-wide font-light">
                <span class="font-bold">Cambiar Contraseña</span>
            </h1>
        </div>

        <div class="w-full sm:w-1/2 py-5 px-5 bg-gray-100 shadow-md">

            <div class="flex flex-wrap items-center justify-center">

                @if(session('status'))
                    <div class="w-full mb-4 bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                        role="alert">
                        <div class="flex">
                            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                </svg></div>
                            <div>
                                <p class="font-bold">Has iniciado un cambio de contraseña</p>
                                <p class="text-sm">Se ha enviado un email para realizar el cambio.</p>
                            </div>
                        </div>
                    </div>
                @endif

                <form class="w-full" method="post" action="{{ route('password.email') }}">

                    @csrf

                    <x-form.input name="email" type="email" label="Email" />

                    <div class="md:flex md:items-center mt-4">
                        <button
                            class="shadow bg-primary hover:bg-secondary focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit">
                            Cambiar contraseña
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection