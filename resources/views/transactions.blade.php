@extends('layouts.master')
@section('content')
    <div class="col-span-3">
        <div class="mx-auto rounded max-w-3xl xl:-mx-4">
            <!-- Tabs -->
            <ul id="tabs"
                class="flex inline-flex w-full list-none px-1 pt-2 bg-transparent border rounded-t dark:border-primary-darker">
                <li
                    class="flex flex-1 justify-center px-4 py-2 font-semibold dark:border-primary border-b -mb-px opacity-100 border-l border-t border-r rounded-t bg-gray-50 dark:bg-primary">
                    <a id="default-tab" href="#ingame">Đổi KNB</a>
                </li>
                <li class="flex flex-1 justify-center px-4 py-2 font-semibold"><a href="#paymentwall">Web Shop (Coming Soon)</a></li>
            </ul>

            <!-- Tab Contents -->
            <div id="tab-contents"
                class="ml-4 w-full px-1 pt-2 bg-transparent border-l border-r border-b dark:border-primary-darker">
                <div id="ingame" class="p-4 mx-auto">
                    @if( count($knbs) )
                            <div
                                class="bg-white dark:bg-primary shadow-md rounded border border-gray-300 dark:border-primary-light justify-items-center">
                                <table class="w-full table-auto">
                                    <thead>
                                    <tr class="bg-gray-200 dark:bg-primary dark:text-light text-gray-600 uppercase text-xs leading-normal">
                                        <th class="py-3 px-6 text-left">#</th>
                                        <th class="py-3 px-6 text-left">Số xu</th>
                                        <th class="py-3 px-6 text-left">KNB nhận được</th>
                                        <th class="py-3 px-6 text-left">Ngày đổi</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-xs dark:text-light">
                                        @foreach( $knbs as $item )
                                            <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100 dark:border-primary dark:bg-darker dark:hover:bg-primary-dark">
                                                <td class="py-3 px-6 text-left">
                                                    <div class="flex items-center">
                                                        <span>{{ $loop->index + 1 }}</span>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-left">
                                                    <div class="flex items-center">
                                                        <span>{{ $item->knb_amount }}</span>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-left">
                                                    <div class="flex items-center">
                                                        <span>{{ $item->knb_amount * 3 / 1000 }}</span>
                                                    </div>
                                                </td>
                                                <td class="py-3 px-6 text-left">
                                                    <div class="flex items-center">
                                                        <span>{{ \Carbon\Carbon::parse($item->created_at)->format("d/m/Y H:i:s") }}</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                        Chưa có giao dịch nào!
                        @endif
                    
                </div>
            </div>
        </div>
    </div>
@endsection
