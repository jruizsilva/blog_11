<div>
  <p>count: {{ $count }}</p>
  <button x-on:click="$wire.increment">Increment</button>
  <button wire:click='decrement'>Decrement</button>
</div>
