@extends('home.layouts.template')
@section('homecontent')
<div class="text-center">
    <h1 class='text-gray-900 text-3xl pt-10 uppercase font-bold pb-9'>{{$products->product_name}}</h1>


    <div class="max-w-4xl mx-auto px-4 py-8 bg-gray-100 rounded-lg">
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/2">
                <img src="{{ asset($products->product_img) }}" alt="Product Image" class="w-full h-auto">
            </div>
            <div class="md:w-1/2 md:ml-8 text-start mt-8 md:mt-0">
                <h2 class="text-2xl font-bold mb-4">{{ $products->product_name }}</h2>
                <p class="text-gray-700 mb-2">
                    <span class="font-bold">Category:</span> {{ $products->product_category_name }}
                </p>
                <p class="text-gray-700 mb-2">
                    <span class="font-bold">Subcategory:</span> {{ $products->product_subcategory_name }}
                </p>
                <p class="text-gray-700 mb-2">
                    <span class="font-bold">Available Quantity:</span> {{ $products->quantite }}
                </p>
                <p class="text-gray-700 mb-4">{{ $products->product_short_desc }}</p>
                <p class="text-gray-800 text-xl mb-4 font-bold">${{ $products->price }}</p>
                <form action="{{route('addproducttocart',$products->id)}}" method="POST">
                    @csrf
                    <input value="{{$products->id}}" name="product_id" class="hidden">
                    <input value="{{$products->price}}" name="price" class="hidden">
                    <label for="">How many :</label>
                    <input type="number" min="1" name="product_quantite" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-50"><br>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2 w-30">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h1 class='text-gray-900 text-3xl pt-10 uppercase font-bold pb-9'>RELATED PRODUCTS</h1>
        <div class="flex flex-wrap justify-center">
            @foreach ($related_products as $item)
            @php
   $product_img = $item->product_img; // Assuming `$item` is an object or array containing the product information
 @endphp
 <div class="max-w-sm rounded overflow-hidden shadow-lg m-4 border-b">
     <img src="{{ asset($product_img) }}" class="w-full h-64 object-cover">
     <div class="px-6 py-4">
         <div class="font-bold text-xl mb-2">{{ Illuminate\Support\Str::limit($item->product_name, 50) }} ...</div>
         <p class="text-gray-700 text-base">{{ Illuminate\Support\Str::limit($item->product_short_des, 20) }}</p>
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
    </div>
    
    
</div>
@endsection