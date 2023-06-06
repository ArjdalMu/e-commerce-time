<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>eco time</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>@yield('page_title')</title>
    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-..." crossorigin="anonymous">

    @vite('resources/css/app.css')
</head>

<div>
  <nav class="lg:hidden py-6 px-6 bg-white shadow-lg">
    <div class="flex items-center justify-between">
      <a class="text-2xl text-white font-semibold" >
        <img class="h-10" src="https://www.pngmart.com/files/7/Cart-PNG-Transparent.png" alt="" width="auto">
      </a>
      <button class="navbar-burger flex items-center rounded focus:outline-none">
        <svg class="text-white bg-indigo-500 hover:bg-indigo-600 block h-8 w-8 p-2 rounded" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
          <title>Mobile menu</title>
          <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
        </svg>
      </button>
    </div>
  </nav>
  <div class="hidden lg:block navbar-menu relative z-50">
    <div class="navbar-backdrop fixed lg:hidden inset-0 bg-gray-800 opacity-10"></div>
    <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-3/4 lg:w-80 sm:max-w-xs pt-6 pb-8 bg-gray-800 overflow-y-auto">
      <div class="flex w-full items-center px-6 pb-6 mb-6 lg:border-b border-gray-700">
        <a class="text-xl text-white font-semibold" >
          <img class="h-8" src="artemis-assets/logos/artemis-logo.svg" alt="" width="auto">

          E-commerce <span class="text-blue-400">time</span>
        </a>
      </div>
      <div class="px-4 pb-6">
        <li>
          <a class="flex items-center pl-3 py-3 pr-2 text-gray-50 hover:bg-gray-900 rounded" href="{{route('dashboard')}}">
            <span class="inline-block mr-3">
              <i class="fa-solid fa-chart-line"></i>
              
            </span>
            <span>Dashboard</span>
          </a>
        </li>
        
        <h3 class="mb-2 text-xs uppercase text-gray-500 font-medium">Category</h3>
        <ul class="text-sm font-medium">
          <li>
            <a class="flex items-center pl-3 py-3 pr-2 text-gray-50 hover:bg-gray-900 rounded" href="{{route('addcategory')}}">
              <span class="inline-block mr-3">
                <i class="fa-solid fa-plus text-white"></i>
                
              </span>
              <span>Add Category</span>
            </a>
          </li>
          <li>
            <a class="flex items-center pl-3 py-3 pr-2 text-gray-50 hover:bg-gray-900 rounded" href={{route("allcategory")}}>
              <span class="inline-block mr-3">
                <i class="fa-solid fa-file"></i>
              </span>
              <span>All Categories</span>
            </a>
          </li>
        
        </ul>
        <h3 class="mb-2 text-xs uppercase text-gray-500 font-medium">Sub Category</h3>
        <ul class="text-sm font-medium">
          <li>
            <a class="flex items-center pl-3 py-3 pr-2 text-gray-50 hover:bg-gray-900 rounded" href={{route("addsubcategory")}}>
              <span class="inline-block mr-3">
                <i class="fa-solid fa-plus text-white"></i>
              </span>
              <span>Add Sub Category</span>
            </a>
          </li>
          <li>
            <a class="flex items-center pl-3 py-3 pr-2 text-gray-50 hover:bg-gray-900 rounded" href={{route("allsubcategory")}}>
              <span class="inline-block mr-3">
                <i class="fa-regular fa-file"></i>
              </span>
              <span>All Subs Categories</span>
            </a>
          </li>
        
        </ul>
        <h3 class="mb-2 text-xs uppercase text-gray-500 font-medium">Product</h3>
        <ul class="text-sm font-medium">
          <li>
            <a class="flex items-center pl-3 py-3 pr-2 text-gray-50 hover:bg-gray-900 rounded" href={{route("addproduct")}}>
              <span class="inline-block mr-3">
                <i class="fa-solid fa-plus text-white"></i>
              </span>
              <span>Add Product</span>
            </a>
          </li>
          <li>
            <a class="flex items-center pl-3 py-3 pr-2 text-gray-50 hover:bg-gray-900 rounded" href={{route("allproducts")}}>
              <span class="inline-block mr-3">
                <i class="fa-solid fa-dumpster"></i>
              </span>
              <span>All Products</span>
            </a>
          </li>
        
        </ul>
        <h3 class="mb-2 text-xs uppercase text-gray-500 font-medium">Orders</h3>
        <ul class="text-sm font-medium">
          <li>
            <a class="flex items-center pl-3 py-3 pr-2 text-gray-50 hover:bg-gray-900 rounded" href={{route("pendingorder")}}>
              <span class="inline-block mr-3">
                <i class="fa-solid fa-spinner"></i>
              </span>
              <span>Order</span>
            </a>
          </li>
         
        </ul>
        <div class="pt-8">
          
          <a class="flex items-center pl-3 py-3 pr-2 text-gray-50 hover:bg-gray-900 rounded">
            <span class="inline-block mr-4">
              <i class="fa-solid fa-right-from-bracket"></i>
            </span>

            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit">
                <span>Log Out</span>
              </button>
            </form>
            
          </a>
        </div>
      </div>
    </nav>
  </div>
  <div class="lg:ml-80 " style="margin-top: 180px">

    
    <div class="flex ">
      
      
    </div>
 


@yield('content')

  </div>
</div>




</html>
