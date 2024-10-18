@extends('layouts.master')
@section('heading')
NẠP TIỀN - DONATE
@endsection
@section('content')
    <div class="col-span-3">
        <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg mb-6 border dark:border-primary-light">
            <div class="p-2 dark:text-primary-light border-b dark:border-primary-light">
                <h4 class="text-2xl font-semibold ">Nạp Tiền - Thanh Toán Tự Động</h4>
            </div>
            <div class="p-2">
                <table style="width: 100%; height: auto; padding: 2px 0 0 0;">
                    <tbody>
                        <tr align="center" valign="middle" style="text-align: CENTER">
                            <td colspan="2">
                                <p><strong style="font-size: 20px;">CHUYỂN KHOẢN NGÂN HÀNG TỰ ĐỘNG
                                    </strong>
                                </p>
                            </td>
                        </tr>
        
                        <tr align="center" valign="middle" style="text-align: center">
        
        
                            <td colspan="2" style="text-align: center">
                                <img
                                    style="display: inline"
                                    src="{{$img}}"
                                    alt="" width="30%" id="chuyenkhoanmbbank">
                                </td>
        
                            <!-- <td style="text-align: center" ><font color="red"> MB-BANK ĐANG BẢO TRÌ... </font></td> -->
        
        
                        </tr>
                        <tr align="center" valign="middle" style="text-align: left">
                            <td colspan="2">
                                <br>
                            </td>
                        </tr>
                        <tr align="center" valign="middle" style="text-align: center">
                            <td colspan="2" style="text-align: center">
        
        
                                <div style="display: flex; justify-content: center;">
                                    <div class="coolinput">
                                        <label for="input" class="text">Tỉ lệ nạp (chưa bao gồm khuyến mãi): 1000 VNĐ = 1000
                                            XU</label>
                                    </div>
        
                                </div>
        
                            </td>
                        </tr>
        
                        <tr align="center" valign="middle" style="text-align: center">
                            <td colspan="2" style="text-align: center">
        
        
                                <div style="display: flex; justify-content: center;">
                                    <div class="coolinput">
                                        <label for="input" class="text">Chương trình khuyến mãi: {{$currentPromotion->type == "double" ? "x".$currentPromotion->amount : $currentPromotion->amount."%"}}</label>
                                    </div>
        
                                </div>
        
                            </td>
                        </tr>
                        <tr align="center" valign="middle" style="text-align: left">
                            <td colspan="2">
                                <br>
                            </td>
                        </tr>
                        <tr align="center" valign="middle" style="text-align: left">
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
        
        
                        <tr align="center" valign="middle" style="text-align: left">
                            <td colspan="2">
                                <p><strong>HƯỚNG DẪN:</strong> </p>
                                <p><em>1. Dùng App Ngân Hàng để quét QR ngân hàng MBBANK ở trên sẽ tự động điền nội dung chuyển
                                        tiền. </em></p>
                                <p><em>2. <font color="red">Tuyệt đối không thay đổi</font> nội dung giao dịch để quá trình thanh toán tự động được thực hiện. Cú pháp AOC[Tên tài khoản]</em></p>
                                <p><em>3. Chuyển khoản xong, đợi từ 1p-3p, số xu sẽ được cập nhật vào tài khoản. </em><strong>
                            </td>
                        </tr>
        
                        <tr>
                            <td colspan="2" style="padding: 5px 0px;">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
