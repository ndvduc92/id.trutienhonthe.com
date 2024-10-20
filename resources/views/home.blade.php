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
                    <div class="user-block" style="display:inline">
                        <img class="img-circle img-bordered-sm" width="50" src="/fe/img/logo.png" alt="user image"> 
                    </div>
                    <p>
                        {!! $item->msg !!} <span class="description" style="color: gray"> - {{ timeAgo($item->date) }}</span>
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