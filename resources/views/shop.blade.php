@extends('layouts.master')
@section('content')
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Vật phẩm bày bán <small style="font-size:14px">(Xem <a
                        href="/lich-su-mua">lịch sử<a /> mua của người chơi)</small></h1> <small style="color:red">*Lưu
                ý: chọn nhân vật mặc
                định trước khi mua, nếu chọn sai, chúng tôi sẽ không chịu trách nhiệm</small>
            <p><small style="">*Nếu không thấy nhân vật, <a href="/update_char">bấm vào đây</a> để cập nhật</small></p>
        </div>
    </div>
    <form class="row" action="/set_main_char" method="POST">
        @csrf
        <div class="col-6">
            <select name="main_id" class="form-control" style="padding-top: 0;padding-bottom: 0;">
                <option value="">---Chọn nhân vật---</option>
                @foreach (Auth::user()->chars() as $item)
                <option value="{{ $item['char_id'] }}" @php if ($item["char_id"]==Auth::user()->main_id) {
                    echo "selected";
                    } @endphp>{{ $item['char_id'] }} - {{ $item->getName() }} - {{ $item->getClass() }} </option>
                @endforeach
            </select>
        </div>

        <div class="col-6">
            <button type="submit" class="btn btn-sm btn-success text-center">Chọn nhân vật</button>
        </div>
    </form>
    <br>
    @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <small>{{ Session::get('error') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <!--//row-->
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <small>{{ Session::get('success') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <input type="hidden" id="balance" value="{{Auth::user()->balance}}">

    <div class="row g-4">
        @foreach ($shops as $item)
        <div class="col-12 col-md-12 col-xl-6 col-xxl-6">
            <div class="app-card app-card-doc shadow-sm h-100">
                <div class="app-card-body p-3 has-card-actions">

                    <h2 class="app-doc-title truncate mb-0" style="font-size:18px !important"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green"
                            class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg> <a href="#file-link">{{
                            $item->name }}</a></h2>
                    <div class="">
                        <ul class="list-unstyled mb-0">
                            <li><span class=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z"/>
                              </svg> Giá:</span> {{ number_format($item->price)
                                }} xu</li>
                            <li><span class="text-truncate">Mô tả:</span> {{ $item->description }}</li>
                            <li><span class="">Xếp chồng:</span> {{ $item->stack }}</li>
                            <li><span class="">Đã bán:</span> {{ $item->getSell() }}</li>
                        </ul>
                    </div>
                </div>
                <form class="row p-4" action="" method="POST">
                    @csrf
                    <div class="col-6">
                        <input type="number" min="1" stack="{{ $item->stack }}" price="{{ $item->price }}"
                            max="{{ $item->stack }}" id="quantity-x-{{$item->id}}" required name="quantity" value="1"
                            class="form-control quantity" placeholder="Số lượng">
                        <input type="hidden" value="{{ $item->itemid }}" name="itemid" class="form-control"
                            placeholder="Số lượng">
                        <input type="hidden" value="{{ $item->id }}" name="shop_id" class="form-control"
                            placeholder="Số lượng">
                    </div>
                    <div class="col-6">
                        <button type="button" id="btn-max-{{$item->id}}" class="btn btn-mua btn-max btn-secondary">Tối
                            đa</button>
                        <button type="button" id="btn-mua-{{$item->id}}" class="btn btn-mua btn-primary"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $item->id }}">Mua</button>
                    </div>
                    <div class="modal fade" id="staticBackdrop{{ $item->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Xác nhận mua vật phẩm</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg> <span>Bạn có muốn mua <a id="quantity{{ $item->id }}"></a> cái <strong
                                            class="text-green"> <a>{{ $item->name }}</a></strong> với giá <strong
                                            id="price{{ $item->id }}" class="text-red"> </strong> không?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                                    <button type="submit" class="btn btn-primary">Mua</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--//app-card-->
        </div>
        @endforeach
    </div>
</div>
<style>
    .app-card-doc .app-doc-title a {
        color: #15a362 !important;
    }

    .btn {
        color: white !important;
    }
</style>
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $(".btn-mua").click(function() {
            const itemid = $(this).attr("id");
            const id = itemid.split("-")[2]

            const el = $(`#quantity-x-${id}`)
            const quantity = el.val();
            const price = el.attr("price");
            $(`#quantity${id}`).text(quantity)
            const cost = quantity*price;
            $(`#price${id}`).text(`${cost} (xu)`);
        })

        $(".btn-max").click(function() {
            const itemid = $(this).attr("id");
            const id = itemid.split("-")[2]

            const el = $(`#quantity-x-${id}`)
            const quantity = el.val()
            console.log(quantity)
            const price = el.attr("price");
            const stack = el.attr("stack");
            const balance = $("#balance").val()
            const maxItem = Math.floor(balance/price)
            const sl = maxItem >= stack ? stack : maxItem
            el.val(sl)
        })
    })
        
</script>
@endsection
@endsection