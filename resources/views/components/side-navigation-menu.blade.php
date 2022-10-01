
  <div class="w-20 hover:w-52 group bg-green-700 min-h-screen p-5 text-white duration-300">
    <div class="relative">
        <a href="{{route('home')}}" class="flex justify-center">
          <x-jet-application-mark class="block h-9 w-auto float-left" />
        </a> 
        <hr class="mt-5">
        <p class="text-green-200 text-center italic text-xs"> 
          <i class="fas fa-user-tie"></i>
          <span class="hidden group-hover:inline text-sm">{{ Auth::user()->name }}</span>
        </p>
        <hr>
        <div class="mt-4 flex justify-center">
          <ul class="w-full">
            <li class="flex">
              <a href="{{route('admin.dashboard')}}" class="rounded mb-1 lg:w-full hover:bg-white hover:text-green-800 p-2 {{request()->routeIs('admin.dashboard')?'bg-white text-green-800 ':''}}" >
                <i class="fas fa-tachometer-alt"> </i> <span class="hidden group-hover:inline text-sm">Dashboard</span> 
              </a>
            </li>

            @canany(['view cars', 'create cars', 'edit cars','delete cars'])
              <li class="flex">
                <a href="{{route('admin.cars.index')}}" class="rounded mb-1 lg:w-full hover:bg-white hover:text-green-800 hover:rounded p-2 {{request()->routeIs('admin.hotels*')?'bg-white text-green-800 ':''}}">
                  <i class="fas fa-car"> </i> <span class="hidden group-hover:inline text-sm"> Cars</span> 
                </a>
              </li>
            @endcanany

            @canany(['view bookings', 'create bookings', 'edit bookings','delete bookings'])
              <li class="flex">
                <a href="{{route('admin.bookings.index')}}" class="rounded mb-1 lg:w-full hover:bg-white hover:text-green-800 hover:rounded p-2 {{request()->routeIs('admin.bookings*')?'bg-white text-green-800 ':''}}">
                  <i class="fas fa-book-open"> </i> <span class="hidden group-hover:inline text-sm"> Rents</span> 
                </a>
              </li>
            @endcanany

            @canany(['view roles', 'create roles', 'edit roles','delete roles'])
              <li class="flex">
                <a href="{{route('admin.roles.index')}}" class="rounded mb-1 lg:w-full hover:bg-white hover:text-green-800 hover:rounded p-2 {{request()->routeIs('admin.roles*')?'bg-white text-green-800 ':''}}">
                <i class="fas fa-street-view"></i> <span class="hidden group-hover:inline text-sm">Roles</span> 
                </a>
              </li>
            @endcanany

            @canany(['view users', 'create users', 'edit users','delete users'])
              <li class="flex">
                <a href="{{route('admin.users.index')}}" class="rounded mb-1 lg:w-full hover:bg-white hover:text-green-800 hover:rounded p-2 {{request()->routeIs('admin.users*')?'bg-white text-green-800 ':''}}">
                  <i class="fas fa-users"> </i> <span class="hidden group-hover:inline text-sm"> Users</span> 
                </a>
              </li>
            @endcanany
          </ul>
        </div>
    </div>
    
  </div>
