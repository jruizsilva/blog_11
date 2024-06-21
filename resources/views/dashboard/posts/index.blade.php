@extends('layouts.dashboard')

@section('title', 'Dashboard - Posts')

@section('content')
  <main>
    <div class="flex flex-col">
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
              <thead>
                <tr>
                  <th scope="col"
                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                    Id</th>
                  <th scope="col"
                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                    Title</th>
                  <th scope="col"
                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">
                    Description</th>
                  <th scope="col"
                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end">
                    Action</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                @foreach ($posts as $post)
                  <tr>
                    <td
                      class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap">
                      {{ $post->id }}</td>
                    <td
                      class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap">
                      {{ $post->title }}</td>
                    <td
                      class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap">
                      {{ $post->description }}</td>
                    <td
                      class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                      <button type="button"
                        class="inline-flex items-center text-sm font-semibold text-blue-600 border border-transparent rounded-lg gap-x-2 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Edit</button>
                      <button type="button"
                        class="inline-flex items-center text-sm font-semibold text-blue-600 border border-transparent rounded-lg gap-x-2 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Delete</button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection