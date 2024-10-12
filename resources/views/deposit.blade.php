@extends('layouts.master')
@section('content')
<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
    <div class="inner">
        <div class="app-card-body p-3 p-lg-4">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Nạp xu vào tài khoản</h1><small style="color:green">*Lưu ý: Tuyệt đối không thay
                    đổi nội dung giao dịch để quá trình thanh toán tự động được thực hiện</small>
                <p><small style="color:green">*Chuyển khoản xong, đợi từ 1p-3p, số xu sẽ được cập nhật vào tài khoản</small></p>
            </div>
        </div>

    </div>
</div>
<div class="row g-4 settings-section text-center">
    <div class="col-12 col-md-12">
        <h3 class="section-title">Quét mã QR bên dưới</h3>
        <div class="section-intro">
            <img width="300" src="{{$img}}" alt="">
        </div>
        <br>
        <strong style="color:green">*Tỉ lệ: 1000đ = 1000 (xu) khi không có khuyến mãi</strong>
        <br>
        @if($currentPromotion)
        <strong style="color:blue">Khuyến mãi hiện tại: {{$currentPromotion->type == "double" ?
            "x".$currentPromotion->amount : $currentPromotion->amount."%" }}</strong>
        @else
        <strong style="color:blue">Khuyến mãi hiện tại: Không có</strong>
        @endif
    </div>
</div>

@endsection