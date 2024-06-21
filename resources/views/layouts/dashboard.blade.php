<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0" />
  <title>App Name - @yield('title')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div x-data="{ open: false }">
    <!-- ========== HEADER ========== -->
    <header
      class="sticky top-0 inset-x-0 flex flex-wrap sm:justify-start sm:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 sm:py-4 md:ps-64">
      <nav
        class="flex items-center w-full px-4 mx-auto basis-full sm:px-6"
        aria-label="Global">
        <div class="me-5 md:me-0 md:hidden">
          <x-sidebar.logo />
        </div>

        <div
          class="flex items-center justify-end w-full ms-auto sm:justify-between sm:gap-x-3 sm:order-3">
          <div class="sm:hidden">
            <button type="button"
              class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-slate-100 disabled:opacity-50 disabled:pointer-events-none">
              <svg class="flex-shrink-0 size-4"
                xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.3-4.3" />
              </svg>
            </button>
          </div>

          <div class="hidden sm:block">
            <div class="min-w-72 md:min-w-80">
              <x-input icon="fa-solid fa-magnifying-glass"
                placeholder="Search" />
            </div>
          </div>

          <div class="flex flex-row items-center justify-end gap-2">
            <button type="button"
              class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-slate-100 disabled:opacity-50 disabled:pointer-events-none">
              <svg class="flex-shrink-0 size-4"
                xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
              </svg>
            </button>
            <button type="button"
              class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-slate-100 disabled:opacity-50 disabled:pointer-events-none"
              data-hs-offcanvas="#hs-offcanvas-right">
              <svg class="flex-shrink-0 size-4"
                xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 12h-4l-3 9L9 3l-3 9H2" />
              </svg>
            </button>

            <div
              class="hs-dropdown [--placement:bottom-right] relative inline-flex">
              <button id="hs-dropdown-with-header" type="button"
                class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-slate-100 disabled:opacity-50 disabled:pointer-events-none">
                <img
                  class="inline-block size-[38px] rounded-full ring-2 ring-white"
                  src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                  alt="Image Description" />
              </button>

              <div
                class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2"
                aria-labelledby="hs-dropdown-with-header">
                <div class="px-5 py-3 -m-2 bg-gray-100 rounded-t-lg">
                  <p class="text-sm text-gray-500">
                    Signed in as
                  </p>
                  <p class="text-sm font-medium text-gray-800">
                    james@site.com
                  </p>
                </div>
                <div class="py-2 mt-2 first:pt-0 last:pb-0">
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-slate-100 focus:ring-2 focus:ring-blue-500"
                    href="#">
                    <svg class="flex-shrink-0 size-4"
                      xmlns="http://www.w3.org/2000/svg"
                      width="24" height="24"
                      viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path
                        d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                      <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
                    </svg>
                    Newsletter
                  </a>
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-slate-100 focus:ring-2 focus:ring-blue-500"
                    href="#">
                    <svg class="flex-shrink-0 size-4"
                      xmlns="http://www.w3.org/2000/svg"
                      width="24" height="24"
                      viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path
                        d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                      <path d="M3 6h18" />
                      <path d="M16 10a4 4 0 0 1-8 0" />
                    </svg>
                    Purchases
                  </a>
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-slate-100 focus:ring-2 focus:ring-blue-500"
                    href="#">
                    <svg class="flex-shrink-0 size-4"
                      xmlns="http://www.w3.org/2000/svg"
                      width="24" height="24"
                      viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round">
                      <path
                        d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                      <path d="M12 12v9" />
                      <path d="m8 17 4 4 4-4" />
                    </svg>
                    Downloads
                  </a>
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-slate-100 focus:ring-2 focus:ring-blue-500"
                    href="#">
                    <svg class="flex-shrink-0 size-4"
                      xmlns="http://www.w3.org/2000/svg"
                      width="24" height="24"
                      viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round">
                      <path
                        d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                      <circle cx="9" cy="7" r="4" />
                      <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                      <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                    Team Account
                  </a>
                </div>
              </div>
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
      class="bg-slate-50 -translate-x-full transition-all duration-300 transform w-[260px] fixed inset-y-0 start-0 z-[60]  border-e border-gray-200"
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
          <li x-data="{ open: '{{ Route::currentRouteName() }}' === 'dashboard.posts.index' }">
            <x-sidebar.button x-on:click="open = !open"
              label="Posts" leftIcon="fa-solid fa-layer-group"
              rightIcon="fa-solid fa-angle-down" />

            <ul class="pt-2 ps-3"
              x-bind:class="open ? '' : 'hidden'">
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
        </ul>
      </nav>
    </div>
    <!-- End Sidebar -->

    <!-- Content -->
    <div class="w-full h-screen bg-slate-50 md:ps-64">
      <div class="p-4 space-y-4 sm:p-6 sm:space-y-6">
        <!-- your content goes here ... -->
        @yield('content')
      </div>
    </div>
  </div>
  <!-- End Content -->
  <!-- ========== END MAIN CONTENT ========== -->
</body>

</html>
