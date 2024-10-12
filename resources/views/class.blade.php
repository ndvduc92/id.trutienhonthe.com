@extends('layouts.master')
@section('content')
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Chuyển đổi môn phái nhân vật {{ $char->getName() }} ({{ $char->char_id}})</h1>
            <small style="color:red">*Môn phái hiện tại: {{ $char->getClass() }}</small>
            <p><small>*Tỉ lệ: 100000 xu = 1 lần đổi môn phái</small></p>
                <p><small style="">*Vào game check tín sứ nhận vật phẩm đổi môn phái.</p>
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
    <form class="row" action="" method="POST">
        @csrf
        <div class="col-4">
            <select name="class" id="class" class="form-control">
                @foreach (\App\Models\Char::CLASS_ITEM as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-4">
            <button type="submit" class="btn btn-sm btn-danger text-center">Thực hiện</button>
        </div>
    </form>
    <br>
    <!--//row-->

    <div class="row g-4">
    </div>
</div>
@endsection