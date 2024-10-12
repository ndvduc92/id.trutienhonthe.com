@extends('layouts.master')
@section('content')
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Danh sách VIP</h1>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-12">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Tài khoản</th>
                <th scope="col">Vip Level</th>
                <th scope="col">Ngày hết hạn</th>
                <th scope="col">KNB đã nạp</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($vips as $item)
              @if(getAcc($item["userid"]) && !in_array($item["userid"], $ignores))
              <tr>
                <td><strong style="color:blue">{{ getChar($item["userid"]) }}</strong> ({{ getAcc($item["userid"]) }})</td>
                <td>{{ $item["viplevel"] }}</td>
                <td>{{\Carbon\Carbon::parse($item["endtime"])->format("d/m/Y")}}</td>
                <td>
                  {{ number_format($item["totalcash"]) }}
                </td>
              </tr>
              @endif
            @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection