@if (count($_headers) > 0)
    <div class="overflow-y-auto border" style="max-height:500px">
        
        <div class="flex flex-col w-full md:table md:text-center">
            {{$col_group ?? ''}}
            <div class="hidden md:table-header-group">
                <div class="table-row">
                    @foreach ($_headers as $item)
                        <div class="px-2 py-2 table-cell">{{$item['name']}}</div>
                    @endforeach
                </div>
            </div>
            <div class="md:table-row-group" x-data="tableData()">
                <template x-if="data_list.length > 0">
                    <template x-for="row in data_list">
                        <div class="md:table-row odd:bg-gray-200">
                            @foreach ($_headers as $item)
                                <div class="flex flex-row justify-between w-full px-2 py-2 md:table-cell md:w-auto">
                                    <span class="md:hidden">{{$item['name']}}</span>
                                    <template x-if="'{{$item['key']}}' != 'action'"> 
                                        <span x-text="row['{{$item['key']}}']"></span>
                                    </template>
                                    <template x-if="'{{$item['key']}}' == 'action'"> 
                                        <template x-if="action_column.length > 0">
                                            <span>
                                                <template x-for="(action_cell, index) in action_column">
                                                    <span>
                                                        <template x-if="action_cell.type == 'get'">
                                                            <a :href="action_cell.url" x-text="action_cell.name"></a>
                                                        </template>
                                                        <template x-if="action_cell.type == 'post'">
                                                            <form :action="action_cell.url" method="post" class="inline pl-2">
                                                                <button type="submit" x-text="action_cell.name"></button>
                                                            </form>
                                                        </template>
                                                    </span>
                                                </template>
                                            </span>
                                        </template>
                                    </template>
                                </div>
                            @endforeach
                        </div>
                    </template>
                </template>
            </div>
        </div>
        
    </div>
    
    <script>
        function tableData() {
            return {
                data_list : {!! $_tableData !!} ,
                action_column : {!! $_actionColumn !!} ,
            }
        }
    </script>

@endif

