@extends('layouts.app')

@section('title', 'Blog 11')

@section('content')
    <main class="max-w-md p-6 mx-auto">
        <div class="bg-white border border-gray-200 shadow-sm mt-7 rounded-xl">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-2xl font-bold text-gray-800">Sign up</h1>
                    <p class="mt-2 text-sm text-gray-600">
                        Already have an account?
                        <a href="{{ route('login.index') }}" class="font-medium text-blue-600 decoration-2 hover:underline">
                            Sign in here
                        </a>
                    </p>
                </div>

                <div class="mt-5">

                    <!-- Form -->
                    <form class="grid gap-y-4">
                        <x-form.input id="name" name="name" label="Nombre" required />
                        <x-form.input id="last_name" name="last_name" label="Apellido" required />
                        <x-form.input type="email" id="email" name="email" label="Email" required />
                        <x-form.input type="password" id="password" name="password" label="Password" required />
                        <x-form.input type="password" id="password_confirmation" name="password_confirmation"
                            label="Confirm
                                    Password" required />

                        <button type="submit"
                            class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Sign
                            up</button>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </main>
@endsection
