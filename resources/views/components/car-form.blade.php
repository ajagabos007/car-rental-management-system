<div>
    <!-- 
  <options=bold>“ If you do not have a consistent goal in life, you can not live it in a consistent way. ”</>
  <fg=gray>— Marcus Aurelius</>
 -->
 <div class="container px-2 mx-auto  dark:text-gray-100">
      <h2 class="mb-2 text-2xl font-semibold leading-tight">
          <span class="font-semibold">{{ $car? "Edit Car ".$car->name :"Create New Car" }} </span>
      </h2>
      <form method="POST" action="{{ $car? route('admin.cars.update', $car) : route('admin.cars.store') }}" enctype="multipart/form-data" class=" p-4 rounded shadow shadow-green-700">
        @if($car)
            @method('put')
        @endif
        @csrf
        <div class="flex justify-start">
            @if($car && $car->image)
                <img src="{{$car->image->url}}" id="preview-image-before-upload" class="rounded h-36" alt="car image" srcset="" width="200" heights="200">
            @else
                <img src="{{asset('auto_rental/assets/images/car-rental-logo.jpg')}}" id="preview-image-before-upload" class="rounded h-36" alt="car image" srcset="" width="200" heights="200">
            @endif 
        </div>
        <div class="grid md:grid-cols-3 gap-3 shadow">            
            <div class="mt-4">
                <x-jet-label class="text-sm px-2" value="{{ __('Upload Image') }}" />

                <x-jet-input class=" block mt-1 w-full p-1 border bg-white { $errors->has('image') ? 'border-pink-500 text-pink-600 focus:border-pink-500 focus:ring-pink-500' : '' }}" type="file" id="image" name="image"
                            autofocus  accept="image/*" />
                <x-jet-input-error for="image"></x-jet-input-error>
            </div>
            <div class="mt-4">
                <x-jet-label class="text-sm" value="{{ __('Car Name') }}" />

                <x-jet-input class=" block mt-1 w-full {{ $errors->has('name') ? 'border-pink-500 text-pink-600 focus:border-pink-500 focus:ring-pink-500' : '' }}" type="text" id="name" name="name"
                            :value="$car? $car->name: old('name')"  autofocus autocomplete="name" />
                <x-jet-input-error for="name"></x-jet-input-error>
            </div>
            <div class="mt-4">
                <x-jet-label class="text-sm" value="{{ __('Rental Company') }}" />

                <x-jet-input class=" block mt-1 w-full {{ $errors->has('rental_company') ? 'border-pink-500 text-pink-600 focus:border-pink-500 focus:ring-pink-500' : '' }}" type="text" id="rental_company" name="rental_company"
                            :value="$car? $car->rental_company: old('rental_company')"  autofocus autocomplete="rental_company" />
                <x-jet-input-error for="rental_company"></x-jet-input-error>
            </div>
        </div>
        <div class="grid">
            <div class="mt-4">
                <x-jet-label class="text-sm" for="rental_information" value="{{ __('Rental Information') }}" />
                <textarea id="summernote" name="rental_information" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 {{ $errors->has('rental_information') ? 'border-pink-500 text-pink-600 focus:border-pink-500 focus:ring-pink-500' : '' }}" placeholder="Car rental information...">{{old('rental_information')? old('rental_information') : ($car? $car->rental_information: '')}}</textarea>
                <x-jet-input-error for="rental_information"></x-jet-input-error>
            </div>
        </div>
        <div class="grid md:grid-cols-3 gap-3">
            <div class="mt-4">
                <x-jet-label class="text-sm" value="{{ __('No of Passenger') }}" />

                <x-jet-input class=" block mt-1 w-full {{ $errors->has('no_of_passenger') ? 'border-pink-500 text-pink-600 focus:border-pink-500 focus:ring-pink-500' : '' }}" type="number" min='0' id="no_of_passenger" name="no_of_passenger"
                            :value="$car? $car->no_of_passenger: old('no_of_passenger')"  autofocus autocomplete="no_of_passenger" />
                <x-jet-input-error for="no_of_passenger"></x-jet-input-error>
            </div>
            <div class="mt-4">
                <x-jet-label class="text-sm" value="{{ __('No of Baggage') }}" />

                <x-jet-input class=" block mt-1 w-full {{ $errors->has('no_of_baggage') ? 'border-pink-500 text-pink-600 focus:border-pink-500 focus:ring-pink-500' : '' }}" type="number" min="0" id="no_of_baggage" name="no_of_baggage"
                            :value="$car? $car->no_of_baggage: old('no_of_baggage')"  autofocus autocomplete="no_of_baggage" />
                <x-jet-input-error for="no_of_baggage"></x-jet-input-error>
            </div>
            <div class="mt-4">
                <x-jet-label class="text-sm" for="car_type_id" value="{{ __('Car type') }}" />
                <select name="car_type_id" id="car_type_id" class="w-full rounded {{ $errors->has('car_type_id') ? 'border-pink-500 text-pink-600 focus:border-pink-500 focus:ring-pink-500' : '' }}" placeholder="select car type">
                    <option class="gray text-sm">Select... </option>
                    @foreach (App\Models\CarType::all() as $car_type)
                        @if (old('car_type_id') == $car_type->id)
                            <option value="{{$car_type->id}}" selected>{{$car_type->name}}</option>
                        @else
                            @if($car && $car->type && $car->type->id ==$car_type->id && !old('car_type_id'))
                                <option value="{{$car->type->id}}" selected>{{$car->type->name}}</option>
                            @else   
                                <option value="{{$car_type->id}}">{{$car_type->name}}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
                <x-jet-input-error for="car_type_id" />
            </div>
        </div>
        <div class="grid md:grid">
        <div class="mt-4">
                <x-jet-label class="text-lg" for="amenities" value="{{ __('Amenities') }}" />
                <ul class="w-full grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5  rounded {{ $errors->has('amenities') ? 'border-pink-500 text-pink-600 focus:border-pink-500 focus:ring-pink-500' : '' }}" >
                    @foreach(App\Models\Amenity::all() as $amenity)
                        @if(old('amenity_'.$amenity->id) )
                            @if($amenity->id == old('amenity_'.$amenity->id))
                                <li> 
                                    <x-jet-checkbox  :value="$amenity->id" name="amenity_{{$amenity->id}}" checked/>
                                    <label for="" class="text-sm text-gray-600">{{$amenity->name}}</label>
                                </li>
                            @else 
                                <li> 
                                    <x-jet-checkbox  :value="$amenity->id" name="amenity_{{$amenity->id}}"/>
                                    <label for="" class="text-sm text-gray-600">{{$amenity->name}}</label>
                                </li>
                            @endif
                        @else 
                            @if(isset($car) && $car->amenities->count())
                                @if($car->amenities()->where('amenity_id', $amenity->id)->get()->first())
                                    <li> 
                                        <x-jet-checkbox  :value="$amenity->id" name="amenity_{{$amenity->id}}" checked/>
                                        <label for="" class="text-sm text-gray-600">{{$amenity->name}}</label>
                                    </li>
                                @else
                                    <li> 
                                        <x-jet-checkbox  :value="$amenity->id" name="amenity_{{$amenity->id}}"/>
                                        <label for="" class="text-sm text-gray-600">{{$amenity->name}}</label>
                                    </li>
                                @endif
                            @else 
                                <li> 
                                    <x-jet-checkbox  :value="$amenity->id" name="amenity_{{$amenity->id}}"/>
                                    <label for="" class="text-sm text-gray-600">{{$amenity->name}}</label>
                                </li>
                            @endif
                        @endif
                    @endforeach
                    
                </ul>
                <x-jet-input-error for="amenties" />
            </div>
        </div>
        
        <div class="grid">
            <div class="mt-4">
                <x-jet-label class="text-sm" for="price" value="{{ __('Price (NGN)') }}" />
                <x-jet-input id="price" class="block mt-1 w-full {{ $errors->has('price') ? 'border-pink-500 text-pink-600 focus:border-pink-500 focus:ring-pink-500' : '' }}" type="number" step="0.01" name="price" :value="old('price')? old('price') : ($car? $car->price: '')" required autocomplete="price" />
                <x-jet-input-error for="price"></x-jet-input-error>
            </div>
        </div>
        <div class="flex items-center justify-end mt-4"  x-data="{ open: false }">
            <x-jet-button class="ml-4" x-on:click="open = ! open"  @click.away="open = false">
                <div role="status"x-show="open">
                    <svg class="inline mr-2 w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-green-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>

                {{ $car? __('Update') : __('Create') }}
            </x-jet-button>
        </div>
      </form>
  <div>
</div>