<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>App Name - @yield('title')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="h-screen bg-gray-100">
  <!-- ========== HEADER ========== -->
  <header class="bg-white border-b text-sm py-2.5 sm:py-4">
    <div
      class="flex items-center justify-between w-full px-4 gap-x-5 sm:px-6">
      <div>
        <x-sidebar.logo />
      </div>

      <nav class="text-sm font-medium text-gray-500">
        <a class="hover:text-black focus:outline-none focus:text-gray-500 md:ml-auto"
          href="{{ route('home') }}">Home</a>
      </nav>

      @auth
        <div x-data="{ open: false }"
          class="relative inline-block text-left">
          <div>
            <button type="button" x-on:click.stop="open = !open"
              class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
              {{ Auth::user()->name }}
              <svg class="w-5 h-5 -mr-1 text-gray-400"
                viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                  clip-rule="evenodd" />
              </svg>
            </button>
          </div>
          <div x-bind:class="open ? '' : 'hidden'"
            x-on:click.away="open = false"
            class="absolute right-0 z-10 w-56 mt-2 bg-white divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
            <div class="py-1">
              <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
              <a href="{{ route('home') }}";
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Home</a>
              <a href="{{ route('dashboard.index') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Dashboard</a>
              <a href="#"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Profile</a>
            </div>
            <div class="py-1" role="none">
              <form action="{{ route('logout') }}" method="post">
                @csrf
                <button
                  class="block w-full px-4 py-2 text-sm text-gray-700 text-start hover:bg-gray-100 hover:text-gray-900"
                  type="submit">Logout</button>
              </form>
            </div>
          </div>
        </div>
      @endauth

      @guest
        <div
          class="flex items-center text-sm font-medium text-gray-500 gap-x-3">
          <a class="hover:text-black focus:outline-none focus:text-gray-500"
            href="{{ route('login.index') }}">Login</a>
          <a class="inline-flex items-center justify-center h-8 gap-3 px-5 py-3 text-xs font-medium text-white duration-200 bg-gray-900 rounded-lg hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black"
            href="{{ route('register.index') }}">Register</a>
        </div>
      @endguest

    </div>
  </header>
  <!-- ========== END HEADER ========== -->
  @yield('content')
</body>

</html>
