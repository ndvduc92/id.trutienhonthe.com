@extends('layouts.master')
@section('content')
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Thay đổi mật khẩu</h1>
        </div>
    </div>
    @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show col-6" role="alert">
        <small>{{ Session::get('error') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show col-6" role="alert">
        <small>{{ Session::get('success') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form class="col-6" action="" method="POST">
        @csrf
        <div class="mb-3">
          <input type="password" required class="form-control" name="old" placeholder="Nhập mật khẩu cũ">
        </div>
        <div class="mb-3">
          <input type="password" required class="form-control" name="new" placeholder="Nhập mật khẩu mới">
        </div>
        <div class="mb-3">
            <input type="password" required class="form-control" name="newcf" placeholder="Xác nhận mật khẩu mới">
          </div>
        <button type="submit" class="btn btn-primary" style="color:white">Cập nhật</button>
      </form>
    <br>
    <!--//row-->

    <div class="row g-4">
    </div>
</div>
@endsection