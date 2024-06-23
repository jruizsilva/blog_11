@extends('layouts.app')

@section('title', 'Blog')

@section('content')
  main
  {{-- <div class="font-sans antialiased text-black/50 ">
    <header
      class="grid items-center grid-cols-2 gap-2 py-10 lg:grid-cols-3">
      @auth
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit">Logout</button>
        </form>
      @endauth
      @if (Route::has('login'))
        <nav class="flex justify-end flex-1 -mx-3">
          @auth
            <a href="{{ url('/dashboard') }}"
              class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
              Dashboard
            </a>
          @else
            <a href="{{ route('login.index') }}"
              class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
              Log in
            </a>

            @if (Route::has('register'))
              <a href="{{ route('register') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                Register
              </a>
            @endif
          @endauth
        </nav>
      @endif
    </header>
  </div> --}}
@endsection
