@extends('layouts.app')

@section('title', 'Blog 11')

@section('content')
    <main class="max-w-md p-6 mx-auto">
        {{ $errors }}
        <div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-2xl font-bold text-gray-800">Sign in</h1>
                    <p class="mt-2 text-sm text-gray-600">
                        Don't have an account yet?
                        <a href="{{ route('auth.register') }}" class="text-blue-600 decoration-2 hover:underline font-medium">
                            Sign up here
                        </a>
                    </p>
                </div>

                <div class="mt-5">

                    <!-- Form -->
                    <form action="{{ route('login.authenticate') }}" method="POST">
                        @csrf
                        <div class="grid gap-y-4">
                            <!-- Form Group -->
                            <div>
                                <label for="email" class="block text-sm mb-2">Email address</label>
                                <x-form.form-input type="email" id="email" name="email"
                                    placeholder="test@gmail.com" />
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <label for="password" class="block text-sm mb-2">Password</label>
                                <x-form.form-input type="password" id="password" name="password" placeholder="********" />
                            </div>
                            <!-- End Form Group -->

                            <button type="submit"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Sign
                                in</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </main>
@endsection
