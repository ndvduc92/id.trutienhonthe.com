@extends('layouts.master')
@section('content')
<div class="container-xl">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">TOP CAO THỦ</h1>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-12">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Cao thủ</th>
                <th scope="col">Điểm chiến tích</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($top as $item)
              <tr>
                <td><strong style="color:blue">{{ getChar($item["userid"]) }}</strong></td>
                <td>{{ $item["rank"] }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection