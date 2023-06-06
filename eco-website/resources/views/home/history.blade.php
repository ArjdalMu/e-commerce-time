@extends('home.profile_template')
@section('profilecontent')

<div class="text-center">
    <h1 class="font-bold text-xl mt-4 mb-5">
        History
    </h1>

    @foreach ($pending_orders as $item)   
<div class="p-5 mb-4 border border-gray-100 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
   
    
    <time class="text-lg font-semibold text-gray-900 dark:text-white">{{date('d-m-Y',strtotime($item->updated_at))}}</time>
    <ol class="mt-3 divide-y divider-gray-200 dark:divide-gray-700">
        <li>
            <a href="#" class="items-center block p-3 sm:flex hover:bg-gray-100 dark:hover:bg-gray-700">
                
                <div class="text-gray-600 dark:text-gray-400">
                    <div class="text-base font-normal">
                        <span class="font-medium text-gray-900 dark:text-white">Product:</span> {{$item->product->product_name}}
                    </div>
                    <div class="text-base font-normal">
                        <span class="font-medium text-gray-900 dark:text-white">Quantity:</span> {{$item->quantity}}
                    </div>
                    <div class="text-base font-normal">
                        <span class="font-medium text-gray-900 dark:text-white">Total Price:</span> {{$item->total_price}}
                    </div>
                </div>
                
            </a>
        </li>
        <li>
           
        </li>
    </ol>
    
</div>
@endforeach


</div>

@endsection