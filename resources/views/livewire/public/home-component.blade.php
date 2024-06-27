<div
  class="flex flex-col max-w-5xl px-4 py-10 mx-auto sm:px-6 gap-y-6">
  <!-- Grid -->
  <div class="grid gap-2 lg:grid-cols-3">
    @foreach ($this->posts as $post)
      @livewire('common.post-card-component', ['post' => $post])
    @endforeach
  </div>
  <!-- End Grid -->
  {{ $this->posts->links() }}
</div>
