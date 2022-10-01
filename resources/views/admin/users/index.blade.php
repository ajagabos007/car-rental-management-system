<x-admin-layout>
    <x-slot name="breadcrumb_links">
        <li> 
            <span>/</span>
            <x-jet-nav-link href="#" :active="request()->routeIs('admin.users.index')">
                {{ __('Users') }} 
            </x-jet-nav-link>
        </li>
    </x-slot>
    <x-slot name="header">
       <i class="fas fa-users"></i> Users 
    </x-slot>
    <div class="container px-2 mx-auto  dark:text-gray-100">
        <h2 class="mb-2 text-2xl font-semibold leading-tight">List of users</h2>
        {{$users->links()}}

        <div class="overflow-auto rounded shadow-sm">
            <table class="w-full" >
                <thead class="table-header-group dark:bg-gray-700">
                    <tr class="border-b-4 bg-black text-white font-extrabold">
                        <th class="text-left py-1 px-4 whitespace-nowrap">#</th>
                        <th class="text-left py-1 px-4 whitespace-nowrap">Name</th>
                        <th class="text-left py-1 px-4 whitespace-nowrap ">Phone Number</th>
                        <th class="text-left py-1 px-4 whitespace-nowrap">Email</th>
                        <th class="text-left py-1 px-4 whitespace-nowrap">Joined</th>
                        <th class="text-left py-1 px-4 whitespace-nowrap">Updated</th>
                        <th class="text-center py-1 px-4 whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="border-b-2 text-sm hover:bg-green-100 odd:bg-white even:text-green-900'">
                        <td class="py-1 px-4 whitespace-nowrap">
                            {{++$loop->index}}
                        </td>
                        <td class="py-1 px-4 whitespace-nowrap">
                            <a href="{{route('admin.users.show', $user)}}" class="flex text-blue-900 hover:underline">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <img src="{{$user->profile_photo_url}}" class="rounded-full w-6 h-6 border border-white mr-2" alt="img">
                                @endif
                                {{$user->name}}
                            </a>
                        </td>
                        <td>
                            <a href="tel:{{$user->phone_number}}" class="text-blue-900 hover:underline">
                                {{$user->phone_number}}
                            </a>
                        </td>
                        <td class="py-1 px-4 whitespace-nowrap">
                            <a href="mailto:{{$user->email}}" class="text-blue-900 hover:underline">
                                {{$user->email}}
                            </a>
                            
                        </td>
                        <td class="py-1 px-4 whitespace-nowrap">
                            {{$user->created_at->diffForHumans()}}
                        </td>
                        <td class="py-1 px-4 whitespace-nowrap">
                            {{$user->updated_at->diffForHumans()}}
                        </td>
                        <td class="py-1 px-4 whitespace-nowrap text-center">
                            <div class="inline-flex rounded-md shadow-sm" role="group">
                                <a href="{{route('admin.users.show', $user)}}" class="inline-flex items-center py-1 px-4 text-sm font-medium text-gray-900 bg-transparent rounded-md border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                    <i class="fas fa-eye pr-1"></i>
                                    View
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>