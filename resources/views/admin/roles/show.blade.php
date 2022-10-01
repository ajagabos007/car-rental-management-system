<x-admin-layout>
 
    <x-slot name="breadcrumb_links">
        <li> 
            <span>/</span>
            <x-jet-nav-link href="{{route('admin.roles.index')}}" :active="request()->routeIs('admin.roles.index')">
                {{ __('Roles') }} 
            </x-jet-nav-link>
        </li>
        <li> 
            <span>/</span>
            <x-jet-nav-link href="{{route('admin.roles.show', $role)}}" :active="request()->routeIs('admin.roles.show')">
                {{$role->name }} 
            </x-jet-nav-link>
        </li>
    </x-slot>
    <x-slot name="header">
       <i class="fas fa-users"></i> Role -  {{$role->name }}
    </x-slot>
    <div class="container px-2 mx-auto  dark:text-gray-100">
        <div class="flex justify-between mb-2 ">
            <h2 class="md:text-2xl font-semibold leading-tight ">
                Role - &nbsp<span class="underline text-green-700">{{$role->name}} </span>
            </h2>
            <div class="inline-flex rounded-md shadow-sm" role="group">
                <a href="{{route('admin.roles.create')}}" class="inline-flex items-center py-1 px-4 text-sm font-medium text-gray-900 bg-transparent rounded-l-md border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                    <i class="fas fa-plus-circle pr-1"></i>
                   <span class="hidden lg:flex"> Create new role </span>   
                </a>
                
                
                <a href="{{route('admin.roles.edit', $role)}}" class="inline-flex items-center py-1 px-4 text-sm font-medium text-blue-900 bg-transparent  border border-blue-900 hover:bg-blue-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-blue-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-blue-700 dark:focus:bg-blue-700">
                    <span class="hidden lg:flex"> Edit this role </span>
                    <i class="fas fa-pen pl-1"></i>
                </a>
                <form action="{{route('admin.roles.destroy', $role)}}" method="post" class="inline-flex items-center py-1 px-4 text-sm font-medium text-red-900 bg-transparent rounded-r-lg border border-red-900 hover:bg-red-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-red-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-red-700 dark:focus:bg-red-700">
                    @csrf
                    @method('delete')
                    <button type="submit" class="flex">
                        <span class="hidden lg:flex"> Delete this role </span> <i class="fas fa-trash pl-1"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-2">
            <div class="bg-white p-3 ">
                <h1 class="bg-black text-white p-2 rounded"> 
                    {{$role->name}} - users 
                    <span class="inline-flex justify-center items-center  ml-2 w-4 h-4 text-xs font-semibold text-green-800 bg-green-200 rounded-full">
                        {{ App\Models\User::role($role->name)->get()->count() }}
                    </span>
                </h1>
                <ol class="p-2 px-5 max-h-96 overflow-x-auto">
                    @foreach( App\Models\User::role($role->name)->get() as $user)
                         <li>
                            <a href="{{route('admin.users.show', $user)}}" class="hover:text-blue-600"> <i class="fas fa-check text-green-700"></i> {{$user->name}}</a>
                         </li>
                    @endforeach
                </ul>
            </div>

            <div class="bg-white p-3 ">
                <h1 class="bg-black text-white p-2 rounded"> 
                    {{$role->name}} - permissions
                    <span class="inline-flex justify-center items-center ml-2 w-4 h-4 text-xs font-semibold text-green-800 bg-green-200 rounded-full">
                        {{$role->permissions->count()}}
                    </span>
                </h1>
                <ol class="p-2 px-5 max-h-96 overflow-x-auto">
                    @foreach($role->permissions as $permission)
                         <li>
                             <i class="fas fa-check text-green-700"></i> {{$permission->name}}
                         </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</x-damin-layout>