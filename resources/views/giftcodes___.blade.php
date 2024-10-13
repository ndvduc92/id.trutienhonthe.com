@extends('layouts.master')
@section('content')
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Danh sách giftcode</h1>*Lưu ý: chọn nhân vật mặc
            định trước khi thao tác, nếu chọn sai, chúng tôi sẽ không chịu trách nhiệm</small>
            <p><small style="">*Nếu không thấy nhân vật, <a href="/update_char">bấm vào đây</a> để cập nhật</small></p>
        </div>
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
    <form class="row" action="/set_main_char" method="POST">
      @csrf
      <div class="col-4">
        <select name="main_id" class="form-control" style="padding-top: 0;padding-bottom: 0;">
            <option value="">---Chọn nhân vật---</option>
            @foreach (Auth::user()->chars() as $item)
            <option value="{{ $item['char_id'] }}" @php if ($item['char_id'] == Auth::user()->main_id) {
                echo 'selected';
            } @endphp>{{ $item['char_id'] }} - {{ $item->getName() }} - {{ $item->getClass() }}</option>
            @endforeach
        </select>
    </div>

      <div class="col-4">
          <button type="submit" class="btn btn-sm btn-success text-center">Chọn nhân vật</button>
      </div>
  </form>
  <br>

<div class="row g-4">
    <div class="col-12">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Giftcode</th>
                <th scope="col">Phần thưởng</th>
                <th scope="col">Ngày hết hạn</th>
                <th scope="col">Lượt dùng</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($giftcodes as $item)
              <tr>
                <td>{{ $item->giftcode }}</td>
                <td>{{ $item->award }}</td>
                <td>{{\Carbon\Carbon::parse($item->expired)->format("d/m/Y")}}</td>
                <td>{{ $item->count }}</td>
                <td>
                    @if ($item->beUsedByUser())
                    <button class="btn btn-success" disabled>Đã sử dụng</button>
                    @else
                    <a href="/giftcodes/{{ $item->id}}/using" class="btn btn-danger">Sử dụng</a>
                    @endif
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
    </div>
</div>
<style>
  .btn {
    color: white !important;
  }
</style>
@endsection