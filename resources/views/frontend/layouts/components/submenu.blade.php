@foreach ($parents as $parent)
    @if (isset( $data[ $parent['id']]))
        <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" x-data="{ expandMenuItem: false }" @click.away="expandMenuItem = false" @close.stop="expandMenuItem = false">
            <div class="level-{{$level}} px-4 py-2 @if ($level == 0) md:pl-0 md:pr-2 @endif flex items-center">
                <a href="/{{$parent['slug']}}" class="flex-grow">{{$parent['title']}}</a> 
                <span class="mdi mdi-chevron-down pl-3 cursor-pointer" @click="expandMenuItem = !expandMenuItem"></span>
            </div>
            <ul x-show="expandMenuItem" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 md:scale-95" x-transition:enter-end="transform opacity-100 md:scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 md:scale-100" x-transition:leave-end="transform opacity-0 md:scale-95" class="md:absolute py-1 md:z-50 md:mt-2 md:rounded-md md:shadow-lg md:w-48 bg-white">
                @include('frontend.layouts.components.submenu', ['data' => $data, 'parents' => $data[$parent[ 'id' ]],'level' => $level + 1, ])
            </ul>
        </li>
    @else
        <li class="text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
            <div class="level-{{$level}} px-4 @if ($level == 0) md:pl-0 md:pr-2 @endif py-2 flex">
                <a href="/{{$parent['slug']}}" class="flex-grow">{{$parent['title']}}</a> 
            </div>
        </li>
    @endif
@endforeach 

