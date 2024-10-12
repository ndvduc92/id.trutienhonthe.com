@extends('layouts.master')
@section('content')
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Chuyển xu sang tài khoản khác</h1><small style="color:red">*Phí: 10%</small>
            <p><small style="">*Mỗi lần chuyển tối thiểu là 50000 xu</p>
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
    <hr style="width: 100%; border-style: dashed;">
    <form class="row" action="" method="POST">
        @csrf
        <div class="col-4">
            <input placeholder="Nhập tài khoản" name="username" required class="form-control" type="text">
        </div>
        <div class="col-4">
            <input min="50000" placeholder="Số xu cần chuyển" name="balance" required class="form-control" type="number" max="{{ Auth::user()->balance}}"
                oninvalid="this.setCustomValidity('Số xu nạp phải nhỏ hơn hoặc bằng 50000')"
                oninput="this.setCustomValidity('')">
        </div>

        <div class="col-4">
            <button type="submit" class="btn btn-sm btn-danger text-center">Thực hiện</button>
        </div>
    </form>
    <br>
    <div class="">
        <table class="table app-table-hover mb-0 text-left">
            <thead>
                <tr>
                    <th class="cell">#</th>
                    <th class="cell">Số xu</th>
                    <th class="cell">Phí</th>
                    <th class="cell">Người gởi</th>
                    <th class="cell">Người nhận</th>
                    <th class="cell">Thời gian</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $item)
                <tr class="{{ Auth::user()->id == $item->from_user_id ? 'table' : 'table-success'}}">
                    <td class="cell">{{ $loop->index + 1 }}</td>
                    <td class="cell">{{ number_format($item->amount) }}</td>
                    <td class="cell">{{ number_format($item->amount * 0.1 ) }}</td>
                    <td class="cell">{{ Auth::user()->id != $item->from_user_id ? $item->from_user->username : "" }}</td>
                    <td class="cell">{{ Auth::user()->id == $item->from_user_id ? $item->to_user->username : '' }}</td>
                    <td class="cell">{{ \Carbon\Carbon::parse($item->created_at)->format("d/m/Y H:i:s") }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>



    </div>
</div>
@endsection