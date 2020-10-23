<div x-data="{ isMainMenuOpen: false }" class="md:bg-gray-100">
    <div x-bind:class="{ 'fixed z-40 inset-0 bg-black opacity-25': isMainMenuOpen}" @click="isMainMenuOpen = false" class="md:hidden"></div>
    <div x-bind:class="{ 'main-menu-open': isMainMenuOpen , 'main-menu-close': !isMainMenuOpen }" x-on:mainmenutoggle.window="isMainMenuOpen = !isMainMenuOpen" class="fixed z-50 top-0 bottom-0 w-64 md:w-full md:static md:flex md:flex-row max-w-screen-xl md:mx-auto main-menu-cover">
        <div class="w-full">
            
        
        
            <ul class="main-menu">
                <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"><div class="level-0 px-4 md:px-2 py-2 flex"> <a href="#">Home</a> </div></li>
                <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" x-data="{ expandMenuItem: false }" @click.away="expandMenuItem = false" @close.stop="expandMenuItem = false">
                    <div class="level-0 px-4 md:px-2 py-2 flex items-center"> 
                        <a href="#" class="flex-grow">Men</a>
                        <span class="mdi mdi-chevron-down px-2 cursor-pointer" @click="expandMenuItem = !expandMenuItem"></span> 
                    </div>
                    <ul x-show="expandMenuItem"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="transform opacity-0 md:scale-95"
                        x-transition:enter-end="transform opacity-100 md:scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 md:scale-100"
                        x-transition:leave-end="transform opacity-0 md:scale-95"
                        class="md:absolute md:z-50 md:py-1 md:mt-2 md:rounded-md md:shadow-lg md:w-48 bg-white">
                            <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"><div class="level-1 px-4 py-2 flex"> <a href="#">Home</a> </div></li>
                            <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"><div class="level-1 px-4 py-2 flex"> <a href="#">Home</a> </div></li>
                            <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"><div class="level-1 px-4 py-2 flex"> <a href="#">Home</a> </div></li>
                            <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" x-data="{ expandMenuItem: false }" @click.away="expandMenuItem = false" @close.stop="expandMenuItem = false">
                                <div class="level-1 px-4 py-2  flex items-center">
                                    <a href="#" class="flex-grow">1 Category One</a>
                                    <span class="mdi mdi-chevron-down px-2 cursor-pointer" @click="expandMenuItem = !expandMenuItem"></span>
                                </div>
                                <ul x-show="expandMenuItem"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="transform opacity-0 md:scale-95"
                                    x-transition:enter-end="transform opacity-100 md:scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 md:scale-100"
                                    x-transition:leave-end="transform opacity-0 md:scale-95"
                                    class="md:absolute py-1 md:z-50 md:mt-2 md:rounded-md md:shadow-lg md:w-48 bg-white">
                                        <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"><div class="level-2 px-4 py-2 flex"> <a href="#">2 Home</a> </div></li>
                                        <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"><div class="level-2 px-4 py-2 flex"> <a href="#">2 Home</a> </div></li>
                                        <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"><div class="level-2 px-4 py-2 flex"> <a href="#">2 Home</a> </div></li>
                                        <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"><div class="level-2 px-4 py-2 flex"> <a href="#">2 Home</a> </div></li>
                                        <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"><div class="level-2 px-4 py-2 flex"> <a href="#">2 Home</a> </div></li>
                                        <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"><div class="level-2 px-4 py-2 flex"> <a href="#">2 Home</a> </div></li>
                                </ul>
                            </li>
                            <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"><div class="level-1 px-4 py-2"> <a href="#">Home</a> </div></li>
                            <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"><div class="level-1 px-4 py-2"> <a href="#">Home</a> </div></li>
                    </ul>
                </li>
                <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"><div class="level-0 px-4 md:px-2 py-2 flex"> <a href="#">Category One</a> </div></li>
                <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"><div class="level-0 px-4 md:px-2 py-2 flex"> <a href="#">Category One</a> </div></li>
                <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"><div class="level-0 px-4 md:px-2 py-2 flex"> <a href="#">Category One</a> </div></li>
                <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"><div class="level-0 px-4 md:px-2 py-2 flex"> <a href="#">Category One</a> </div></li>
                <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"><div class="level-0 px-4 md:px-2 py-2 flex"> <a href="#">Category One</a> </div></li>
                <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"><div class="level-0 px-4 md:px-2 py-2 flex"> <a href="#">Category One</a> </div></li>
            </ul>



        </div>     
    </div>
</div>
