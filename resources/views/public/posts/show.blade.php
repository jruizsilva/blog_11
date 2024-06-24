@extends('layouts.app')

@section('title', "Post $post->id")

@section('content')
  <!-- Blog Article -->
  <div
    class="max-w-3xl px-4 pt-6 pb-12 mx-auto mt-8 bg-white border rounded-lg lg:pt-10 sm:px-6 lg:px-8">
    <div class="max-w-2xl">
      <!-- Avatar Media -->
      <div class="flex items-center justify-between mb-6">
        <div class="flex w-full sm:items-center gap-x-5 sm:gap-x-3">
          <div class="flex-shrink-0">
            <img class="rounded-full size-12"
              src="{{ $post->user->image }}" alt="Image Description">
          </div>

          <div>
            <a href="#" class="sm:mb-1 text-start">
              <span class="font-semibold text-gray-800">
                {{ $post->user->name }}
              </span>
            </a>

            <ul class="text-xs text-gray-500">
              <li
                class="relative inline-block pe-6 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-2 before:-translate-y-1/2 before:size-1 before:bg-gray-300 before:rounded-full">
                {{ Carbon\Carbon::parse($post->created_at)->format('M d') }}
              </li>
              <li
                class="relative inline-block pe-6 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-2 before:-translate-y-1/2 before:size-1 before:bg-gray-300 before:rounded-full">
                8 min read
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End Avatar Media -->

      <!-- Content -->
      <div class="space-y-5 md:space-y-8">
        <div class="space-y-3">
          <h2 class="text-2xl font-bold md:text-3xl">{{ $post->title }}
          </h2>

          <p class="text-lg text-gray-800">
            {{ $post->description }}
          </p>
        </div>

        <p class="text-lg text-gray-800"> {{ $post->description }}</p>

        <div>
          @foreach ($post->categories as $category)
            <a class="m-1 inline-flex items-center gap-1.5 py-2 px-3 rounded-full text-sm bg-gray-100 text-gray-800 hover:bg-gray-200"
              href="#">
              {{ $category->name }}
            </a>
          @endforeach
        </div>
      </div>
      <!-- End Content -->
    </div>
  </div>
  <!-- End Blog Article -->
@endsection
