@extends('layouts.app')

@section('title', 'Blog 11')

@section('content')
    <main class="max-w-md p-6 mx-auto">
        <div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-2xl font-bold text-gray-800">Sign up</h1>
                    <p class="mt-2 text-sm text-gray-600">
                        Already have an account?
                        <a href="{{ route('login.index') }}" class="text-blue-600 decoration-2 hover:underline font-medium">
                            Sign in here
                        </a>
                    </p>
                </div>

                <div class="mt-5">

                    <!-- Form -->
                    <form class="grid gap-y-4">
                        <x-form.input type="email" id="email" name="email" label="Email" required />
                        <x-form.input type="password" id="password" name="password" label="Password" required />
                        <x-form.input type="password" id="confirm-password" name="confirm-password"
                            label="Confirm
                                    Password" required />

                        <button type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Sign
                            up</button>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </main>
@endsection
