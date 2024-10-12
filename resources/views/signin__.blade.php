@extends('layouts.auth')
@section('content')
<div class="d-flex flex-column align-content-end">
    <div class="app-auth-body mx-auto">
        <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="me-2"
                    src="/assets/logo2.png" alt="logo"></a></div>
        <h2 class="auth-heading text-center mb-5">Đăng Nhập</h2>
        <div class="auth-form-container text-start">
            <form class="auth-form login-form" action="" method="POST">
                @csrf
                @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <small>{{ Session::get('error') }}</small>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="email mb-3">
                    <label class="sr-only" for="signin-email">Email</label>
                    <input id="signin-email" name="login" class="form-control signin-email"
                        placeholder="Tên đăng nhập" required>
                </div>
                <!--//form-group-->
                <div class="password mb-3">
                    <label class="sr-only" for="signin-password">Password</label>
                    <input id="signin-password" name="password" type="password"
                        class="form-control signin-password" placeholder="Mật khẩu" required>
                    <div class="extra mt-3 row justify-content-between">
                        <div class="col-6">
                        </div>
                        <!--//col-6-->
                        <div class="col-6">
                            <div class="forgot-password text-end">
                                <a class="text-link forgot-pw" href="reset-password.html">Quên mật khẩu?</a>
                            </div>
                        </div>
                        <!--//col-6-->
                    </div>
                    <!--//extra-->
                </div>
                <!--//form-group-->
                <div class="text-center">
                    <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Đăng Nhập</button>
                </div>
            </form>

            <div class="auth-option text-center pt-5">Chưa có tài khoản? Đăng ký <a class="text-link"
                    href="/dang-ky">tại đây</a>.</div>
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