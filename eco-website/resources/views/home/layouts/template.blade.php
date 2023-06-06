
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
    @vite('resources/css/app.css')


    <style>
        .hero-bg-image{
            background: url('https://wallpaperaccess.com/full/2483946.jpg');
            background-attachment: fixed;
                
            background-size: cover;
   
    
    height: 600px;

        }
       body{
        min-height: 100vh;
  display: flex;
  flex-direction: column;
       }
      
      .footer {
        margin-top: auto;
        width: 100%;
        background-color: #111827; /* Replace with your desired background color */
        color: #ffffff; /* Replace with your desired text color */
        padding: 10px;
        text-align: center;
      }

    </style>
</head>
<body>
  <!-- Include Font Awesome CDN -->
<!-- Include Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Include Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<nav class="bg-gray-800">
  <div class="max-w-7xl mx-auto px-4 sm:px-6">
      <div class="flex items-center justify-between h-16">
          <div class="flex-shrink-0">
              <a href="{{route('home')}}" class="text-white font-bold text-xl">E-commerce <span class="text-blue-400">time</span> </a>
          </div>
          <div class="hidden lg:flex"> <!-- Hide on screens smaller than lg -->
              <div class="flex justify-center flex-grow">
                  <a href="{{route('home')}}" class="text-gray-300 hover:text-white px-3 py-2">Home</a>
                  <div class="relative inline-block text-left">
                      <div>
                          <button type="button" id="categoriesButton" class="text-gray-300 hover:text-white px-3 py-2 flex items-center">
                              Categories
                              <svg class="ml-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M6.293 6.707a1 1 0 0 1 1.414 0L10 9.586l2.293-2.293a1 1 0 1 1 1.414 1.414l-3 3a1 1 0 0 1-1.414 0l-3-3a1 1 0 0 1 0-1.414z" clip-rule="evenodd" />
                              </svg>
                          </button>
                      </div>
                      <div id="categoriesDropdown" class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                          @php
                          $categories = App\Models\Category::latest()->get()
                          @endphp
                          <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="categoriesButton">
                              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">All Categories</a>
                              <div class="border-t border-gray-200"></div>
                              @foreach ($categories as $category)
                                <a href="{{route('category',[$category->id,$category->slug])}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">{{$category->category_name}}</a>
                              @endforeach
                              
                              <!-- Add more categories as needed -->
                          </div>
                      </div>
                  </div>
                  
              </div>
              <div class="flex">
                  <a href="{{route('userprofile')}}" class="text-gray-300 hover:text-white px-3 py-2">
                      <i class="fas fa-user"></i>
                  </a>
                  <a href="{{route('addtocart')}}" class="text-gray-300 hover:text-white px-3 py-2">
                      <i class="fas fa-shopping-cart"></i>
                  </a>
              </div>
          </div>
          <div class="lg:hidden"> <!-- Show on screens smaller than lg -->
              <div class="flex">
                  <a href="{{route('userprofile')}}" class="text-gray-300 hover:text-white px-3 py-2">
                      <i class="fas fa-user"></i>
                  </a>
                  <a href="{{route('addtocart')}}" class="text-gray-300 hover:text-white px-3 py-2">
                      <i class="fas fa-shopping-cart"></i>
                  </a>
                  <button id="toggleNavButton" class="text-gray-300 hover:text-white px-3 py-2">
                      <i class="fas fa-bars"></i>
                  </button>
              </div>
          </div>
      </div>
      <div id="navLinks" class="hidden lg:hidden"> <!-- Hide on screens larger than lg -->
          <a href="{{route('home')}}" class="block text-gray-300 hover:text-white px-3 py-2">Home</a>
          <div class="relative inline-block text-left">
              <div>
                  <button type="button" id="categoriesButtonMobile" class="block text-gray-300 hover:text-white px-3 py-2 w-full text-left">
                      Categories
                      <svg class="ml-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M6.293 6.707a1 1 0 0 1 1.414 0L10 9.586l2.293-2.293a1 1 0 1 1 1.414 1.414l-3 3a1 1 0 0 1-1.414 0l-3-3a1 1 0 0 1 0-1.414z" clip-rule="evenodd" />
                      </svg>
                  </button>
              </div>
              <div id="categoriesDropdownMobile" class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">All Categories</a>
                  <div class="border-t border-gray-200"></div>
                  @foreach ($categories as $category)
                      <a href="{{route('category',[$category->id,$category->slug])}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">{{$category->category_name}}</a>
                  @endforeach
                  <!-- Add more categories as needed -->
              </div>
          </div>
          <a href="#" class="block text-gray-300 hover:text-white px-3 py-2">Contact</a>
      </div>
  </div>
</nav>












    
   @yield('homecontent')
    
<!-- Footer section with social media icons and newsletter sign-up -->
<footer class="footer">
  <div class="p-4 text-center" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2023 Copyright:
    <a href="{{route('home')}}" class="text-white font-bold text-l">E-commerce <span class="text-blue-400">time</span> </a>
  </div>
</footer>




<script>
  var categoriesButton = document.getElementById('categoriesButton');
  var categoriesDropdown = document.getElementById('categoriesDropdown');

  categoriesButton.addEventListener('click', function() {
      categoriesDropdown.classList.toggle('hidden');
  });
  // JavaScript to toggle the navigation links
  document.getElementById("toggleNavButton").addEventListener("click", function() {
        document.getElementById("navLinks").classList.toggle("hidden");
    });


    // JavaScript to toggle the categories dropdown in mobile view
    document.getElementById("categoriesButtonMobile").addEventListener("click", function() {
        document.getElementById("categoriesDropdownMobile").classList.toggle("hidden");
    });

  


    
</script>

</body>




  
  