<x-admin-layout>
    <x-slot name="breadcrumb_links">
        <li> 
            <span>/</span>
            <x-jet-nav-link href="{{route('admin.cars.index')}}" :active="request()->routeIs('admin.cars.index')">
                {{ __('Cars') }} 
            </x-jet-nav-link>
            <span>/</span>
            <x-jet-nav-link href="#" :active="request()->routeIs('admin.cars.show')">
                {{$car->name}} 
            </x-jet-nav-link>
        </li>
    </x-slot>
    <x-slot name="header">
       <i class="fas fa-plane"></i> {{$car->name}} | Cars 
    </x-slot>
    <div class="container px-2 mx-auto  dark:text-gray-100">
        
        <div class="flex justify-between mb-2 ">
            <h2 class="text-2xl font-semibold leading-tight ">
                CAR: &nbsp<span class="underline text-green-700">{{$car->name}} </span>
            </h2>
            <div class="inline-flex rounded-md shadow-sm" role="group">
                <a href="{{route('admin.cars.create')}}" class="inline-flex items-center py-1 px-4 text-sm font-medium text-gray-900 bg-transparent rounded-l-md border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                    <i class="fas fa-plus-circle pr-1"></i>
                    <span class="hidden lg:flex"> Create new car </span>  
                </a>
                
                
                <a href="{{route('admin.cars.edit', $car)}}" class="inline-flex items-center py-1 px-4 text-sm font-medium text-blue-900 bg-transparent  border border-blue-900 hover:bg-blue-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-blue-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-blue-700 dark:focus:bg-blue-700">
                    <span class="hidden lg:flex"> Edit this car </span>
                    <i class="fas fa-pen pl-1"></i>
                </a>
                <form action="{{route('admin.cars.destroy', $car)}}" method="post" class="inline-flex items-center py-1 px-4 text-sm font-medium text-red-900 bg-transparent rounded-r-lg border border-red-900 hover:bg-red-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-red-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-red-700 dark:focus:bg-red-700">
                    @csrf
                    @method('delete')
                    <button type="submit" class="flex">
                        <span class="hidden lg:flex"> Delete this car </span> <i class="fas fa-trash pl-1"></i>
                    </button>
                </form>
            </div>
        </div>
      
        <div class="grid md:grid-cols-2 gap-4 bg-white shadow p-4">
           
            <div class="flex justify-center">
                @if($car->image)
                    <img src="{{$car->image->url}}" class="h-96 w-fit" alt="img">
                @endif 
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex justify-evenly space-x-2 p-2 bg-slate-200 ">
                    <p class="text-green-700 text-lg">CAR </p>
                    <p>{{$car->name}}</p>
                </div>
                <hr class="border-b-4 border-black">
                <div class="bg-slate-100 p-4 rounded grid grid-flow-row gap-4 lg:flex lg:justify-between lg:space-x-2">
                    
                    <div class=" p-2 bg-white space-x-2">
                        <p class="-mr-1 -mt-4 text-sm text-green-900 px-2">Type</p>
                        <p class="font-extrabold">{{$car->type? $car->type->name: ''}}</p>
                    </div>
                    <div class="p-2 bg-white space-x-2">
                        <p class="-mr-1 -mt-4 text-sm text-green-900 px-2">Passenger</p>
                        <p class="font-extrabold">{{$car->no_of_passenger}}</p>
                    </div>
                    <div class="p-2 bg-white space-x-2">
                        <p class="-mr-1 -mt-4 text-sm text-green-900 px-2">Total Bookings</p>
                        <p class="font-extrabold">{{$car->bookings->count()}}</p>
                    </div>
                </div>

                <div class="bg-slate-100 p-4 rounded grid grid-flow-row gap-4 lg:flex lg:justify-between lg:space-x-2">
                    <div class=" p-2 bg-white space-x-2">
                        <p class="-mr-1 -mt-4 text-sm text-green-900 px-2">From</p>
                        <p class="font-extrabold">{{$car->from}}</p>
                        <p class="font-extralight text-xs">
                            <i class="fas fa-plane-departure"> </i> Departure Time: {{$car->departure_on}}
                        </p>
                    </div>
                    <div class="p-2 bg-white space-x-2">
                        <p class="-mr-1 -mt-4 text-sm text-green-900 px-2">Destination</p>
                        <p class="font-extrabold">{{$car->to}}</p>
                        <p class="font-extralight text-xs">
                            <i class="fas fa-plane-arrival"> </i> Arriving Time: {{$car->arriving_on}}
                        </p>
                    </div>
                </div>

                <div class="bg-slate-100 p-4 rounded grid grid-flow-row gap-4 lg:flex lg:justify-between lg:space-x-2">
                    <div class=" p-2 bg-white space-x-2">
                        <p class="-mr-1 -mt-4 text-sm text-green-900 px-2">Cancellation Fee (NGN)</p>
                        <p class="font-extrabold">{{$car->cancellation_fee}}</p>
                    </div>
                    <div class="p-2 bg-white space-x-2">
                        <p class="-mr-1 -mt-4 text-sm text-green-900 px-2">Tax (NGN)</p>
                        <p class="font-extrabold">{{$car->tax}}</p>
                    </div>
                    <div class="p-2 bg-white space-x-2">
                        <p class="-mr-1 -mt-4 text-sm text-green-900 px-2">Price (NGN)</p>
                        <p class="font-extrabold">{{$car->price}}</p>
                    </div>
                </div>
                <hr class="border-b-1 border-green-700 ">
                <div class="bg-slate-100 p-4 rounded grid grid-flow-row gap-4 lg:flex lg:justify-start lg:space-x-2">
                    <div class=" p-2 bg-white space-x-2">
                        <p class="-mr-1 -mt-4 text-xs text-green-900 px-2">Created on</p>
                        <p class="text-xs">{{$car->created_at->diffForHumans()}}</p>
                    </div>
                    <div class=" p-2 bg-white space-x-2">
                        <p class="-mr-1 -mt-4 text-xs text-green-900 px-2">Last Updated</p>
                        <p class="text-xs">{{$car->updated_at->diffForHumans()}}</p>
                    </div>
                    
                    <div class="inline-flex rounded-md shadow-sm" role="group">
                        <a href="{{route('admin.cars.edit', $car)}}" class="inline-flex items-center py-1 px-4 text-sm font-medium text-blue-900 bg-transparent rounded-l-lg  border border-blue-900 hover:bg-blue-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-blue-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-blue-700 dark:focus:bg-blue-700">
                            Edit 
                            <i class="fas fa-pen pl-1"></i>
                        </a>
                        <form action="{{route('admin.cars.destroy', $car)}}" method="post" class="inline-flex items-center py-1 px-4 text-sm font-medium text-red-900 bg-transparent rounded-r-lg border border-red-900 hover:bg-red-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-red-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-red-700 dark:focus:bg-red-700">
                            @csrf
                            @method('delete')
                            <button type="submit">
                                Delete <i class="fas fa-trash pl-1"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-b-4 bg-green-700 text-white font-extrabold">
            <p class="text-left pt-2 px-4 whitespace-nowrap">
                Available Amenities
            </p> 
            <ul class="m-2 p-1 text-black bg-slate-200 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5  rounded {{ $errors->has('amenities') ? 'border-pink-500 text-pink-600 focus:border-pink-500 focus:ring-pink-500' : '' }}" >
                @foreach($car->amenities as $amenity)
                    <li> <i class="fab fa-youtube p-2 text-green-700"> </i>{{$amenity->name}}</li>
                @endforeach
            <ul>
        </div>
        <div class="overflow-x-scroll rounded shadow-md mt-2">
            <ul class="flex gap-4">
                @foreach($car->bookings as $booking)
                <li class=" p-2 border-b-2 text-sm hover:bg-green-100 odd:bg-white even:text-green-900 whitespace-nowrap"> {{$booking->user->name}} </li>
                @endforeach
            </ul>
        </div>
        <div>
            <div class="flex space-x-1 w-full bg-green-700 text-white font-mono rounded justify-center">
                <button class="border-green-700 border-b-2 px-4 py-2 hover:bg-green-700 hover:text-white">
                    Overview
                </button> 
            </div>
            <div class="grid grid-cols-1 gap-4 mt-2 mb-4">
                <div class="bg-white p-4 rounded-lg shadow" >
                    <div class="overflow-auto rounded shadow-sm">
                        <h1 class="text-xl font-mono font-extrabold inline-flex items-center" >
                            Car Rents 
                            <span class="inline-flex justify-center p-2 items-center ml-2 w-6 h-6 text-xs font-semibold text-gray-800 bg-gray-200 rounded-full">
                            {{$car->bookings->count()}}  
                            </span>
                        </h1>
                        {{ $bookings= $car->bookings()->paginate(10)}}
                        <hr class="mt-1">
                        <div class="overflow-auto rounded shadow-md mt-2">
                            <table class="w-full" >
                                <thead class="table-header-group dark:bg-gray-700">
                                    <tr class="border-b-4 bg-black text-white font-extrabold">
                                        <th class="text-left py-1 px-4 whitespace-nowrap">#</th>
                                        <th class="text-left py-1 px-4 whitespace-nowrap">Name</th>
                                        <th class="text-left py-1 px-4 whitespace-nowrap ">Booking Code</th>
                                        <th class="text-left py-1 px-4 whitespace-nowrap">Booked on</th>
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
                                            {{$booking->user->name}}

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
               
            </div>
        </div>

    </div>

</x-admin-layout>