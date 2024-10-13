@extends('layouts.master')
@section('content')
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Lịch sử giao dịch</h1>
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
    @php
        function getSum($data) {
            $sum = 0;
            foreach ($data as $item) {
                $sum = $sum + $item->shop->price * $item->shop_quantity;
            }
            return $sum;
        }
        @endphp
    <div class="">
        <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
            <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab"
                href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Chuyển đổi KNB ({{ number_format($knbs->sum('knb_amount'))  }})</a>
            <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab"
                href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Shop vật phẩm ({{ number_format(getSum($shops))  }})</a>
        </nav>
        

        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell">#</th>
                                        <th class="cell">Số xu</th>
                                        <th class="cell">KNB nhận được</th>
                                        <th class="cell">Ngày đổi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($knbs as $item)
                                    <tr>
                                        <td class="cell">{{ $loop->index + 1 }}</td>
                                        <td class="cell">{{ $item->knb_amount }}</td>
                                        <td class="cell">{{ $item->knb_amount * 3 / 1000 }}</td>
                                        <td class="cell">{{ \Carbon\Carbon::parse($item->created_at)->format("d/m/Y H:i:s") }}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!--//table-responsive-->

                    </div>
                    <!--//app-card-body-->
                </div>

            </div>

            <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                <div class="app-card app-card-orders-table mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">

                            <table class="table mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell">#</th>
                                        <th class="cell">Vật phẩm</th>
                                        <th class="cell">Số lượng</th>
                                        <th class="cell">Tổng tiền</th>
                                        <th class="cell">Ngày mua</th>
                                        <th class="cell">Nhân vật mua</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shops as $item)
                                    <tr>
                                        <td class="cell">{{ $loop->index + 1}}</td>
                                        <td class="cell">{{ $item->shop->name }}</td>
                                        <td class="cell">{{ $item->shop_quantity }}</td>
                                        <td class="cell">{{ number_format($item->shop_quantity * $item->shop->price) }}</td>
                                        <td class="cell">{{ \Carbon\Carbon::parse($item->created_at)->format("d/m/Y H:i:s") }}</td>
                                        <td class="cell">{{ $item->getCharName() }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--//table-responsive-->
                    </div>
                    <!--//app-card-body-->
                </div>
                <!--//app-card-->
            </div>
        </div>



    </div>
</div>
@endsection