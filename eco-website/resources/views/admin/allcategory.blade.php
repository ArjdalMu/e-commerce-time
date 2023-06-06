@extends('admin.layouts.template')
@section('content')
    <div class="md:m-4" >
        <h4 class="font-bold py-3 mb-4">
            <span class="text-gray-500 font-light">Page</span>/
            All Category
        </h4>
        
<div class="relative overflow-x-auto">
    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Available categories</h2>
    @if (session()->has('message'))
    <div class="flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium"></span> {{session()->get('message')}}
        </div>
      </div>
        
    @endif
    
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Category Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Sub Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Slug
                </th>
                
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)


            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$category->id}}
                </th>
                <td class="px-6 py-4">
                    {{$category->category_name}}
                </td>
                <td class="px-6 py-4">
                    {{$category->subcategory_count}}
                </td>
                <td class="px-6 py-4">
                    {{$category->slug}}
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('editcategory',$category->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">edit</a>
                    <a href="{{route('deletecategory',$category->id)}}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">delete</a>
                </td>
            </tr>
                
            @endforeach
           
        </tbody>
    </table>
</div>

    </div>
@endsection