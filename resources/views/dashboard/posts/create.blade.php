@extends('layouts.dashboard')

@section('title', 'Dashboard - Create post')

@section('content')
  <main>
    <!-- Card -->
    <div class="p-4 bg-white shadow rounded-xl sm:p-7">
      <div class="mb-8">
        <h2 class="text-xl font-bold text-gray-800">
          Crear nuevo post
        </h2>
        {{ $categories[0] }}
        <br>
        {{ $errors }}
      </div>

      <form action="{{ route('dashboard.posts.store') }}" method="POST">
        @csrf
        <!-- Grid -->
        <div class="grid gap-2 sm:grid-cols-12 sm:gap-6">
          <div class="sm:col-span-3">
            <label for="title"
              class="inline-block text-sm text-gray-800 mt-2.5">
              Title
            </label>
          </div>

          <div class="sm:col-span-9">
            <x-input placeholder="Post title" name="title" />
          </div>

          <div class="sm:col-span-3">
            <label for=""
              class="inline-block text-sm text-gray-800 mt-2.5">Categories</label>
          </div>

          <div
            class="grid grid-cols-2 gap-2 sm:grid-cols-3 lg:grid-cols-4 sm:col-span-9">
            @foreach ($categories as $category)
              <label for="category_{{ $category->id }}"
                class="flex w-full px-3 py-2 text-sm bg-white border border-gray-200 rounded-lg">
                <input type="checkbox"
                  class="text-blue-600 border-gray-200 rounded shrink-0 focus:ring-blue-500"
                  name="categories[]" id="category_{{ $category->id }}">
                <span
                  class="text-sm text-gray-500 ms-3">{{ $category->name }}</span>
              </label>
            @endforeach

          </div>

          <div class="sm:col-span-3">
            <label for="description"
              class="inline-block text-sm text-gray-800 mt-2.5">
              Description
            </label>
          </div>

          <div class="sm:col-span-9">
            <x-textarea class="min-h-32"
              placeholder="Type your message..." name="description" />
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
            Crear post
          </button>
        </div>
      </form>
    </div>
    <!-- End Card -->
  </main>
@endsection
