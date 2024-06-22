@extends('layouts.dashboard')

@section('title', 'Dashboard - Create post')

@section('content')
  <main>
    <!-- Card -->
    <div class="p-4 bg-white shadow rounded-xl sm:p-7">
      <div class="mb-8">
        <h2 class="text-xl font-bold text-gray-800">
          Editar post #{{ $post->id }}
        </h2>
        {{ $errors }}
      </div>

      <form action="{{ route('dashboard.posts.update', $post) }}"
        method="POST">
        @csrf
        @method('put')
        <!-- Grid -->
        <div class="grid gap-2 sm:grid-cols-12 sm:gap-6">
          <div class="sm:col-span-3">
            <label for="af-account-email"
              class="inline-block text-sm text-gray-800 mt-2.5">
              Title
            </label>
          </div>

          <div class="sm:col-span-9">
            <x-input placeholder="Post title" name="title"
              value="{{ old('title', $post->title) }}" />
            @error('title')
              {{ $message }}
            @enderror
          </div>

          <div class="sm:col-span-3">
            <label for="af-account-bio"
              class="inline-block text-sm text-gray-800 mt-2.5">
              Description
            </label>
          </div>

          <div class="sm:col-span-9">
            <x-textarea class="min-h-32"
              placeholder="Type your message..." name="description">
              {{ old('description', $post->description) }}
            </x-textarea>
            @error('description')
              {{ $message }}
            @enderror
          </div>
        </div>
        <!-- End Grid -->

        <div class="flex justify-end mt-5 gap-x-2">
          <button type="button"
            x-on:click="window.location.href='{{ route('dashboard.posts.index') }}'"
            class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
            Cancel
          </button>
          <button type="submit"
            class="inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            Actualizar post
          </button>
        </div>
      </form>
    </div>
    <!-- End Card -->
  </main>
@endsection