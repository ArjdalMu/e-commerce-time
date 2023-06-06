


@extends('home.layouts.template')
@section('homecontent')
<div class="hero-bg-image flex flex-col items-center justify-center mb-4 ">
    <h1 class='text-gray-100 text-5xl uppercase font-bold pb-9'>Welcome to the Best Place for E-commerce</h1>
    <a class= 'bg-gray-100 text-gray-700 py-4 px-5 rounded-lg font-bold uppercase text-xl' href="{{route('addtocart')}}">Start Shopping</a>
</div>
<div class="text-center">
    <h1 class='text-gray-900 text-3xl pt-10 uppercase font-bold pb-9'>ALL PRODUCTS</h1>
    <div class="flex flex-wrap justify-center">
           @foreach ($products as $item)
           @php
  $product_img = $item->product_img; // Assuming `$item` is an object or array containing the product information
@endphp
<div class="max-w-sm rounded overflow-hidden shadow-lg m-4 border-b w-300 h-400"" >
    <img src="{{ asset($product_img) }}" class="w-full h-64 object-cover">
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{ Illuminate\Support\Str::limit($item->product_name, 15) }} ...</div>
        <p class="text-gray-700 text-base">{{ Illuminate\Support\Str::limit($item->product_short_des, 15) }}</p>
    </div>
    <div class="px-6 py-4">
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $item->product_category_name }}</span>
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">{{$item->price}}$</span>
    </div>
    <div class="px-6 py-4 text-center">
    
        <a href="{{route('singleproduct',[$item->id,$item->slug])}}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">Buy Now</a>
    </div>
    
</div>

           @endforeach

          
            
    </div>
    <div class="mb-8">
        {{ $products->links() }}
    </div>
    
</div>

@endsection