@extends('layouts.master')
@section('content')
<style>
    .rounded {
        border-radius: var(--bs-border-radius) !important;
    }

    .bg-light {
        --bs-bg-opacity: 1;
        background-color: #f5f7fb !important;
    }

    .py-2 {
        padding-bottom: .5rem !important;
        padding-top: .5rem !important;
    }

    .px-3 {
        padding-left: 1rem !important;
        padding-right: 1rem !important;
    }

    .me-3 {
        margin-right: 1rem !important;
    }

    .position-relative {
        max-height: 1000px;
        overflow: auto;
    }
</style>
@php
if (!function_exists('replaceSmile')){
    function replaceSmile($smiles, $str) {
        $xx = $str;
        $msgx = [];
        foreach (mb_str_split($xx) as $char) {
            //if (mb_detect_encoding($char, 'auto') != "UTF-8") {
                array_push($msgx, $char);
            //}

        }

        $ac = implode('', ($msgx));
        foreach ($smiles as $key) {
            $ac = str_replace($key, ' *Biểu cảm* ', $ac);
        }
        return $ac;
    }
}
@endphp
<div class="container-fluid p-0">

    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Trò chuyện kênh thế giới</h1><a class="badge bg-primary ms-2"
            href="https://trutien.vn/tai-game" target="_blank">Tham gia game ngay <i
                class="fas fa-fw fa-external-link-alt"></i></a>
    </div>

    <div class="card">
        <div class="row g-0">
            <div class="col-12 col-lg-12 col-xl-12">
                <div class="py-2 px-4 border-bottom d-none d-lg-block">
                    <div class="d-flex align-items-center py-1">
                        <div class="flex-grow-1 ps-3">
                            <strong>Mọi người đang nói gì với nhau</strong>
                        </div>
                        <a href="/chat">
                            <button class="btn btn-secondary btn-lg me-1 px-3"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                                    <path
                                        d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                                </svg>Refresh</button>
                        </a>
                    </div>
                </div>
                <div class="position-relative">
                    <div class="chat-messages p-4">
                        <div class="chat-message-left pb-4">
                            <div class="flex-shrink-1 rounded py-2 px-3 ms-3" style="background-color: none">
                                @if(Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <small>{{ Session::get('error') }}</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                @endif
                                @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <small>{{ Session::get('success') }}</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                @endif
                                <form class="input-group" action="" method="POST">
                                    @csrf
                                    <input type="text" class="form-control" name="msg" required>
                                    <button type="submit" class="btn btn-primary">Gửi</button>
                                </form>
                                <small class="text-muted">Bạn sẽ trò chuyện bằng nhân vật: <a href="#">{{ Auth::user()->char ? Auth::user()->char->getName() : "Chưa chọn nhân vật"}}</a>, set lại nhân vật chính đang online game ở trang <a href="/">home</a></small>
                                    <p><small class="text-muted">Chỉ tham gia vào cuộc trò chuyện được khi tài khoản đang
                                    online trong, do 1 số hạn chế nên tin nhắn từ web sẽ không thể hiển thị ở lịch sử bên dưới, nhưng vẫn hiển thị trong game!
                                    game</small></p>
                                <small class="text-muted">Số lượt chat còn lại: {{ Auth::user()->chat_count }}, nhấn
                                        vào <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">đây</a>
                                        mua thêm lượt chat (Vip 6 trở lên miễn phí)</small>
                            </div>
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Mua lượt chat (100 xu
                                                = 1 lượt)</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="row p-4" action="/buy/chat" method="POST">
                                                @csrf
                                                <div class="col-6">
                                                    <input type="number" min="1" required name="count" value="1"
                                                        class="form-control quantity" placeholder="Số lượng">
                                                </div>
                                                <div class="col-6">
                                                    <button type="submit" class="btn btn-mua btn-primary">Mua</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @foreach (array_reverse($chat) as $item)
                        @if($item["channel"] == "1")
                        <div class="chat-message-left pb-4">
                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 ms-3">
                                <div class="font-weight-bold mb-1">[Thế Giới] <span style="color:rgb(37, 26, 7)">{{$item["time"]}}</span>
                                    <strong style="color:rgb(221, 151, 30)">{{getName($item["char"])}}</strong>:
                                    {{ replaceSmile($smiles, $item["mes"]) }}</div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection