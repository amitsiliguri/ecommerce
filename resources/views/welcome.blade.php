<x-guest-layout>
  <div x-data="{ open: false }">
      <button @click="open = true">Open Dropdown</button>

      <ul x-show="open" @click.away="open = false">
          Dropdown Body
      </ul>
  </div>
</x-guest-layout>
