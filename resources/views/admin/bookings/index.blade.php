<x-admin-layout>
    <x-slot name="breadcrumb_links">
        <li>                    
            <x-jet-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.bookings.index')">
                {{ __('Bookings') }}
            </x-jet-nav-link>
        </li>
    </x-slot>
    <x-slot name="header">
        Bookings
    </x-slot>
    
</x-admin-layout>
