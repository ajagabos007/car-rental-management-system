<x-admin-layout>
    <x-slot name="breadcrumb_links">
        <li> 
            <span>/</span>
            <x-jet-nav-link href="{{route('admin.users.index')}}" :active="request()->routeIs('admin.users.index')">
                {{ __('Users') }} 
            </x-jet-nav-link>
        </li>
        <li> 
            <span>/</span>
            <x-jet-nav-link href="#" :active="true">
                {{$user->name}}  
            </x-jet-nav-link>
        </li>
    </x-slot>
    <x-slot name="header">
       <i class="fas fa-users"></i> {{$user->name}} | Users 
    </x-slot>
    
    <div class="container px-2 mx-auto  dark:text-gray-100">
        <h2 class="text-2xl font-semibold leading-tight">
           User -  {{$user->name}}
        </h2>

        <div class="bg-gray-100">
            <div class="container mx-auto my-5 p-5">
                <div class="md:flex no-wrap md:-mx-2 ">
                    <!-- Left Side -->
                    <div class="w-full md:w-3/12 md:mx-2">
                        <!-- Profile Card -->
                        <div class="bg-white p-3 border-t-4 border-green-400">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <div class="image overflow-hidden">
                                    <img class="h-40 w-full mx-auto"
                                        src="{{$user->profile_photo_url}}"
                                        alt="">
                                </div>
                            @endif
                            <h1 class="text-gray-900 font-bold text-xl leading-8 my-1"> {{$user->name}}</h1>
                            <ul
                                class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                                <li class="flex items-center py-3">
                                    <span>Status</span>
                                    <span class="ml-auto"><span class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                                </li>
                                <li class="flex items-center py-3">
                                    <span>Member since</span>
                                    <span class="ml-auto"> {{$user->created_at->diffForHumans()}}</span>
                                </li>
                            </ul>
                        </div>
                        <!-- End of profile card -->
                        <div class="my-4"></div>
                        <!-- Friends card -->
                        <div class="bg-white p-3 hover:shadow b">
                            <x-assign-role-form  :user="$user"/>
                        </div>
                    
                        <!-- End of friends card -->
                    </div>
                    <!-- Right Side -->
                    <div class="w-full md:w-9/12 mx-2 h-64">
                        <!-- Profile tab -->
                        <!-- About Section -->
                        <div class="bg-white p-3 shadow-sm rounded-sm">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">About</span>
                            </div>
                            <div class="text-gray-700">
                                <div class="grid md:grid-cols-2 text-sm">
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Full Name</div>
                                        <div class="px-4 py-2">{{$user->name}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Contact No.</div>
                                        <div class="px-4 py-2">{{$user->phone_number}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Email.</div>
                                        <div class="px-4 py-2">
                                            <a class="text-blue-800" href="mailto:{{$user->email}}">{{$user->email}}</a>
                                        </div>
                                    </div>
                                    <div class="grid ">
                                        <x-check-staff-form :user="$user"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of about section -->

                        <div class="my-4"></div>

                        <!-- Experience and education -->
                        <div class="bg-white p-3 shadow-sm rounded-sm">

                            <div class="grid grid-cols-1">
                                <div>
                                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                        <span clas="text-green-500">
                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </span>
                                        <span class="tracking-wide">  {{$user->name}}'s Car Rents</span>
                                    </div>
                                            {{$bookings=$user->bookings()->orderBy('created_at','desc')->paginate(5)}}
                                    <hr class="mt-1">
                                    <div class="overflow-auto rounded shadow-md mt-2">
                                        <table class="w-full" >
                                            <thead class="table-header-group dark:bg-gray-700">
                                                <tr class="border-b-4 bg-black text-white font-extrabold">
                                                    <th class="text-left py-1 px-4 whitespace-nowrap">#</th>
                                                    <th class="text-left py-1 px-4 whitespace-nowrap ">Rent Code</th>
                                                    <th class="text-left py-1 px-4 whitespace-nowrap">Rented on</th>
                                                    <th class="text-left py-1 px-4 whitespace-nowrap">Price (NGN)</th>
                                                    <th class="text-center py-1 px-4 whitespace-nowrap">Payment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($bookings as $booking)
                                                <tr class="border-b-2 text-sm hover:bg-green-100 odd:bg-white even:text-green-900'">
                                                    <td class="py-1 px-4 whitespace-nowrap">
                                                        {{++$loop->index}}
                                                    </td>
                                                    <td class="py-1 px-4 whitespace-nowrap">
                                                        <a href="{{route('admin.bookings.show', $booking)}}" class="text-blue-900 hover:underline">
                                                            {{$booking->code}}
                                                        </a>
                                                    </td>
                                                    <td class="py-1 px-4 whitespace-nowrap">
                                                        {{$booking->created_at->diffForHumans()}}
                                                    </td>
                                                    <td class="py-1 px-4 whitespace-nowrap">
                                                        <a href="{{route('admin.bookings.show', $booking)}}" class="text-blue-900 hover:underline">
                                                            {{$booking->amount}}
                                                        </a>
                                                    </td>
                                                    <td class="py-1 px-4 whitespace-nowrap">
                                                        <a href="{{route('payments.show', $booking->payment)}}" class="text-blue-900 hover:underline">
                                                        {{$booking->payment->transaction_reference}}
                                                        </a>
                                                    </td>
                                                </tr> 
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                               
                            </div>
                            <!-- End of Experience and education grid -->
                        </div>
                        <div class="my-4"></div>
                         <!-- User Direct Permission -->
                         <div class="bg-white p-3 shadow-sm rounded-sm">

                            <div class="grid grid-cols-1">
                                <div>
                                    <x-assign-permission-form  :user="$user"/>
                                </div>
                            </div>
                            <!-- End of User Direct Permission grid -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>