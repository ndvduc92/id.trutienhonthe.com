@extends('layouts.master')
@section('content')
<div class="container-xl">
    <div class="row gy-4">
        <div class="col-12 col-lg-6">
            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                <div class="app-card-header p-3 border-bottom-0">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                            <div class="app-icon-holder">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-fill-check" viewBox="0 0 16 16">
                                    <path
                                        d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                    <path
                                        d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
                                </svg>
                            </div>

                        </div>
                        <div class="col-auto">
                            <h4 class="app-card-title">Thông Tin Tài Khoản</h4>
                        </div>
                    </div>
                </div>
                <div class="app-card-body px-4 w-100">
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>ID</strong></div>
                                <div class="item-data">TT{{ $user->userid }}</div>
                            </div>
                            <div class="col text-end">
                                <button class="btn btn-sm btn-warning" id="copyName" style="color:white">Copy</button>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Tên đăng nhập</strong></div>
                                <div class="item-data">{{ $user->username }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Email</strong></div>
                                <div class="item-data">
                                    {{ $user->email2 }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Mật khẩu</strong></div>
                                <div class="item-data">••••••••</div>
                            </div>
                            <div class="col text-end">
                                <a class="btn btn-sm btn-danger" href="/doi-mat-khau" style="color:white">Thay đổi</a>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Số xu hiện tại</strong></div>
                                <div class="item-data"><span style="">{{ number_format($user->balance) }}</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Xu khoá</strong></div>
                                <div class="item-data"><span style="">{{ number_format($user->balance_free) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Điểm chiến tích</strong></div>
                                <div class="item-data"><span style="">{{ ($user->rank) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Cấp VIP</strong></div>
                                <div class="item-data"><span style="">{{ $user->viplevel }}</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="item py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Bang hội</strong></div>
                                <div class="item-data">
                                    {{  "Chưa cập nhật" }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--//col-->
        <div class="col-12 col-lg-6">
            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                <div class="app-card-header p-3 border-bottom-0">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                            <div class="app-icon-holder">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-lightning" viewBox="0 0 16 16">
                                    <path
                                        d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641zM6.374 1 4.168 8.5H7.5a.5.5 0 0 1 .478.647L6.78 13.04 11.478 7H8a.5.5 0 0 1-.474-.658L9.306 1z" />
                                </svg>
                            </div>
                            <!--//icon-holder-->

                        </div>
                        <!--//col-->
                        <div class="col-auto">
                            <h4 class="app-card-title">Danh sách nhân vật</h4> <small style="">*Nếu không thấy nhân vật,
                                <a href="/update_char">bấm vào đây</a> để cập nhật</small>
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
                <!--//app-card-header-->
                <div class="app-card-body px-4 w-100">
                    @if(count(Auth::user()->chars()) == 0)
                    <h4 class="app-card-title">Bạn chưa tạo nhân vật nào</h4>
                    @else
                    @foreach (Auth::user()->chars() as $item)
                    <div class="card mb-4">
                        <div class="card-body"
                            style="background-color: {{ Auth::user()->main_id == $item->char_id ? '#f1eaea' : ''}}">
                            <h5 class="card-title" style="color:blue">{{ $item->getName() }} <small
                                    style="font-size: 14px; color: black">{{ Auth::user()->main_id == $item->char_id ?
                                    "(Nhân vật chính)" : ""}}</small></h5>
                            <p class="card-text char"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-virus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0a1 1 0 0 1 1 1v1.402c0 .511.677.693.933.25l.7-1.214a1 1 0 0 1 1.733 1l-.701 1.214c-.256.443.24.939.683.683l1.214-.701a1 1 0 0 1 1 1.732l-1.214.701c-.443.256-.262.933.25.933H15a1 1 0 1 1 0 2h-1.402c-.512 0-.693.677-.25.933l1.214.701a1 1 0 1 1-1 1.732l-1.214-.7c-.443-.257-.939.24-.683.682l.701 1.214a1 1 0 1 1-1.732 1l-.701-1.214c-.256-.443-.933-.262-.933.25V15a1 1 0 1 1-2 0v-1.402c0-.512-.677-.693-.933-.25l-.701 1.214a1 1 0 0 1-1.732-1l.7-1.214c.257-.443-.24-.939-.682-.683l-1.214.701a1 1 0 1 1-1-1.732l1.214-.701c.443-.256.261-.933-.25-.933H1a1 1 0 1 1 0-2h1.402c.511 0 .693-.677.25-.933l-1.214-.701a1 1 0 1 1 1-1.732l1.214.701c.443.256.939-.24.683-.683l-.701-1.214a1 1 0 0 1 1.732-1l.701 1.214c.256.443.933.261.933-.25V1a1 1 0 0 1 1-1m2 5a1 1 0 1 0-2 0 1 1 0 0 0 2 0M6 7a1 1 0 1 0-2 0 1 1 0 0 0 2 0m1 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m5-3a1 1 0 1 0-2 0 1 1 0 0 0 2 0" />
                                </svg> ID: {{ $item->char_id }}</p>
                            <p class="card-text char"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-yin-yang" viewBox="0 0 16 16">
                                    <path d="M9.167 4.5a1.167 1.167 0 1 1-2.334 0 1.167 1.167 0 0 1 2.334 0" />
                                    <path
                                        d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M1 8a7 7 0 0 1 7-7 3.5 3.5 0 1 1 0 7 3.5 3.5 0 1 0 0 7 7 7 0 0 1-7-7m7 4.667a1.167 1.167 0 1 1 0-2.334 1.167 1.167 0 0 1 0 2.334" />
                                </svg> Môn phái: {{ $item->getClass() }}</p>
                            <p class="card-text char"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-gender-female" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8M3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5" />
                                </svg> Giới tính: {{ $item->gender }}</p>
                            <p class="card-text char"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg> Level: <span style="">{{ $item->level }}</span></p>
                            <p class="card-text char"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8" />
                                </svg> Hiệp nghĩa: <span style="">{{ $item->reputation }}</span></p>
                            <br>
                            <a href="/doi-mon-phai/{{$item->char_id}}" class="btn btn-sm btn-danger mb-2"
                                style="color:white">Đổi môn phái</a>

                            @if(Auth::user()->main_id != $item->char_id)
                            <a href="/set_main_char/{{$item->char_id}}" class="btn btn-sm btn-success mb-2"
                                style="color:white">Đặt làm nhân vật chính</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    const copyBtn = document.querySelector('#copyName');
    copyBtn.addEventListener('click', e => {
        const input = document.createElement('input');
        input.value = "TT{{ $user->userid }}";
        document.body.appendChild(input);
        input.select();
        if(document.execCommand('copy')) {
            alert('Đã copy');
            document.body.removeChild(input);
        }
    });
</script>
<style>
    .char {
        margin-bottom: 0 !important;
        font-size: 14px !important;
    }

    footer {
        display: none;
    }
</style>
@endsection