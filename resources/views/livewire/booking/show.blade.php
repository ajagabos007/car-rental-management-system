<div>
    {{-- The Master doesn't talk, he acts. --}}
    <x-slot name="title">
       Renting {{$booking->code}}
    </x-slot>   
    <x-slot name="subheader">
        Rentings
    </x-slot>
    <x-slot name="subheader_links">
        <li class="fw-500">
            <a href="{{route('bookings.index')}}" class="text-custom-white">Rentings</a>
        </li>

        <li class="active fw-500">
            {{$booking->code}}  
        </li>
    </x-slot>
    <section class="section-padding bg-light-white booking-form">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tabs">
                        <ul class="custom-flex nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#flights-booking">Renting <code class="border-bottom border-white">{{$booking->code}}</code></a>
                            </li>
                            @if(!$booking->payment->exists() or $booking->payment->status != 'successful')
                                <li class="nav-item my-2">
                                    <livewire:chat.whats-app-chat />
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('payments.show', $booking->payment)}}">
                                        Paid
                                        <i class="fas fa-check"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                        <div class="tab-content bg-custom-white bx-wrapper padding-20">
                            <div class="tab-pane fade active show" id="flights-booking">
                                <div class="tab-inner">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h5 class="text-custom-black">Beneficial Information</h5>
                                            <div class="form">
                                                <div class="row mb-md-10">
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
                                                        <hr class="mt-0">
                                                        <div class="form-group">
                                                            <label class="custom-checkbox">
                                                                <input type="checkbox" name="#">
                                                                <span class="checkmark"></span>
                                                                By continuing, you agree to the<a href="#">Terms and Conditions.</a>
                                                            </label>
                                                        </div>
                                                        
                                                    </div>
                                                </div>

                                                <h5 class="text-custom-black">Rent Information</h5>
                                                <div class="row mb-md-10">
                                                    <div class="col-lg-12">
                                                        <div class="hotel-type mb-xl-20 bg-light-white">
                                                            <table class="table table-borderless border-0 table-collapse">
                                                                <tbody>
                                                                    <tr>
                                                                        <th>Rent Code:</th>
                                                                        <td class="text-custom-blue" > <a href="{{route('bookings.show', $booking)}}">{{$booking->code}}</a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Rent Item:</th>
                                                                        <td class="text-custom-blue">

                                                                            <a href="{{$booking->bookable_url}}">
                                                                                @if($booking->bookable_type == App\Models\Flight::class)
                                                                                    {{$booking->bookable->number}}
                                                                                @else
                                                                                    {{$booking->bookable->name}}
                                                                                @endif
                                                                            </a>
                                                                        </td>
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
                                                <div class="row mb-md-10 ">
                                                    <div class="col-lg-12 ">
                                                        <table class="table table-borderless border-0 table-collapse mb-xl-20 bg-light-white">
                                                            <tbody>
                                                                <tr class="border text-custom-blue">

                                                                    <th>Amount:</th>
                                                                    <td>₦ {{$booking->amount}}</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                @if(!$booking->payment->exists() or $booking->payment->status != 'successful')
                                                    <livewire:payment.flutterwave-checkout :payment="$booking->payment" />
                                                @endif
                                            </div>
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
