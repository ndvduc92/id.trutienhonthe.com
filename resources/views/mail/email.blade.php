<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Xin chào {{$user->email2}}</p>
    <p>Mã OTP dùng để đổi mật khẩu của bạn là: {{$pass->otp}} </p>
    <br>
    <p>Lưu ý: OTP chỉ tồn tại trong vòng 1 giờ, sau thời gian này, bạn phải yêu cầu 1 mã OTP khác </p>
    <p>Nếu gặp vấn đề gì, vui lòng truy cập <a href="https://id.trutienhonthe.com">https://id.trutienhonthe.com</a> liên hệ GM, xin cảm ơn</p>
</body>
</html>