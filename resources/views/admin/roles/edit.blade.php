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
        <li> 
            <span>/</span>
            <x-jet-nav-link href="#" :active="request()->routeIs('admin.roles.edit')">
                {{__('Edit') }} 
            </x-jet-nav-link>
        </li>
    </x-slot>
    <x-slot name="header">
       <i class="fas fa-users"></i> Edit Role - {{$role->name }} 
    </x-slot>
    
    <div class="container px-2 mx-auto  dark:text-gray-100">
        <x-role-form :role="$role"/>
    </div>

</x-admin-layout>