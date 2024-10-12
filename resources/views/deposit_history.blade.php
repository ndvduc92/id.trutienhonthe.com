@extends('layouts.master')
@section('content')
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Lịch sử nạp tiền ({{ number_format($histories->sum('amount')) }} - {{ number_format($histories->sum('amount_promotion'))  }})</h1>
        </div>
    </div>
    @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <small>{{ Session::get('error') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <small>{{ Session::get('success') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="">
        <table class="table app-table-hover mb-0 text-left">
            <thead>
                <tr>
                    <th class="cell">#</th>
                    <th class="cell">Số tiền</th>
                    <th class="cell">Xu nhận được</th>
                    <th class="cell">Xu thực nhận (sau KM)</th>
                    <th class="cell">Thời gian</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $item)
                <tr>
                    <td class="cell">{{ $loop->index + 1 }}</td>
                    <td class="cell">{{ number_format($item->amount) }}đ</td>
                    <td class="cell">{{ $item->amount }}</td>
                    <td class="cell">{{ $item->amount_promotion }}</td>
                    <td class="cell">{{ \Carbon\Carbon::parse($item->processing_time)->format("d/m/Y H:i:s") }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>



    </div>
</div>
@endsection