<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0" />
  <title>@yield('title')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @stack('js')
  @vite(['resources/js/alpine.js'])
</head>

<body class="h-screen bg-slate-50">
  <div class="h-full" x-data="{ open: false }">
    <!-- ========== HEADER ========== -->
    <header
      class="sticky top-0 inset-x-0 flex flex-wrap sm:justify-start sm:flex-nowrap z-10 w-full bg-white border-b text-sm py-2.5 sm:py-4 md:ps-64">
      <nav
        class="flex items-center w-full px-4 mx-auto basis-full sm:px-6">
        <div class="me-5 md:me-0 md:hidden">
          <x-sidebar.logo />
        </div>

        <div x-data="{ open: false }"
          class="relative inline-block text-left ms-auto">
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
            class="absolute right-0 z-30 w-56 mt-2 bg-white divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
            <div class="py-1">
              <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
              <a href="{{ route('public.posts.index') }}";
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Home</a>
              <a href="{{ route('dashboard.index') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Dashboard</a>
              <a href="#"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Profile</a>
            </div>
            <div class="py-1" role="none">
              <a href="#"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Logout</a>
            </div>
          </div>
        </div>

      </nav>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <!-- Breadcrumb -->
    <div
      class="sticky inset-x-0 top-0 z-20 px-4 bg-white border-y sm:px-6 md:px-8 md:hidden">
      <div class="flex items-center justify-between py-2">
        <!-- Breadcrumb -->
        <ol class="flex items-center whitespace-nowrap">
          <li class="inline-flex items-center">
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600"
              href="#">
              Home
            </a>
            <svg
              class="flex-shrink-0 mx-2 overflow-visible text-gray-400 size-4"
              xmlns="http://www.w3.org/2000/svg" width="24"
              height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="m9 18 6-6-6-6"></path>
            </svg>
          </li>
          <li class="inline-flex items-center">
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600"
              href="#">
              App Center
              <svg
                class="flex-shrink-0 mx-2 overflow-visible text-gray-400 size-4"
                xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
              </svg>
            </a>
          </li>
          <li
            class="inline-flex items-center text-sm font-semibold text-gray-800 truncate"
            aria-current="page">
            Application
          </li>
        </ol>
        <!-- End Breadcrumb -->

        <!-- Sidebar -->
        <button x-on:click.stop="open = !open" type="button"
          class="py-2 px-3 flex justify-center items-center gap-x-1.5 text-xs rounded-lg border border-gray-200 text-gray-500 hover:text-gray-600">
          <svg class="flex-shrink-0 size-4"
            xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 8L21 12L17 16M3 12H13M3 6H13M3 18H13" />
          </svg>
          <span class="sr-only">Sidebar</span>
        </button>
        <!-- End Sidebar -->
      </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Sidebar -->
    <div x-on:click.away="open = false"
      class="bg-white -translate-x-full transition-all duration-300 transform w-[260px] fixed inset-y-0 start-0  z-20  border-e border-gray-200"
      x-bind:class="open ? 'block translate-x-0 end-auto bottom-0' :
          'hidden md:block md:translate-x-0 md:end-auto md:bottom-0'">
      <div class="px-8 pt-4">
        <x-sidebar.logo />
      </div>

      <nav class="flex flex-col flex-wrap w-full p-6">
        <ul class="space-y-1.5">
          <li>
            <x-sidebar.anchor label="Dashboard"
              route="dashboard.index" leftIcon="fa-solid fa-home" />
          </li>
          <li x-data="{ open: '{{ Route::currentRouteName() }}' === 'dashboard.posts.index' || '{{ Route::currentRouteName() }}' === 'dashboard.posts.create' }">
            <x-sidebar.button x-on:click="open = !open" label="Posts"
              leftIcon="fa-solid fa-layer-group"
              rightIcon="fa-solid fa-angle-down" />

            <ul class="pt-2 ps-3" x-bind:class="open ? '' : 'hidden'">
              <li>
                <x-sidebar.anchor label="Crear nuevo post"
                  route="dashboard.posts.create"
                  leftIcon="fa-solid fa-plus" />
              </li>
              <li>
                <x-sidebar.anchor label="Lista de posts"
                  route="dashboard.posts.index"
                  leftIcon="fa-solid fa-layer-group" />
              </li>
            </ul>
          </li>
          <li x-data="{ open: '{{ Route::currentRouteName() }}' === 'dashboard.categories.index' || '{{ Route::currentRouteName() }}' === 'dashboard.categories.create' }">
            <x-sidebar.button x-on:click="open = !open"
              label="Categories" leftIcon="fa-solid fa-layer-group"
              rightIcon="fa-solid fa-angle-down" />

            <ul class="pt-2 ps-3"
              x-bind:class="open ? '' : 'hidden'">
              <li>
                <x-sidebar.anchor label="Crear nueva categoria"
                  route="dashboard.categories.create"
                  leftIcon="fa-solid fa-plus" />
              </li>
              <li>
                <x-sidebar.anchor label="Lista de categorias"
                  route="dashboard.categories.index"
                  leftIcon="fa-solid fa-layer-group" />
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
    <!-- End Sidebar -->

    <!-- Content -->
    <div class="w-full md:ps-64">
      <div class="p-4 space-y-4 sm:p-6 sm:space-y-6">
        <!-- your content goes here ... -->
        @yield('content')
      </div>
    </div>
  </div>
  <!-- End Content -->
  <!-- ========== END MAIN CONTENT ========== -->
  @session('success')
    <script>
      const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: true,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "success",
        title: @json(session('success'))
      });
    </script>
  @endsession
</body>

</html>
