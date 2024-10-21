@extends('layouts.master')
@section('heading')
    Chào mừng bạn đến với Tru Tiên Hỗn Thế
@endsection
@section('content')
    <div class="col-span-3">
        <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light">
            <div class="p-2 dark:text-primary-light border-b dark:border-primary-light">
                <h4 class="text-2xl font-semibold ">Hoạt động Ingame</h4>
            </div>
            <div class="p-2">
                <div class="col-12">
                    @foreach ($loggings as $item)
                        <div class="post">
                            <p>
                                <svg style="display:inline" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-award" viewBox="0 0 16 16">
                                    <path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702z"/>
                                    <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1z"/>
                                  </svg> {!! $item->msg !!} <span class="description" style="color: gray"> -
                                    {{ timeAgo($item->date)['time'] }}
                                    <small>
                                        ({{ timeAgo($item->date)['showDate'] ? Carbon\Carbon::parse($item->date)->format('d/m/Y H:i:s') : Carbon\Carbon::parse($item->date)->format('H:i:s') }})</small>
                                    </span>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <style>
        .highlight {
            color: #dc3741;
        }

        .post {
            border-bottom: 1px solid gray;
            margin-bottom: 15px;
            padding-bottom: 15px;
        }
    </style>
@endsection
