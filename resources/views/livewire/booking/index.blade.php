<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-slot name="title">
       Rentings
    </x-slot>   
    <x-slot name="subheader">
        Rentings
    </x-slot>
    <x-slot name="subheader_links">
        <li class="active fw-500">
           Rentings  
        </li>
    </x-slot>
<section class="section-padding bg-light-white booking-form">
<div class="container">
<div class="row">
<div class="col-12">
<div class="tabs">
    <ul class="custom-flex nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{$tabs['car-bookings']? 'active':''}}" data-toggle="tab" href="#cars-booking">Cars Rents</a>
        </li>
    </ul>
    <div class="tab-content bg-custom-white bx-wrapper padding-20">
    
        <!-- Cars Renting List  -->
        <div class="tab-pane fade {{$tabs['car-bookings']? 'active show':''}}" id="cars-booking">
            <div class="tab-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-dark">
                                <caption class="fs-6 text-custom-blue">List of Cars Rents</caption>
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-nowrap">#</th>
                                        <th scope="col" class="text-nowrap">Renting Code</th>
                                        <th scope="col" class="text-nowrap">Car Name</th>
                                        <th scope="col" class="text-nowrap">Type</th>
                                        <th scope="col" class="text-nowrap">Rented on</th>
                                        <th scope="col" class="text-nowrap">Price</th>
                                        <th scope="col" class="text-nowrap">Payment</th>
                                        <th scope="col" class="text-nowrap">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($car_bookings as $car_booking)
                                        <tr>
                                            <th scope="row">{{$loop->index + 1}}</th>
                                            <td class="text-nowrap">
                                                <a href="{{route('bookings.show', $car_booking)}}">{{$car_booking->code}}</a>
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="{{route('cars.show', $car_booking->bookable)}}">{{$car_booking->bookable->name}}</a>
                                            </td> 
                                            <td class="text-nowrap">
                                                <a href="{{route('car-types.show', $car_booking->bookable->type)}}">{{$car_booking->bookable->type->name}}</a>
                                            </td>
                                            <td class="text-nowrap">
                                            {{$car_booking->created_at->diffForHumans()}}
                                            </td>
                                            <td class="text-nowrap">
                                            NGN {{$car_booking->price}}
                                            </td>
                                            <td class="text-nowrap">
                                                @if($car_booking->payment and $car_booking->payment->status != 'successful')
                                                    <livewire:payment.flutterwave-checkout :payment="$car_booking->payment" />
                                                    @else
                                                    <span class="bg-custom-blue p-2">
                                                        {{$car_booking->payment->status}}
                                                    </span> 
                                                @endif
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="action">
                                                    @if($car_booking->payment and $car_booking->payment->status != 'successful')
                                                        <button type="button" class="btn btn-danger text-white text-uppercase btn-xs rounded-pill text-custom-black" wire:click="delete({{$car_booking->id}}, 'flight-bookings')" wire:loading.attr="disabled">
                                                        <div wire:loading wire:target="delete({{$car_booking->id}})" class="spinner-border spinner-border-sm" role="status"></div>
                                                                    Delete
                                                        </button>
                                                        @else
                                                        <a href="{{route('bookings.show', $car_booking)}}" class="btn-second btn-submit bg-primary">View</a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Cars Renting List  -->
    </div>
</div>
</div>
</div>
</div>
</div>
</section>

</div>
