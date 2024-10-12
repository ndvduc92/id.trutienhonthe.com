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
        max-height: 500px;
        overflow: auto;
    }
</style>
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">{{ $guild ? $guild->name2 : "Bạn chưa thuộc về Bang Hội nào" }}
            </h1>
        </div>
        @if ($guild && $guild->char_id == Auth::user()->main_id)
        <div class="col-auto">
            <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Quà
                war</button>
        </div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Phát quà bang chiến</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row p-4" action="/bang-hoi" method="POST">
                            @csrf
                            <div class="col-8">
                                <input type="" required name="username" class="form-control quantity"
                                    placeholder="Tài khoản thành viên">
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-mua btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    @if($guild)
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-12 col-lg-6">
            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                <div class="app-card-header p-3 border-bottom-0">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                            <div class="app-icon-holder">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-shop" viewBox="0 0 16 16">
                                    <path
                                        d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
                                </svg>
                            </div>
                            <!--//icon-holder-->

                        </div>
                        <!--//col-->
                        <div class="col-auto">
                            <h4 class="app-card-title">Tài Nguyên Bang Hội</h4>
                        </div>
                        <!--//col-->
                    </div>
                    <!--//row-->
                </div>
                <!--//app-card-header-->
                <div class="app-card-body px-4 w-100">
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Bang chủ</strong></div>
                                <div class="item-data"><span style="">{{ getName($guild->char_id) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Số dư xu bang hội</strong></div>
                                <div class="item-data"><span style="">{{ $guild->balance }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--//app-card-->
        </div>
    </div>
    @endif
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
@if($guild)
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
@if(request()->show == "yes")
<div class="container-xl">
    <div class="card">
        <div class="row g-0">
            <div class="col-12 col-lg-12 col-xl-12">
                <div class="py-2 px-4 border-bottom d-none d-lg-block">
                    <div class="d-flex align-items-center py-1">
                        <div class="flex-grow-1 ps-3">
                            <strong>Kênh chat Bang Hội</strong>
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
                        @foreach (($chs) as $ch)
                        <div class="chat-message-left pb-4">
                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 ms-3">
                                <div class="font-weight-bold mb-1">
                                    <span style="color:rgb(37, 26, 7)">[{{$ch["time"]}}]</span> <strong style="color:{{ $ch['channel'] == 'Family' ? '#2a2abf' : '#17ddd6'}}">{{$ch["name"]}}: {{ replaceSmile($smiles, $ch["mes"]) }}</strong>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endif

<br>
<div class="container-xl mt-1">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                    @foreach ($guild->getFamilies() as $item)
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-home-{{$item->id}}" class="nav-link {{ $loop->index == 0 ? 'active' : '' }}"
                            data-bs-toggle="tab" aria-selected="true" role="tab">{{$item->name}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    @foreach ($guild->getFamilies() as $id)
                    <div class="tab-pane {{ $loop->index == 0 ? 'active' : '' }}" id="tabs-home-{{$id->id}}"
                        role="tabpanel">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nhân Vật</th>
                                    <th scope="col">Môn Phái</th>
                                    <th scope="col">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($id->getMembers() as $item)
                                <tr>
                                <td>{{$item->char_id}}</td>
                                    <td>{{getName($item->char_id)}}</td>
                                    <td>{{ getNv($item->char_id)->getClass() }}</td>
                                    <td>{!! getNv($item->char_id)->user->getOnline($item->char_id) !!}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</div>
@endif
@endsection