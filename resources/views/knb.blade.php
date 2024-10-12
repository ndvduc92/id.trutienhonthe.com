@extends('layouts.master')
@section('content')
<div class="container-xl">
    <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
        <div class="inner">
            <div class="app-card-body p-3 p-lg-4">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Chuyển đổi KNB vào game</h1><small style="color:red">*Tỉ lệ: 1000 xu
                        = 3
                        KNB</small>
                    <p><small style="">*Mỗi lần nạp tối thiểu là 50000 xu</p>
                </div>
                <form class="row" action="" method="POST">
                    @csrf
                    <div class="col-4">
                        <input min="50000" name="cash" required class="form-control" type="number"
                            max="{{ Auth::user()->balance}}"
                            oninvalid="this.setCustomValidity('Số xu nạp phải nhỏ hơn hoặc bằng số dư hiện có')"
                            oninput="this.setCustomValidity('')">
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-sm btn-success text-center">Nạp KNB</button>
                    </div>
                </form>
            </div>

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

    <div class="row g-4">
        <div style="margin-top:20px"></div>
        <h3 class="text-center">BẢNG CẤP ĐỘ VIP</h3>
        <table class="table table-bordered table-hover" align="center" border="1" cellspacing="0" cellpadding="0">
            <tbody>
                <tr align="center">
                    <th>Cấp VIP</th>
                    <th>Số KNB cần </th>
                    <th>Số xu cần</th>
                </tr>
                <tr align="center">
                    <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-1-circle" viewBox="0 0 16 16">
                            <path
                                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M9.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383z" />
                        </svg></td>
                    <td>100</td>
                    <td>{{number_format(ceil(100/3) * 1000)}}</td>
                </tr>
                <tr align="center">
                    <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-2-circle" viewBox="0 0 16 16">
                            <path
                                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M6.646 6.24v.07H5.375v-.064c0-1.213.879-2.402 2.637-2.402 1.582 0 2.613.949 2.613 2.215 0 1.002-.6 1.667-1.287 2.43l-.096.107-1.974 2.22v.077h3.498V12H5.422v-.832l2.97-3.293c.434-.475.903-1.008.903-1.705 0-.744-.557-1.236-1.313-1.236-.843 0-1.336.615-1.336 1.306" />
                        </svg></td>
                    <td>400</td>
                    <td>{{number_format(ceil(400/3) * 1000)}}</td>
                </tr>
                <tr align="center">
                    <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-3-circle" viewBox="0 0 16 16">
                            <path
                                d="M7.918 8.414h-.879V7.342h.838c.78 0 1.348-.522 1.342-1.237 0-.709-.563-1.195-1.348-1.195-.79 0-1.312.498-1.348 1.055H5.275c.036-1.137.95-2.115 2.625-2.121 1.594-.012 2.608.885 2.637 2.062.023 1.137-.885 1.776-1.482 1.875v.07c.703.07 1.71.64 1.734 1.917.024 1.459-1.277 2.396-2.93 2.396-1.705 0-2.707-.967-2.754-2.144H6.33c.059.597.68 1.06 1.541 1.066.973.006 1.6-.563 1.588-1.354-.006-.779-.621-1.318-1.541-1.318" />
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8" />
                        </svg></td>
                    <td>800</td>
                    <td>{{number_format(ceil(800/3) * 1000)}}</td>
                </tr>
                <tr align="center">
                    <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-4-circle" viewBox="0 0 16 16">
                            <path
                                d="M7.519 5.057q.33-.527.657-1.055h1.933v5.332h1.008v1.107H10.11V12H8.85v-1.559H4.978V9.322c.77-1.427 1.656-2.847 2.542-4.265ZM6.225 9.281v.053H8.85V5.063h-.065c-.867 1.33-1.787 2.806-2.56 4.218" />
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8" />
                        </svg></td>
                    <td>1500</td>
                    <td>{{number_format(ceil(1500/3) * 1000)}}</td>
                </tr>
                <tr align="center">
                    <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-5-circle" viewBox="0 0 16 16">
                            <path
                                d="M1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8m15 0A8 8 0 1 0 0 8a8 8 0 0 0 16 0m-8.006 4.158c-1.57 0-2.654-.902-2.719-2.115h1.237c.14.72.832 1.031 1.529 1.031.791 0 1.57-.597 1.57-1.681 0-.967-.732-1.57-1.582-1.57-.767 0-1.242.45-1.435.808H5.445L5.791 4h4.705v1.103H6.875l-.193 2.343h.064c.17-.258.715-.68 1.611-.68 1.383 0 2.561.944 2.561 2.585 0 1.687-1.184 2.806-2.924 2.806Z" />
                        </svg></td>
                    <td>2500</td>
                    <td>{{number_format(ceil(2500/3) * 1000)}}</td>
                </tr>
                <tr align="center">
                    <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-6-circle" viewBox="0 0 16 16">
                            <path
                                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.21 3.855c1.612 0 2.515.99 2.573 1.899H9.494c-.1-.358-.51-.815-1.312-.815-1.078 0-1.817 1.09-1.805 3.036h.082c.229-.545.855-1.155 1.98-1.155 1.254 0 2.508.88 2.508 2.555 0 1.77-1.218 2.783-2.847 2.783-.932 0-1.84-.328-2.409-1.254-.369-.603-.597-1.459-.597-2.642 0-3.012 1.248-4.407 3.117-4.407Zm-.099 4.008c-.92 0-1.564.65-1.564 1.576 0 1.032.703 1.635 1.558 1.635.868 0 1.553-.533 1.553-1.629 0-1.06-.744-1.582-1.547-1.582" />
                        </svg></td>
                    <td>5000</td>
                    <td>{{number_format(ceil(5000/3) * 1000)}}</td>
                </tr>
                <tr align="center">
                    <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-7-circle" viewBox="0 0 16 16">
                            <path
                                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.37 5.11V4.001h5.308V5.15L7.42 12H6.025l3.317-6.82v-.07H5.369Z" />
                        </svg></td>
                    <td>8000</td>
                    <td>{{number_format(ceil(8000/3) * 1000)}}</td>
                </tr>
                <tr align="center">
                    <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-8-circle" viewBox="0 0 16 16">
                            <path
                                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-5.03 1.803c0 1.394-1.218 2.355-2.988 2.355-1.763 0-2.953-.955-2.953-2.344 0-1.271.95-1.851 1.647-2.003v-.065c-.621-.193-1.33-.738-1.33-1.781 0-1.225 1.09-2.121 2.66-2.121s2.654.896 2.654 2.12c0 1.061-.738 1.595-1.336 1.782v.065c.703.152 1.647.744 1.647 1.992Zm-4.347-3.71c0 .739.586 1.255 1.383 1.255s1.377-.516 1.377-1.254c0-.733-.58-1.23-1.377-1.23s-1.383.497-1.383 1.23Zm-.281 3.645c0 .838.72 1.412 1.664 1.412.943 0 1.658-.574 1.658-1.412 0-.843-.715-1.424-1.658-1.424-.944 0-1.664.58-1.664 1.424" />
                        </svg></td>
                    <td>15000</td>
                    <td>{{number_format(ceil(15000/3) * 1000)}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection