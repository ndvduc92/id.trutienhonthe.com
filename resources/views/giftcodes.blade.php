@extends('layouts.master')
@section('heading')
    Nhận Giftcodes
@endsection
@section('content')
    <div class="col-span-3">
        <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light">
            <div class="p-2 dark:text-primary-light border-b dark:border-primary-light">
                <h4 class="text-2xl font-semibold ">Nhân vật nhận giftcode: <strong style="">{{ Auth::user()->main_id ? Auth::user()->getMain() : 'Chưa chọn nhân vật' }}</strong></h4>
            </div>
            <div class="p-2">
                <p>Phải chọn nhân vật ở trên thanh menu trước khi nhận giftcode</p>
                <code>* * * * * Toàn bộ đều là vật phẩm khóa</code>
            </div>
        </div>
        <div
            class="bg-white dark:bg-primary shadow-md rounded border border-gray-300 dark:border-primary-light justify-items-center">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 dark:bg-primary dark:text-light text-gray-600 uppercase text-xs leading-normal">
                        <th class="py-3 px-6 text-left">#</th>
                        <th class="py-3 px-6 text-left">Giftcode</th>
                        <th class="py-3 px-6 text-left">Vật phẩm</th>
                        <th class="py-3 px-6 text-left">Trạng thái</th>
                        <th class="py-3 px-6 text-left">Thao tác</th>

                    </tr>
                </thead>
                <tbody class="text-gray-600 text-xs dark:text-light">
                    @foreach ($giftcodes as $item)
                        <tr
                            class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100 dark:border-primary dark:bg-darker dark:hover:bg-primary-dark">
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ $loop->index + 1 }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    {{ $item->giftcode }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <ul>
                                        @foreach ($item->items as $it)
                                            <li>{{ $it->quantity }} cái {{ $it->name }}
                                                ({{ $it->bind == '19' ? 'Khóa' : 'Không khóa' }})</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    @if(count($item->items))
                                    {{ $item->beUsedByUser() ? 'Đã sử dụng' : 'Chưa sử dụng' }}
                                    @else
                                    Chưa cập nhật
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    @if (!$item->beUsedByUser() && count($item->items))
                                        <a href="/giftcodes/{{ $item->id }}/using"
                                            class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker mr-2">
                                            Sử dụng
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
