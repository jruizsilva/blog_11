<main class="max-w-5xl p-4 mx-auto sm:p-6">
  <!-- Card -->
  <div class="relative p-4 bg-white shadow rounded-xl sm:p-7">
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
    <form wire:submit.prevent="update">
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
              src="{{ $this->image ? $this->image->temporaryUrl() : $this->user->image }}"
              alt="Image Description">
            <div class="flex flex-col gap-y-1">
              <input wire:model='image' type="file" name="image"
                class="block w-full text-sm text-gray-500 file:me-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:hover:bg-gray-200 file:disabled:opacity-50 file:disabled:pointer-events-none">
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
          <x-input name="name" wire:model='name' />
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
          <x-input name="last_name" wire:model='last_name' />
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
          <x-input wire:model='email' type="email" name="email" />
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
          <x-input wire:model='username' type="username"
            name="username" />
          @error('username')
            {{ $message }}
          @enderror
        </div>
      </div>
      <!-- End Grid -->

      <div class="flex justify-end mt-5 gap-x-2">
        <a href="{{ route('public.home.index') }}"
          class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
          Cancel
        </a>
        <button type="submit"
          class="inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
          Save changes
        </button>
      </div>
    </form>
    @if ($this->image !== Storage::url('users/images/user.png'))
      <form wire:submit="destroyImage" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit"
          class="absolute inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-gray-800 border border-transparent rounded-lg left-5 bottom-6 bg-yellow-50 gap-x-2 hover:bg-yellow-200 disabled:opacity-50 disabled:pointer-events-none">
          Eliminar imagen
        </button>
      </form>
    @endif

  </div>
  <!-- End Card -->
</main>
