@extends('layouts.master')
@section('content')
@php
$colors = array("primary", "secondary", "success", "danger", "warning", "info", "light", "dark");
@endphp
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Lịch sử mua vật phẩm</h1>
        </div>
    </div>
    @foreach ($shops as $item)
    <p>
        @php
            $color = $colors[array_rand($colors)];
        @endphp
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
          </svg> <span>Người chơi <strong class="text-{{$color}}">{{ $item->getCharName() }} </strong>đã mua {{ $item->shop_quantity  }} cái <strong class="text-{{$color}}">{{ $item->shop->name }} </strong> tại shop vật phẩm lúc {{ \Carbon\Carbon::parse($item->created_at)->format("H:i:s d/m/Y") }}</strong>
    </p>
    @endforeach
</div>
@endsection