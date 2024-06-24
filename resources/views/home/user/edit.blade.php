@extends('layouts.app')

@section('title', 'User profile')

@section('content')
  <main class="max-w-5xl p-4 mx-auto sm:p-6">
    <!-- Card -->
    <div class="p-4 bg-white shadow rounded-xl sm:p-7">
      <div class="mb-8">
        <h2 class="text-xl font-bold text-gray-800">
          Profile
        </h2>
        <p class="text-sm text-gray-600">
          Manage your name, password and account settings.
        </p>
        <p class="text-sm text-gray-600">
          {{ $errors }}
        </p>
      </div>
      <form action="{{ route('user.update') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Grid -->
        <div class="grid gap-2 sm:grid-cols-12 sm:gap-6">
          <div class="sm:col-span-3">
            <label class="inline-block text-sm text-gray-800 mt-2.5">
              Profile photo
            </label>
          </div>
          <!-- End Col -->

          <div class="sm:col-span-9">
            <div class="flex items-center gap-5">
              <img
                class="inline-block rounded-full size-16 ring-2 ring-white"
                src="{{ $user->image }}" alt="Image Description">
              <div class="flex gap-x-2">
                <div>
                  <input type="file"
                    class="block w-full text-sm text-gray-500 file:me-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:disabled:opacity-50 file:disabled:pointer-events-none">
                </div>
              </div>
            </div>
          </div>
          <!-- End Col -->
          <div class="sm:col-span-3">
            <label for="af-account-email"
              class="inline-block text-sm text-gray-800 mt-2.5">
              Name
            </label>
          </div>

          <div class="sm:col-span-9">
            <x-input name="name"
              value="{{ old('name', $user->name) }}" />
            @error('name')
              {{ $message }}
            @enderror
          </div>

          <div class="sm:col-span-3">
            <label for="af-account-email"
              class="inline-block text-sm text-gray-800 mt-2.5">
              Last name
            </label>
          </div>

          <div class="sm:col-span-9">
            <x-input name="last_name"
              value="{{ old('last_name', $user->last_name) }}" />
            @error('last_name')
              {{ $message }}
            @enderror
          </div>

          <div class="sm:col-span-3">
            <label for="af-account-email"
              class="inline-block text-sm text-gray-800 mt-2.5">
              Email
            </label>
          </div>

          <div class="sm:col-span-9">
            <x-input type="email" name="email"
              value="{{ old('email', $user->email) }}" />
            @error('email')
              {{ $message }}
            @enderror
          </div>

          <div class="sm:col-span-3">
            <label for="af-account-email"
              class="inline-block text-sm text-gray-800 mt-2.5">
              Username
            </label>
          </div>

          <div class="sm:col-span-9">
            <x-input type="username" name="username"
              value="{{ old('username', $user->username) }}" />
            @error('username')
              {{ $message }}
            @enderror
          </div>
        </div>
        <!-- End Grid -->

        <div class="flex justify-end mt-5 gap-x-2">
          <a href="{{ route('home') }}"
            class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
            Cancel
          </a>
          <button type="submit"
            class="inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            Save changes
          </button>
        </div>
      </form>
    </div>
    <!-- End Card -->
  </main>
@endsection
