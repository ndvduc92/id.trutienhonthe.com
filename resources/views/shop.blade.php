@extends('layouts.master')
@section('heading')
Web Shop
@endsection
@section('content')
<div class="col-span-3">
    <div class="flex flex-wrap">
        @foreach ($shops as $item)
        <div class="w-full md:w-1/2 p-2">
            <div class="dark:bg-darker shadow-lg hover:shadow-xl rounded-lg ">
                <div class="h-64 rounded-t-lg p-4 bg-no-repeat bg-center"
                    style="background-image: url(/fe/img/logo.png)">
                    <div class="flex flex-row justify-center justify-between">
                        <div class="text-left">
                            <img width="32" src="{{$item->item->image}}" alt="hfghfghfgh">
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-start px-2 pt-2">
                    <div class="p-2 flex-1">
                        <h1 class="font-extrabold text-xl font-poppins dark:text-cyan-400">{{ $item->item->name }}</h1>
                        <p class="text-gray-500 font-nunito"></p>
                        <p>Giá: {!! $item->price !!} xu</p>
                        <p>Tối đa: {!! $item->stack !!} (item/lượt)</p>
                    </div>
                </div>
                <form class="flex justify-center items-center px-2 pb-2" method="post">
                    <input class="px-4 py-2" name="quantity" placeholder="Số lượng" style="color: black">
                    <div class="w-1/2 p-2">
                        <div action="" >
                            @csrf
                            <input type="hidden" name="shop_id" value="{{$item->id}}">

                            <button type="submit"
                                class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker mr-2">
                                Mua
                            </button>
                        </div>
                    </div>
                    {{-- <div class="w-1/2 p-2">
                        <div x-data="{ gift_1: false }">
                            <!-- Button View -->
                            <button type="submit"
                                class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker ml-1"
                                @click="gift_1 = !gift_1">
                                Tặng ({{$item->price}} xu)
                            </button>

                            <!-- Modal View News -->
                            <div x-show="gift_1"
                                class="fixed dark:text-light flex items-center justify-center overflow-auto z-50 bg-gray-500 bg-opacity-40 left-0 right-0 top-0 bottom-0"
                                x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                style="display: none;">
                                <!-- Modal -->
                                <div x-show="gift_1" class="bg-white dark:bg-dark rounded shadow p-6 w-auto mx-10"
                                    @click.away="gift_1 = false" x-transition:enter="ease-out duration-300"
                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave="ease-in duration-200"
                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    style="display: none;">
                                    <div class="text-xl font-bold">
                                        List friend for
                                    </div>
                                    <div class="text-lg my-2 ">
                                        <p class="text-xl dark:text-cyan-400 font-bold">It seems that your friends
                                            list is empty.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection