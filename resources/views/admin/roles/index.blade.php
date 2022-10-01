<x-admin-layout>
    <x-slot name="breadcrumb_links">
        <li> 
            <span>/</span>
            <x-jet-nav-link href="#" :active="request()->routeIs('admin.roles.index')">
                {{ __('Roles') }} 
            </x-jet-nav-link>
        </li>
    </x-slot>
    <x-slot name="header">
       <i class="fas fa-role"></i> Roles
    </x-slot>
    <div class="container px-2 mx-auto  dark:text-gray-100">
        <h2 class="mb-2 text-2xl font-semibold leading-tight flex gap-4 ">
            <span class="font-semibold">List of Roles</span>
            <a href="{{route('admin.roles.create')}}">
                <i class="fas fa-plus-circle text-md text-slate-700 hover:scale-105"></i>
            </a>
        </h2>
        {{$roles->links()}}
        <div class="overflow-auto rounded shadow-sm">
            <table class="w-full" >
                <thead class="table-header-group dark:bg-gray-700">
                    <tr class="border-b-4 bg-black text-white font-extrabold">
                        <th class="text-left py-1 px-4 whitespace-nowrap">#</th>
                        <th class="text-left py-1 px-4 whitespace-nowrap">Name</th>
                        <th class="text-left py-1 px-4 whitespace-nowrap ">Permissions</th>
                        <th class="text-left py-1 px-4 whitespace-nowrap">Users</th>
                        <th class="text-left py-1 px-4 whitespace-nowrap">Created</th>
                        <th class="text-left py-1 px-4 whitespace-nowrap">Updated</th>
                        <th class="text-center py-1 px-4 whitespace-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr class="border-b-2 text-sm hover:bg-green-100 odd:bg-white even:text-green-900'">
                        <td class="py-1 px-4 whitespace-nowrap">
                            {{++$loop->index}}
                        </td>
                        <td class="py-1 px-4 whitespace-nowrap">
                            <a href="{{route('admin.roles.show', $role)}}" class="flex -space-x-2 mr-2 text-blue-600 hover:underline">
                                {{ $role->name }}
                            </a>
                        </td>
                        <td class="py-1 px-4 whitespace-nowrap">
                            
                           {{$role->permissions->count()}} 
                        </td>
                        <td class="py-1 px-4 whitespace-nowrap">
                            {{App\Models\User::role($role->name)->get()->count()}}  
                        </td>
                        <td class="py-1 px-4 whitespace-nowrap">
                            {{ $role->created_at->diffForHumans()}}
                        </td>
                        <td class="py-1 px-4 whitespace-nowrap">
                            {{$role->updated_at->diffForHumans()}}
                        </td>
                        <td class="py-1 px-4 whitespace-nowrap text-center">
                            <div class="inline-flex rounded-md shadow-sm" role="group">
                               <a href="{{route('admin.roles.show', $role)}}" class="inline-flex items-center py-1 px-4 text-sm font-medium text-gray-900 bg-transparent rounded-l-md border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                    <i class="fas fa-eye pr-1"></i>
                                    View
                                </a>
                                
                                <a href="{{route('admin.roles.edit', $role)}}" class="inline-flex items-center py-1 px-4 text-sm font-medium text-blue-900 bg-transparent  border border-blue-900 hover:bg-blue-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-blue-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-blue-700 dark:focus:bg-blue-700">
                                    Edit 
                                    <i class="fas fa-pen pl-1"></i>
                                </a>
                                <form action="{{route('admin.roles.destroy', $role)}}" method="post" class="inline-flex items-center py-1 px-4 text-sm font-medium text-red-900 bg-transparent rounded-r-lg border border-red-900 hover:bg-red-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-red-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-red-700 dark:focus:bg-red-700">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">
                                        Delete <i class="fas fa-trash pl-1"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

</x-admin-layout>