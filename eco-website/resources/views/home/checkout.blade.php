@extends('home.layouts.template')
@section('homecontent')
<div class="text-center">
    <h1 class='text-gray-900 text-3xl pt-10 uppercase font-bold pb-9'>final steep to set ur order</h1>
</div>
<div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
    <div class="shadow-lg border-b">
      <h2 class="text-xl font-semibold mb-4">Contact Information</h2>
      <div class="border-b pb-4">
        <p class="text-gray-700"><span class="font-medium">City:</span> {{$shipping_ad->city_name}} </p>
        <p class="text-gray-700"><span class="font-medium">Code Postal:</span> {{$shipping_ad->postql_code}} </p>
        <p class="text-gray-700"><span class="font-medium">Phone Number:</span>{{$shipping_ad->phone_number}}</p>
      </div>
    </div>
    <div class="shadow-lg border-b">
      <h2 class="text-xl font-semibold mb-4">Product Details</h2>
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-10">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                Product Name
            </th>
      
           
            
            <th scope="col" class="px-6 py-3">
                quantity
            </th>
            <th scope="col" class="px-6 py-3">
                 Price
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
                         
      
                      @endphp
                       {{$product_name}}
                    </th>
                   
                    <td class="px-6 py-4">
                        {{$item->quantity}}
                    </td>
                   
                    <td class="px-6 py-4">
                        {{$item->price}}
                    </td>
                    
                    @php
                        $total = $total +  $item->price
                    @endphp
                
            </tr>
            @endforeach
            
        </tbody>
        <tr>
           
          <td></td>
          <td class="px-6 py-4 font-bold">total</td>
          <td class="px-6 py-4 font-bold">{{$total}}</td>
          <td class="px-6 py-4">
                       
          
           
        </td>
        </tr>
        
      </table>
    </div>
  </div>

  <section class="flex  m-8">
    <form action="{{route('placeorder')}}" method="POST">
        @csrf
        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-lg shadow-md mr-4 hover:bg-green-600">
           Place Order
          </button>
    </form>
    <form action="" method="POST">
        @csrf
        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-lg shadow-md hover:bg-red-600">
            Cancel Order
          </button>
    </form>
    
  </section>
  
  
@endsection