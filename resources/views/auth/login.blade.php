@extends('layouts.app')

@section('title', 'Login - Blog')

@section('content')
<main class="max-w-md p-6 mx-auto">
    {{ $errors }}
    <div class="bg-white border border-gray-200 shadow-sm mt-7 rounded-xl">
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1 class="block text-2xl font-bold text-gray-800">{{ _('Sign in') }}</h1>
                <p class="mt-2 text-sm text-gray-600">
                    {{ _("Don't have an account yet?") }}

                    <a href="{{ route('register.index') }}"
                        class="font-medium text-blue-600 decoration-2 hover:underline">
                        {{ _('Sign up here') }}
                    </a>
                </p>
            </div>

            <div class="mt-5">

                <!-- Form -->
                <form action="{{ route('login.authenticate') }}" method="POST" class="grid gap-y-4">
                    @csrf
                    <x-form.input type="email" id="email" name="email" placeholder="test@gmail.com" :label="_('Email')"
                        required />
                    <x-form.input type="password" :label="_('Password')" id="password" name="password"
                        placeholder="********" required forgot_password />

                    <button type="submit"
                        class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">{{
                        _('Sign in') }}</button>

                    @if (session('errorTitle'))
                    <x-alert-warning title="{{ session('errorTitle') }}" message="{{ session('errorMessage') }}" />
                    @endif
                    @if (session('success'))
                    <script>
                        const Toast = Swal.mixin({
                                    toast: true,
                                    position: "top-end",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.onmouseenter = Swal.stopTimer;
                                        toast.onmouseleave = Swal.resumeTimer;
                                    }
                                });
                                Toast.fire({
                                    icon: "success",
                                    title: "Cuenta creada exitosamente",
                                    text: "Inicia sesión"
                                });
                    </script>
                    @endif
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</main>
@endsection