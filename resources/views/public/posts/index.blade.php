@extends('layouts.app')

@section('title', 'Blog')

@section('content')
  <div class="flex flex-col max-w-5xl p-5 mx-auto sm:p-10 gap-y-6">
    <!-- Grid -->
    <div class="grid gap-2 lg:grid-cols-3">
      @foreach ($posts as $post)
        <div
          class="p-4 overflow-hidden bg-white border shadow-sm rounded-xl">
          <h3
            class="relative text-lg font-medium text-black line-clamp-1">
            {{ $post->title }}
          </h3>
          <p
            class="mt-1 text-gray-600 dark:text-neutral-400 line-clamp-3">
            {{ $post->description }}
          </p>

          <div class="flex flex-wrap gap-2 mt-3">
            @foreach ($post->categories as $category)
              <span
                class="py-1.5 px-3 bg-white text-gray-600 border border-gray-200 text-xs sm:text-sm rounded-xl">
                {{ $category->name }}
              </span>
            @endforeach
          </div>
        </div>
      @endforeach
    </div>
    <!-- End Grid -->
    {{ $posts->links('pagination') }}
  </div>

@endsection
