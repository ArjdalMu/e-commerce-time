@extends('home.layouts.template')
@section('homecontent')
<div class="text-center">
  <h1 class="text-3xl m-10">ADD TO CART</h1>
    @if (session()->has('message'))
<div class="flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium"></span> {{session()->get('message')}}
    </div>
  </div>
    
@endif
</div>
@if ($cart_items->isNotEmpty())
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-10">
  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">
          Product Name
      </th>

      <th scope="col" class="px-6 py-3">
        Product Image
    </th>
      
      <th scope="col" class="px-6 py-3">
          quantity
      </th>
      <th scope="col" class="px-6 py-3">
           Price
      </th>
      
      <th scope="col" class="px-6 py-3">
          Actions
      </th>
      </tr>
  </thead>
  <tbody>
    @php
    $total = 0
@endphp
      @foreach ($cart_items as $item)
      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
       
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                @php
                    $product_name = App\Models\Product::where('id',$item->product_id)->value('product_name');
                    $product_image = App\Models\Product::where('id',$item->product_id)->value('product_img')

                @endphp
                 {{$product_name}}
              </th>
              <td class="px-6 py-4">
                <img src="{{asset($product_image)}}" style="height: 90px;" alt="" sizes="" srcset="">
                <br>
              </td>
              <td class="px-6 py-4">
                  {{$item->quantity}}
              </td>
             
              <td class="px-6 py-4">
                  {{$item->price}}
              </td>
              <td class="px-6 py-4">
                 
                  <a href="{{route('removeitem',$item->id)}}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">remove</a>
              </td>
              @php
                  $total = $total +  $item->price
              @endphp
          
      </tr>
      @endforeach
      
  </tbody>
  <tr>
    <td></td>
    <td></td>
    <td class="px-6 py-4 font-bold">total</td>
    <td class="px-6 py-4 font-bold">{{$total}}</td>
    <td class="px-6 py-4">
                 
     @if ($total <=0)
     <a href="{{route('removeitem',$item->id)}}" class="focus:outline-none text-white bg-blue-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" @disabled(true)>Checkout Now</a>

     @else
     <a href="{{route('shippingadresse')}}" class="focus:outline-none text-white bg-blue-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" @disabled(false)>Checkout Now</a>
     @endif
     
  </td>
  </tr>
  
</table>
@else
<p>No products added.</p>  
@endif
@endsection