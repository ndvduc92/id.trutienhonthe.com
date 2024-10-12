@extends('layouts.auth')
@section('content')
<div class="d-flex flex-column align-content-end">
    <div class="app-auth-body mx-auto">
        <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="me-2"
                    src="/assets/logo2.png" alt="logo"></a></div>
        <h2 class="auth-heading text-center mb-4">Đăng Ký Tài Khoản</h2>

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <small>{{ $errors->first() }}</small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
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
        <div class="auth-form-container text-start mx-auto">
            <form class="auth-form auth-signup-form" action="" method="POST" autocomplete="off">
                @csrf
                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">Tên đăng nhập</label>
                    <input value="{{ old('login') }}" id="signup-name" name="login" type="text"
                        class="form-control signup-name" placeholder="Tên đăng nhập" required autocomplete="false">
                </div>
                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">Mật khẩu</label>
                    <input id="signup-email" name="passwd" type="password" class="form-control signup-email"
                        placeholder="Mật khẩu" required autocomplete="false">
                </div>
                <div class="password mb-3">
                    <label class="sr-only" for="signup-password">Nhập lại mật khẩu</label>
                    <input id="signup-password" name="passwdConfirm" type="password"
                        class="form-control signup-password" placeholder="Nhập lại mật khẩu" required>
                </div>
                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">Số điện thoại</label>
                    <input value="{{ old('phone') }}" id="signup-name" name="phone" type="phone"
                        class="form-control signup-name" placeholder="Số điện thoại" required>
                </div>
                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">Email</label>
                    <input value="{{ old('email') }}" id="signup-name" name="email" type="email"
                        class="form-control signup-name" placeholder="Địa chỉ email" required>
                </div>
                <div class="mb-3">
                    <small>*Một email có thể dùng để đăng ký cho nhiều tài khoản</small>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Đăng ký</button>
                </div>
            </form>
            <!--//auth-form-->

            <div class="auth-option text-center pt-5">Đã có tài khoản? <a class="text-link" href="/dang-nhap">Đăng
                    nhập</a></div>
        </div>
        <!--//auth-form-container-->



    </div>
    <!--//auth-body-->

    <footer class="app-auth-footer">
        <div class="container text-center py-3">
            <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Copyright 2024 © <span class="sr-only">love</span><i class="fas fa-heart"
                    style="color: #fb866a;"></i> by TruTien.Vn</small>

        </div>
    </footer>
    <!--//app-auth-footer-->
</div>
@endsection