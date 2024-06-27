<main class="max-w-md p-6 mx-auto">
  <div class="bg-white border border-gray-200 shadow-sm rounded-xl">
    <div class="p-4 sm:p-7">
      <div class="text-center">
        <h1 class="block text-2xl font-bold text-gray-800">
          {{ __('Sign up') }}</h1>
        <p class="mt-2 text-sm text-gray-600">
          {{ __('Already have an account?') }}
          <a href="{{ route('login.index') }}"
            class="font-medium text-blue-600 decoration-2 hover:underline">
            {{ __('Sign in here') }}
          </a>
        </p>
      </div>

      <div class="mt-5">

        <!-- Form -->
        <form wire:submit="register" class="grid gap-y-4"
          method="POST">
          @csrf
          <x-form.input wire:model='name' id="name"
            name="name" :label="__('Name')" required />
          <x-form.input wire:model='last_name' id="last_name"
            name="last_name" :label="__('Last name')" required />
          <x-form.input wire:model='email' type="email"
            id="email" name="email" :label="__('Email')"
            required />
          <x-form.input wire:model='password' type="password"
            id="password" name="password" :label="__('Password')"
            required />
          <x-form.input wire:model='password_confirmation'
            type="password" id="password_confirmation"
            name="password_confirmation" :label="__('Confirm password')" required />

          <button type="submit"
            class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            {{ __('Sign up') }}
          </button>
        </form>
        <!-- End Form -->
      </div>
    </div>
  </div>
</main>
