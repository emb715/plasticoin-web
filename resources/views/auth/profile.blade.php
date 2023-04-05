@extends('layouts.master')

@section('content')

<section class="flex items-center  py-16 bg-grey-100 bg-scroll bg-no-repeat bg-contain"
    style="background-image: url({{ asset('assets/images/wave.png') }})">

    <div class="container flex flex-wrap items-center px-5 ">

        <div class="w-full sm:w-1/2 flex flex-wrap justify-center">

            <h1 class="w-full text-primary text-4xl text-center tracking-wide font-light">
                <span class="font-bold">Hola {{ Auth::user()->first_name }}</span>
            </h1>

            <p
                class="w-full text-primary font-bold leading-normal text-lg md:text-2xl my-8 md:my-0 flex items-center justify-center">
                <span class="mr-4">Tu saldo es de</span>
                <span>{{ Auth::user()->plasticoins_sum_amount }}</span>
                <img src="{{ asset('assets/images/plasticoins.png') }}" class="ml-2 h-6">
                <span class="ml-2 text-sm">(plasticoins)</span>
            </p>

            <div class="w-full flex justify-center mt-6">
                <a href="{{ route('site.collection-center.index') }}">
                    <x-button>
                        ¿Cómo obtener plasticoins?
                    </x-button>
                </a>
            </div>

        </div>

        <div class="w-full sm:w-1/2 py-5 px-5 bg-gray-100 shadow-md mt-8 sm:mt-0">

            <div class="flex flex-wrap items-center justify-center">

                <h2 class="text-primary text-xl text-center tracking-wide font-light mb-4">Perfil</h2>

                @if (session()->has('profile-updated'))
                <div class="w-full mb-4 bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                    role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                            </svg></div>
                        <div>
                            <p class="font-bold">¡Perfil actualizado!</p>
                        </div>
                    </div>
                </div>
                @endif

                <form class="w-full" method="post" action="{{ route('profile') }}">

                    @csrf

                    <x-form.input name="name" label="Nombre" :value="auth()->user()->name" />

                    <x-form.input name="email" label="Email" type="email" :value="auth()->user()->email" />

                    <x-form.input name="phone" label="Teléfono" :value="auth()->user()->phone" />

                    <x-form.input name="password" label="Contraseña" type="password" />

                    <x-form.input name="password_confirmation" label="Confirmar Contraseña" type="password" />


                    <div class="md:flex md:items-center mt-4">
                        <button
                            class="shadow bg-primary hover:bg-secondary focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit">
                            Actualizar
                        </button>
                </form>
            </div>
        </div>
    </div>
</section>

<x-sections.profile.transfers />

<x-sections.profile.vouchers />

@endsection