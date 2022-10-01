<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <x-slot name="title">
       Booking {{$booking->code}} checkout
    </x-slot>   
    <x-slot name="subheader">
        Bookings
    </x-slot>
    <x-slot name="subheader_links">
        <li class="fw-500">
            <a href="{{route('bookings.index')}}" class="text-custom-white">Bookings</a>
        </li>

        <li class="fw-500">
            <a href="{{route('bookings.show', $booking)}}" class="text-custom-white">{{$booking->code}}</a> 
        </li>

        <li class="active fw-500">
            Checkout 
        </li>
    </x-slot>
    
    <section class="section-padding bg-light-white booking-form">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tabs">
                        <ul class="custom-flex nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#flights-booking">Booking <code class="border-bottom border-white">{{$booking->code}}</code> checkout</a>
                            </li>
                        </ul>
                        <div class="tab-content bg-custom-white bx-wrapper padding-20">

                            <div class="tab-pane fade active show" id="flights-booking">
                                <div class="tab-inner">
                                    <div class="row">
                                        <div class="col-lg-8">
                                        <h5 class="text-custom-black">Beneficial Information</h5>
                                            <form class="row mb-md-80" wire:submit.prevent="confirmBooking">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Full Name</label>
                                                        <input disabled="" class="form-control form-control form-control-custom" type="text" id="name" name="name" wire:model.lazy="user.name" autocomplete="user.name" placeholder="Full Name" required="required">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Phone Number</label>
                                                        <input class="form-control form-control form-control-custom" type="tel" id="name" name="name" wire:model.lazy="user.phone_number" autocomplete="user.phone_number" placeholder="Phone Number" required="required">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Email</label>
                                                        <input disabled="" class="form-control form-control form-control-custom" type="text" id="email" name="email" wire:model.lazy="user.email" autocomplete="user.email" placeholder="Full Name" required="required">
                                                    </div>
                                                </div>
                                               
                                                <div class="col-12">
                                                    <hr>
                                                </div>

                                                <!-- Hide Your Card Information -->
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
                                                    
                                                </div>
                                            </form>

                                            <h5 class="text-custom-black">Booking Information</h5>
                                            <div class="row mb-md-80">
                                                <div class="col-lg-12">
                                                    <div class="hotel-type mb-xl-20 bg-light-white">
                                                        <table class="table table-borderless border-0 table-collapse">
                                                            <tbody>
                                                                <tr>
                                                                    <th>Booking Code:</th>
                                                                    <td class="text-custom-blue">{{$booking->code}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Booking Item:</th>
                                                                    <td class="text-custom-blue">Flight</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Booked:</th>
                                                                    <td class="text-custom-blue">{{$booking->created_at->diffForHumans()}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5 class="text-custom-black">Amount Information</h5>
                                            <div class="row mb-md-80 ">
                                                <div class="col-lg-12 ">
                                                    <table class="table table-borderless border-0 table-collapse mb-xl-20 bg-light-white">
                                                        <tbody>
                                                            <tr class="border text-custom-blue">

                                                                <th>Amount:</th>
                                                                <td>NGN {{$booking->total_price}}</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn-first btn-submit">
                                                <div wire:loading="" wire:target="confirmBooking" class="spinner-border spinner-border-sm" role="status"></div>
                                                Proceed To Pay
                                            </button>
                                            
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    
                                                    <div class="need-help bx-wrapper padding-20">
                                                        <h5 class="text-custom-black">Need Help?.</h5>
                                                        <p class="text-light-dark">We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                                                        <ul class="custom">
                                                            <li class="text-custom-blue fs-18">
                                                                <i class="fas fa-phone-alt"></i>
                                                                <a href="#" class="text-light-dark">(+347) 123 456 7890</a>
                                                            </li>
                                                            <li class="text-custom-blue fs-18">
                                                                <i class="fas fa-envelope"></i>
                                                                <a href="#" class="text-light-dark fs-14"><span class="__cf_email__" data-cfemail="cfa7aaa3bf8faba0a2aea6a1e1aca0a2">[email&nbsp;protected]</span></a>
                                                            </li>
                                                        </ul>
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
        </div>
    </section>
</div>
