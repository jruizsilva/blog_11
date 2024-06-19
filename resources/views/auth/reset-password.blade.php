@extends('layouts.app')

@section('title', 'Reestablecer contraseña')

@section('content')
<div class="flex items-center h-full">
  <div class="w-full max-w-md p-6 mx-auto">
    <div class="bg-white border border-gray-200 shadow-sm mt-7 rounded-xl">
      <div class="p-4 sm:p-7">
        <div class="text-center">
          <h1 class="block text-2xl font-bold text-gray-800">{{_("Reset password")}}</h1>
          <p class="mt-2 text-sm text-gray-600">
            {{_("Remember your password?")}}
            <a class="font-medium text-blue-600 decoration-2 hover:underline" href="{{route('login')}}">
              {{_("Sign in here")}}
            </a>
          </p>
        </div>

        <div class="mt-5">
          <!-- Form -->
          <form action="{{route('password.reset')}}" method="POST">
            @csrf
            <div class="grid gap-y-4">
              <x-form.input type="text" name="token" :label="_('Token')" required value="{{$token}}" />
              <x-form.input type="email" name="email" :label="_('Email')" required value="{{$email}}" />
              <x-form.input type="password" name="password" :label="_('Password')" required placeholder="*********" />
              <x-form.input type="password" name="password_confirmation" :label="_('Confirm password')" required
                placeholder="*********" />

              <button type="submit"
                class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                {{_('Reset password')}}
              </button>
            </div>
          </form>
          <!-- End Form -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection