@extends('home.layouts.auth_template')

@section('authcontent')

<!-- component -->
<div class="bg-white dark:bg-gray-900">
    <div class="flex justify-center h-screen">
        <div class="hidden bg-cover lg:block lg:w-2/3" style="background-image: url(https://images.unsplash.com/photo-1616763355603-9755a640a287?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80)">
            <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                <div>
                    <h2 class="text-4xl font-bold text-white"><a href="{{route('home')}}" class="text-white font-bold text-xl">E-commerce <span class="text-blue-400">time</span> </a></h2>
                    
                   
                </div>
            </div>
        </div>
        
        <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
            <div class="flex-1">
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-center text-gray-700 dark:text-white"><a href="{{route('home')}}" class="text-gray-900 font-bold text-xl">E-commerce <span class="text-blue-400">time</span> </a></h2>
                    
                    <p class="mt-3 text-gray-500 dark:text-gray-300">Create an account to get started</p>
                </div>

                <div class="mt-8">
                    <form method="POST" action="{{ route('buyer.registerstore') }}">
                        @csrf
                        <div>
                            <label for="name" :value="__('Name')" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Your Name</label>
                            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <label for="email" :value="__('Email')" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Email Address</label>
                            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="email" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <label for="password" :value="__('Password')" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Password</label>
                            <input id="password" type="password" name="password" required autocomplete="new-password" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <label for="password_confirmation" :value="__('Confirm Password')" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Confirm Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>

                    <p class="mt-6 text-sm text-center text-gray-400">Already have an account? <a href="user-login" class="text-blue-500 focus:outline-none focus:underline hover:underline">Log in</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
