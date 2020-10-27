@if (count($_headers) > 0)  
    <div class="rounded overflow-hidden shadow-sm border border-gray-100 mb-4">
        <div class="py-2 px-2 md:px-3 overflow-y-auto border-b border-gray-100">
            <h3 class="text-2xl">{{$_table_name}}</h3>
        </div>
        <div class="overflow-x-hidden overflow-y-auto">
            {{-- table start --}}
            <div class="flex flex-col w-full md:table md:text-center">
                {{$col_group ?? ''}}
                <div class="hidden md:table-header-group">
                    <div class="table-row">
                        @foreach ($_headers as $item)
                            <div class="px-2 py-2 table-cell font-semibold">{{$item['name']}}</div>
                        @endforeach
                    </div>
                </div>
                <div class="md:table-row-group text-sm" x-data="tableData()">
                    <template x-if="data_list.length > 0">
                        <template x-for="row in data_list">
                            <div class="md:table-row odd:bg-gray-100">
                                @foreach ($_headers as $item)
                                    <div class="flex flex-row justify-between w-full px-2 py-2 md:table-cell md:w-auto">
                                        <span class="md:hidden">{{$item['name']}}</span>
                                        @if ($item['type'] == 'data')
                                            <span x-text="row['{{$item['key']}}']"></span>
                                        @elseif($item['type'] == 'html' && $_template_path != null)
                                            @php $template = $_template_path . '.' . $item['key']; @endphp
                                            @include($template, ['item' => $item])
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </template>
                    </template>
                </div>
                {{-- table end --}}
            </div>
        </div>
        <div class="px-2 md:px-3 py-2 flex items-center justify-between">
            <div class="text-sm text-gray-700 leading-5">
                {!! __('Showing') !!} <span class="font-medium">1</span> {!! __('to') !!} <span class="font-medium">10</span> {!! __('of') !!} <span class="font-medium">100</span> {!! __('results') !!}
            </div>
            <div class="relative z-0 inline-flex">
                <button class="relative inline-flex items-center pr-4 md:pr-2 py-2 text-sm font-medium text-gray-400 bg-white leading-5 hover:text-gray-600 focus:z-10 focus:outline-none active:bg-gray-100 active:text-gray-800 transition ease-in-out duration-150">
                    <span class="mdi mdi-chevron-left text-2xl"></span>
                </button>
                <button class="relative inline-flex items-center pl-4 md:pl-2 py-2 text-sm font-medium text-gray-400 bg-white leading-5 hover:text-gray-600 focus:z-10 focus:outline-none active:bg-gray-100 active:text-gray-800 transition ease-in-out duration-150">
                    <span class="mdi mdi-chevron-right text-2xl"></span>
                </button>
            </div>
        </div>
    </div>
    <script>
        function tableData() {
            return {
                data_list : {!! $_tableData !!} ,
            }
        }
    </script>

@endif

