<div
    x-data="{
        show: @if ($_isModalOpen) true @else false @endif,
        parsistant:  @if ($_isParsistant) true @else false @endif,
        canClose() {
            if(!this.parsistant) {
                this.show = false
            }
        },
        closeModal() {
            this.show = false
        },
        openmodal(){
            this.show = true
        },
        focusables() {
            let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'
            return [...$el.querySelectorAll(selector)].filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
    }"
    x-on:{{$_id}}close.window="closeModal()"
    x-on:{{$_id}}open.window="openmodal()"
    x-on:close.stop="canClose()"
    x-on:keydown.escape.window="canClose()"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-show="show"
    id="{{$_id}}"
    class="fixed top-0 inset-x-0 px-4 pt-6 z-50 sm:px-0 sm:flex sm:items-top sm:justify-center"
    style="display: none;">
    <div 
        x-show="show" 
        class="fixed inset-0 transform transition-all"
        x-on:click="canClose()"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-black opacity-25"></div>
    </div>
    <div 
        x-show="show" 
        class="bg-white rounded overflow-hidden shadow-xl transform transition-all lg:max-w-screen-lg md:max-w-screen-md w-full sm:mx-4"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
        {{ $slot }}
    </div>
</div>

