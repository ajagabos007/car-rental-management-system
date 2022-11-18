<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <x-slot name="title">
       Car/{{$car->name}}/Rent
    </x-slot>   
    <x-slot name="subheader">
        Cars
    </x-slot>
    <x-slot name="subheader_links">
        <li class="fw-500">
            <a href="{{route('cars.index')}}" class="text-custom-white">Cars</a>
        </li>

        <li class="fw-500">
        <a href="{{route('cars.show',$car)}}" class="text-custom-white">{{$car->name}} </a>  
        </li>
        <li class="active fw-500">
            Book  
        </li>
    </x-slot>
    <section class="section-padding bg-light-white booking-form">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tabs">
                        <ul class="custom-flex nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#cars-booking">Car {{$car->name}} renting</a>
                            </li>
                        </ul>
                        <div class="tab-content bg-custom-white bx-wrapper padding-20">

                            <div class="tab-pane fade active show" id="cars-booking">
                                <div class="tab-inner">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h5 class="text-custom-black">Car Information</h5>
                                            <div class="row mb-md-80">
                                                <div class="col-lg-7">
                                                    <div class="image-sec animate-img mb-4">
                                                        <a href="#">
                                                            @if($car->image)
                                                                <img src="{{$car->image->url}}" class="full-width" style="height:240px;" alt="img">
                                                                @else
                                                                <img src="http://127.0.0.1:8000/auto_rental/assets/images/cars/1.jpg" class="full-width" alt="img">
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <hr>
                                                    <div class="title">
                                                        <h4 class="fs-16">
                                                            <i class="fas fa-car text-custom-blue"></i>
                                                            <a href="#" class="text-custom-black">  {{$car->name}} </a>
                                                            
                                                            <span class="price text-custom-blue mr-3">NGN {{$car->price}}</span> 
                                                        </h4>   
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="hotel-type mb-xl-20 bg-light-white">
                                                        <ul class="" style="padding:20px; list-style:None;">
                                                            <li class="text-light-dark mb-2">
                                                                <label class="no-margin text-custom-blue">
                                                                Car Type:
                                                                </label>{{$car->type? $car->type->name: __('Not stated')}}
                                                            </li>
                                                            <li class="text-light-dark mb-2">
                                                                <label class="no-margin text-custom-blue">
                                                                Rental Company:
                                                                </label>{{$car->rental_company}}
                                                            </li>
                                                            <li class="text-light-dark mb-2">
                                                                <label class="no-margin text-custom-blue">
                                                               Max. Passengers:
                                                                </label>{{$car->no_of_passenger}}
                                                            </li>
                                                            <li class="text-light-dark mb-2">
                                                                <label class="no-margin text-custom-blue">
                                                               Max. Baggage:
                                                                </label>{{$car->no_of_baggage}}
                                                            </li>
                                                           
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <table class="table table-borderless border-0 table-collapse">
                                                        <tr>
                                                            <th>Price:</th>
                                                            <td>NGN {{$car->price}}</td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>
                                            <h5 class="text-custom-black">Your Personal Information</h5>
                                            <form class="row mb-md-80" wire:submit.prevent="confirmBooking">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Full Name</label>
                                                    
                                                        @auth
                                                        <x-jet-input type="text" id="name" name="name" class="form-control form-control-custom {{ $errors->has('user.name') ? 'is-invalid' : '' }}" 
                                                            wire:model.lazy="user.name"  autocomplete="user.name" placeholder="Full Name" required  disabled/>
                                                        <x-jet-input-error for="user.name" />  
                                                        @endauth

                                                        @guest
                                                        <x-jet-input type="text" id="name" name="name" class="form-control form-control-custom {{ $errors->has('user.name') ? 'is-invalid' : '' }}" 
                                                            wire:model.lazy="user.name" autocomplete="user.name" placeholder="Full Name" required/>
                                                        <x-jet-input-error for="user.name" />  
                                                        @endguest

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Phone Number</label>
                                                        <x-jet-input type="tel" id="name" name="name" class="form-control form-control-custom {{ $errors->has('user.phone_number') ? 'is-invalid' : '' }}" 
                                                            wire:model.lazy="user.phone_number" autocomplete="user.phone_number" placeholder="Phone Number" required/>
                                                        <x-jet-input-error for="user.phone_number" /> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Email</label>
                                                        @auth
                                                        <x-jet-input type="text" id="email" name="email" class="form-control form-control-custom {{ $errors->has('user.email') ? 'is-invalid' : '' }}" 
                                                            wire:model.lazy="user.email" autocomplete="user.email" placeholder="Full Name" required disabled/>
                                                        <x-jet-input-error for="user.email" /> 
                                                        @endauth

                                                        @guest
                                                        <x-jet-input type="text" id="email" name="email" class="form-control form-control-custom {{ $errors->has('user.email') ? 'is-invalid' : '' }}" 
                                                            wire:model.lazy="user.email" autocomplete="user.email" placeholder="Full Name" required/>
                                                        <x-jet-input-error for="user.email" /> 
                                                        @endguest
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label class="custom-checkbox mb-0">
                                                        <input type="checkbox" name="#">
                                                        <span class="checkmark"></span>
                                                        I want to receive <a href="#">Company name</a> promotional offers in the future
                                                    </label>
                                                </div>
                                                <div class="col-12">
                                                    <hr>
                                                </div>

                                                <!-- Hide Your Card Information -->
                                                @if(0)
                                                    <div class="col-12">
                                                        <h5 class="text-custom-black">Your Card Information</h5>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="fs-14 text-custom-black fw-500">Card Type</label>
                                                            <div class="group-form">
                                                                <select class="custom-select form-control form-control-custom">
                                                                    <option>Select Card</option>
                                                                    <option>Visa</option>
                                                                    <option>Master Card</option>
                                                                    <option>Credit Card</option>
                                                                    <option>Americal Express</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="fs-14 text-custom-black fw-500">Card Holder Name</label>
                                                            <input type="text" name="#" class="form-control form-control-custom" placeholder="Card Holder Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="fs-14 text-custom-black fw-500">Card Number</label>
                                                            <input type="text" name="#" class="form-control form-control-custom" placeholder="Card Number" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="fs-14 text-custom-black fw-500">Card Identification Number</label>
                                                            <input type="text" name="#" class="form-control form-control-custom" placeholder="Card Identification Number" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="fs-14 text-custom-black fw-500">Expiration Month</label>
                                                                    <div class="group-form">
                                                                        <select class="custom-select form-control form-control-custom">
                                                                            <option>Month</option>
                                                                            <option>Jan</option>
                                                                            <option>Feb</option>
                                                                            <option>Mar</option>
                                                                            <option>Apr</option>
                                                                            <option>May</option>
                                                                            <option>June</option>
                                                                            <option>July</option>
                                                                            <option>Aug</option>
                                                                            <option>Sep</option>
                                                                            <option>Oct</option>
                                                                            <option>Nov</option>
                                                                            <option>Dec</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="fs-14 text-custom-black fw-500">Expiration Year</label>
                                                                    <div class="group-form">
                                                                        <select class="custom-select form-control form-control-custom">
                                                                            <option>2020</option>
                                                                            <option>2021</option>
                                                                            <option>2022</option>
                                                                            <option>2023</option>
                                                                            <option>2024</option>
                                                                            <option>2025</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="fs-14 text-custom-black fw-500">Billing Zip Code</label>
                                                            <input type="text" name="#" class="form-control form-control-custom" placeholder="Billing Zip Code" required>
                                                        </div>
                                                    </div>
                                                @endif
                                                <!-- End of Hide Your card Information  -->
                                                <div class="col-12">
                                                    <!-- <hr class="mt-0"> -->
                                                    <!-- <div class="form-group">
                                                        <label class="custom-checkbox">
                                                            <input type="checkbox" name="#">
                                                            <span class="checkmark"></span>
                                                            By continuing, you agree to the<a href="#">Terms and Conditions.</a>
                                                        </label>
                                                    </div> -->
                                                    <button type="submit" class="btn-first btn-submit">
                                                        <div wire:loading wire:target="confirmBooking" class="spinner-border spinner-border-sm" role="status"></div>
                                                        Confirm Rental
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <livewire:need-help/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
