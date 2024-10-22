@extends('layouts.master')
@section('heading')
    {{ $guild ? "Khu vực Bang Hội" : 'Chưa có bang hội' }}
@endsection
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <style>
        .gm-panel {
            display: none;
        }
    </style>
    <div class="col-span-3">
        @if ($guild)
            <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light">
                <div class="p-2 dark:text-primary-light border-b dark:border-primary-light">
                    <h4 class="text-2xl font-semibold ">Thông Tin Bang Hội [{{ $guild->name }}]</h4>
                </div>
                <div class="p-2">
                    <ul class="max-w-md space-y-1 list-inside">
                        <li class="flex items-center">
                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            Tên bang hội: {{$guild->name}}
                        </li>
                        <li class="flex items-center">
                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            Cấp độ: {{$guild->level}}
                        </li>
                        <li class="flex items-center">
                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            Bang Chủ: [{{$guild->master->name}}]
                        </li>
                        <li class="flex items-center">
                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            Số lượng gia tộc: {{count($guild->families)}}
                        </li>
                        <li class="flex items-center">
                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            Tổng số thành viên: {{$guild->totalMember()}}
                        </li>
                        <li class="flex items-center">
                            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            Đang trực tuyến: {{$guild->totalOnline()}}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light">
                <div class="p-2 dark:text-primary-light border-b dark:border-primary-light">
                    <h4 class="text-2xl font-semibold ">Danh Sách Thành Viên</h4>
                </div>
                <div class="p-2">
                    <div class="md:flex">
                        <ul class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0"
                            id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content"
                            data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500"
                            data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300">
                            @foreach ($guild->families as $item)
                                <li role="presentation">
                                    <button style="color: white" id="profile-styled-tab"
                                        data-tabs-target="#styled-profile{{ $item->id }}" type="button" role="tab"
                                        aria-controls="profile" aria-selected="false"
                                        class="inline-flex items-center px-4 py-3 text-white bg-green-700 rounded-lg active w-full dark:bg-green-600"
                                        aria-current="page">
                                        <svg style="color: white" class="w-4 h-4 me-2 text-gray-500 dark:text-gray-400"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 18 18">
                                            <path
                                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                                        </svg>
                                        {{ $item->name }}
                                    </button>
                                </li>
                            @endforeach

                        </ul>
                        @foreach ($guild->families as $item)
                            <div class="p-6 bg-gray-50 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full"
                                id="styled-profile{{ $item->id }}" role="tabpanel" aria-labelledby="profile-tab">
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Thành viên gia tộc [{{ $item->name }}]</h3>
                                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

                                <div class="relative overflow-x-auto">
                                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                    Nhân vật
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Môn Phái
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Level
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                    Trạng thái
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Chức vụ
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($item->chars as $char)
                                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                        {{ getName($char->char_id) }}
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        {{ getNv($char->char_id)->getClass() }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ ($char->char->level) }}
                                                    </td>
                                                    <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                        @if (roleOnline($char->char_id))
                                                            <span
                                                                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Online</span>
                                                        @else
                                                            <span
                                                                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Offline</span>
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $char->char_id == $item->master_id ? 'Tộc Trưởng' : '---' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
