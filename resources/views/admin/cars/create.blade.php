<x-admin-layout>
    <x-slot name="breadcrumb_links">
        <li> 
            <span>/</span>
            <x-jet-nav-link href="{{route('admin.cars.index')}}" :active="request()->routeIs('admin.cars.index')">
                {{ __('Cars') }} 
            </x-jet-nav-link>
        </li>
        <li>
            <span>/</span>
            <x-jet-nav-link href="#" :active="request()->routeIs('admin.cars.create')">
                {{ __('Create') }} 
            </x-jet-nav-link>
        </li>
    </x-slot>
    <x-slot name="header">
       <i class="fas fa-car"></i> Cars 
    </x-slot>
    <x-car-form/>   
</x-admin-layout>