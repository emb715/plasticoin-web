@extends('layouts.master')

@section('content')

<section id="#" class="intro flex items-center py-8 sm:py-32 bg-grey-100 bg-scroll bg-cover bg-no-repeat"
    style="background-image: url({{ asset('assets/images/wave.png') }})">

    <div class="max-w-5xl mx-auto flex flex-wrap items-center px-5 ">

        <div class="w-full sm:w-1/2 px-6 pb">

            <h1 class="text-primary text-4xl text-left pb-4 tracking-wide font-light">
                <span class="font-bold">Cambiar Contraseña</span>
            </h1>
        </div>

        <div class="w-full sm:w-1/2 py-5 px-5 bg-gray-100 shadow-md">

            <div class="flex flex-wrap items-center justify-center">

                <form class="w-full" method="post" action="{{ route('password.update') }}">

                    @csrf

                    <input type="hidden" name="token" value="{{ request()->token }}">

                    <x-form.input name="email" label="Email" :value="request()->email" />

                    <x-form.input name="password" label="Contraseña" type="password" />

                    <x-form.input name="password_confirmation" label="Confirmar Contraseña" type="password" />

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