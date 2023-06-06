@extends('admin.layouts.template')
@section('content')
<div class="bg-gradient-to-r from-indigo-500 text-center md:m-4 p-14 rounded-lg">
    <h3 class="text-3xl font-bold">Hello from dashboard &#x1F44B;</h3>
</div>

<!-- component -->
<div class="flex flex-wrap mb-2">
    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2">
        <div class="bg-green-600 border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pl-1 pr-4"><i class="fa fa-wallet fa-2x fa-fw fa-inverse"></i></div>
                <div class="flex-1 text-right">
                    <h5 class="text-white">Total Revenue</h5>
                    <h3 class="text-white text-3xl">{{ $totalPrice }}&euro;<span class="text-green-400"></span></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2">
        <div class="bg-blue-600 border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pl-1 pr-4"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i></div>
                <div class="flex-1 text-right">
                    <h5 class="text-white">Total Users</h5>
                    <h3 class="text-white text-3xl">{{$userCount}} <span class="text-blue-400"></span></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2 xl:pr-3 xl:pl-1">
        <div class="bg-orange-600 border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pl-1 pr-4"><i class="fa-brands fa-sellsy fa-2x fa-fw fa-inverse"></i></div>
                <div class="flex-1 text-right pr-1">
                    <h5 class="text-white">Total Selles</h5>
                    <h3 class="text-white text-3xl">{{$confirmedOrderCount}} <span class="text-orange-400"></span></h3>
                </div>
            </div>
        </div>
    </div>
    
</div>






@endsection