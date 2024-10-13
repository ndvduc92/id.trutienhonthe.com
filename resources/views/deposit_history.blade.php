@extends('layouts.master')
@section('heading')
LỊCH SỬ NẠP TIỀN
@endsection
@section('content')
    <div class="col-span-3">
        <div
            class="bg-white dark:bg-primary shadow-md rounded border border-gray-300 dark:border-primary-light justify-items-center">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 dark:bg-primary dark:text-light text-gray-600 uppercase text-xs leading-normal">
                        <th class="py-3 px-6 text-left">#</th>
                        <th class="py-3 px-6 text-left">Số tiền</th>
                        <th class="py-3 px-6 text-left">Xu nhận được</th>
                        <th class="py-3 px-6 text-left">Xu thực nhận (sau KM)</th>
                        <th class="py-3 px-6 text-left">Thời gian</th>
                        
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-xs dark:text-light">
                    @foreach ($histories as $item)
                        <tr
                            class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100 dark:border-primary dark:bg-darker dark:hover:bg-primary-dark">
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ $loop->index + 1 }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ number_format($item->amount) }}đ
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ $item->amount }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ $item->amount_promotion }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ \Carbon\Carbon::parse($item->processing_time)->format("d/m/Y H:i:s") }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
