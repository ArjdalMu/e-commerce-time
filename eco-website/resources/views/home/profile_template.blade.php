@extends('home.layouts.template')
@section('homecontent')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body >
    <div class="flex h-screen w-full bg-gray-800 " x-data="{openMenu:1}">
        <!--Start SideBar-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div class="flex flex-col bg-gray-200 h-screen w-16">
  <a href="{{route('userprofile')}}" class="flex items-center justify-center h-16 hover:bg-gray-300">
    <i class="fas fa-chart-bar text-gray-700"></i>
  </a>
  <a href="{{route("pendingorders")}}" class="flex items-center justify-center h-16 hover:bg-gray-300">
    <i class="fas fa-file-alt text-gray-700"></i>
  </a>
  <a href="{{route('history')}}" class="flex items-center justify-center h-16 hover:bg-gray-300">
    <i class="fas fa-history text-gray-700"></i>
  </a>
  <form action="{{ route('logout') }}" method="POST">
    @csrf
    <a href="" class="flex items-center justify-center h-16 hover:bg-gray-300">
      <button type="submit"><i class="fas fa-sign-out-alt text-gray-700"></i></button>
    </a>
</form>
</div>

        <!-- Start Open Menu -->
       
        <!-- End Open Menu -->
        
        <!-- End Sidebar -->
        <div class="flex flex-col flex-1 w-full overflow-y-auto">
            <!--Start Topbar -->
            <!--End Topbar -->
          <main class="relative z-0 flex-1 pb-8 px-6 bg-white">
              <div class="grid pb-10  mt-4 ">
                  <!-- Start Content-->
                 @yield('profilecontent')
                    
                  <!-- End Content-->
              </div>
          </main>
        </div>
    </div>
</body>
  
@endsection