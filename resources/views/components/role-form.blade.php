<div>
    <!-- 
  <options=bold>“ Be present above all else. ”</>
  <fg=gray>— Naval Ravikant</>
 -->
    <h2 class="mb-2 text-2xl font-semibold leading-tight">
        <span class="font-semibold">{{ $role? "Edit Role  - ".$role->name :"Create New Role" }} </span>
    </h2>
    <form action="{{$role? route('admin.roles.update', $role) : route('admin.roles.store') }}" class="mb-2" enctype="multipart/form-data" method="post">
        @csrf
        @if($role)
            @method('put')
        @endif
        <div class="grid  md:grid-cols-2 gap-4">
            <div class="mt-4 bg-white p-4 rounded">
                <div class="my-4">
                    <div class="flex space-x-2">
                        <i class="fas fa-users"></i>
                        <x-jet-label class="text-sm" value="{{ __('Role Name') }}" />
                    </div>
                    <x-jet-input class=" block mt-1 w-full {{ $errors->has('name') ? 'border-pink-500 text-pink-600 focus:border-pink-500 focus:ring-pink-500' : '' }}" type="text" id="name" name="name"
                                :value="$role? $role->name: old('name')"  autofocus autocomplete="name" />
                    <x-jet-input-error for="name"></x-jet-input-error>
                </div>
                <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">          
                    <x-jet-label class="text-lg" for="permission" value="{{'Role permissions' }}" />
                </div>
                <ul class="w-full max-h-64 overflow-y-auto grid md:grid-cols-2 lg:grid-cols-3  rounded {{ $errors->has('permission') ? 'border-pink-500 text-pink-600 focus:border-pink-500 focus:ring-pink-500' : '' }}" >
                    @foreach($permissions as $permission)
                        @if(old('permission_'.$permission->id) )
                            @if($permission->id == old('permission_'.$permission->id))
                                <li> 
                                    <x-jet-checkbox  :value="$permission->id" name="permission_{{$permission->id}}" checked/>
                                    <label for="" class="text-sm text-gray-600"> {{$permission->name}} </label>
                                </li>
                            @else 
                                <li> 
                                    <x-jet-checkbox  :value="$permission->id" name="permission_{{$permission->id}}"/>
                                    <label for="" class="text-sm text-gray-600"> {{$permission->name}}</label>
                                </li>
                            @endif
                        @else 
                                @if($role && $role->permissions()->where('permission_id', $permission->id)->get()->first())
                                    <li> 
                                        <x-jet-checkbox  :value="$permission->id" name="permission_{{$permission->id}}" checked/>
                                        <label for="" class="text-sm text-gray-600"> {{$permission->name}}</label>
                                    </li>
                                @else
                                    <li> 
                                        <x-jet-checkbox  :value="$permission->id" name="permission_{{$permission->id}}"/>
                                        <label for="" class="text-sm text-gray-600"> {{$permission->name}}</label>
                                    </li>
                                @endif
                        @endif
                    @endforeach
                </ul>
                <x-jet-input-error for="permission" />
            </div>
            <div class="mt-4 bg-white p-4 rounded">
                <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                    <span class="text-green-500">
                    <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    </span>          
                    <x-jet-label class="text-lg" for="permission" value="{{ $role? $role->name.' ' . __('- List') : 'no role' }}" />
                </div>
                <ul class="w-full max-h-64 overflow-y-auto grid md:grid-cols-2 lg:grid-cols-3   rounded {{ $errors->has('permission') ? 'border-pink-500 text-pink-600 focus:border-pink-500 focus:ring-pink-500' : '' }}" >
                    @foreach($users as $user)
                        @if(old('user_'.$user->id) )
                            @if($user->id == old('user_'.$user->id))
                                <li> 
                                    <x-jet-checkbox  :value="$user->id" name="user_{{$user->id}}" checked/>
                                    <label for="" class="text-sm text-gray-600"> {{$user->name}} </label>
                                </li>
                            @else 
                                <li> 
                                    <x-jet-checkbox  :value="$user->id" name="user_{{$user->id}}"/>
                                    <label for="" class="text-sm text-gray-600"> {{$user->name}}</label>
                                </li>
                            @endif
                        @else 
                                @if($role && $role->users()->where('model_id', $user->id)->get()->first())
                                    <li> 
                                        <x-jet-checkbox  :value="$user->id" name="user_{{$user->id}}" checked/>
                                        <label for="" class="text-sm text-gray-600"> {{$user->name}}</label>
                                    </li>
                                @else
                                    <li> 
                                        <x-jet-checkbox  :value="$user->id" name="user_{{$user->id}}"/>
                                        <label for="" class="text-sm text-gray-600"> {{$user->name}}</label>
                                    </li>
                                @endif
                        @endif
                    @endforeach
                </ul>
                <x-jet-input-error for="permission" />
            </div>
        </div>
        <div class="flex items-center justify-end mt-4" x-data="{ open: false }">
            <x-jet-button class="ml-4" x-on:click="open = ! open"  @click.away="open = false">
                <div role="status"x-show="open">
                    <svg class="inline mr-2 w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-green-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
                {{ $role? __('Update') : __('Create')}}
            </x-jet-button>
        </div>
    </form>
</div>