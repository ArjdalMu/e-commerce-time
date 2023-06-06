@extends('home.profile_template')
@section('profilecontent')

<div class="text-center">
  <h1 class="font-bold text-xl mt-4 mb-5">Pending Orders</h1>
</div>
@if (session()->has('message'))
<div class="flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium"></span> {{session()->get('message')}}
    </div>
  </div>
    
@endif

@if ($pending_orders->isNotEmpty())
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-10">
  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">
          Product Id
      </th>

      <th scope="col" class="px-6 py-3">
        Product Price
    </th>
      
     
      </tr>
  </thead>
  <tbody>
    @php
    $total = 0
@endphp
      @foreach ($pending_orders as $item)
      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
       
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                {{$item->product_id}}
      
              </th>
              
              <td class="px-6 py-4">
                  {{$item->total_price}}
              </td>
             
          
      </tr>
      @endforeach
      
  </tbody>
  
  
</table>
@else
<p>No products added.</p>  
@endif
  

@endsection