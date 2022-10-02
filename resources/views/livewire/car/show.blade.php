<div>
    {{-- Stop trying to control. --}}
    <x-slot name="title">
        Cars
    </x-slot>   
    <x-slot name="subheader">
        Cars
    </x-slot>
    <x-slot name="subheader_links">
        <li class="fw-500">
            <a href="{{route('cars.index')}}" class="text-custom-white">Cars</a>
        </li>
        <li class="active fw-500">
            {{$car->name}}
        </li>
    </x-slot>

    <section class="section-padding bg-light-white listing-details">
<div class="container">
<div class="row">
<div class="col-12">
<div class="listing-details-inner bx-wrapper bg-custom-white padding-20">
<div class="row">
<div class="col-lg-8">
    <div class="detail-slider-for mb-xl-20 magnific-gallery">
        <div class="slide-item">
            <a href="{{$car->image? Storage::url($car->image->url) : asset('kangyang/assets/images/cars/car_big.png')}}" class="popup">
                <img src="{{$car->image? Storage::url($car->image->url): asset('kangyang/assets/images/cars/car_big.png')}}" class="image-fit" alt="img">
            </a>
        </div>
    </div>
    <div class="title">
        <h4 class="fs-16">
            <i class="fas fa-car text-custom-blue"></i>
            <a href="#" class="text-custom-black">  {{$car->name}} </a>
            <span class="price text-custom-blue mr-3">NGN {{$car->price}}</span> 
        </h4>   
    </div>
    <a href="{{route('cars.book', $car)}}" class="btn-first btn-submit full-width btn-height">Rent Now</a>
    <hr>
<div class="listing-meta-sec mb-md-80">
<div class="tabs">
<ul class="custom-flex nav nav-tabs mb-xl-20">
<li class="nav-item">
<a class="nav-link active" data-toggle="tab" href="#overview">Overview</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#amenities">Amenities</a>
</li>
</ul>
<div class="tab-content">
<div class="tab-pane fade active show" id="overview">
<div class="tab-inner">
<div class="row">
<div class="col-md-5">
    <div class="hotel-type mb-xl-20 bg-light-white padding-10">
        <ul class="custom">
            <li class="text-light-dark"><label class="no-margin text-custom-blue">Rental Company:</label>{{$car->rental_company}}</li>
            <li class="text-light-dark"><label class="no-margin text-custom-blue">Car Type</label>{{$car->type->name}}</li>
            <li class="text-light-dark"><label class="no-margin text-custom-blue">Car Name</label>{{$car->name}}</li>
            <li class="text-light-dark"><label class="no-margin text-custom-blue">Passenger</label>{{$car->no_of_passenger}}</li>
            <li class="text-light-dark"><label class="no-margin text-custom-blue">Baggage</label> {{$car->no_of_baggage}}</li>
            <li class="text-light-dark"><label class="no-margin text-custom-blue">Car Features</label>Available</li>
            <li class="text-light-dark"><label class="no-margin text-custom-blue">Total Price</label>NGN {{$car->price}}</li>
        </ul>
    </div>
</div>
<div class="col-md-7">
<div class="listing-testimonial padding-20 bg-light-white mb-xl-20">
<div class="testimonial-inner detail-testimonial">
<div class="tesimonial-item">
<cite class="text-custom-blue fs-16">Always enjoyed my ride {{$car->name}} 
    , top class  service, smooth ride and car have great amenities and luxury assessories.</cite>
<div class="testimonial-author">
<div class="author-img">
<img src="{{asset('auto_rental/assets/images/blog/comment_1.jpg')}}" class="rounded-circle" alt="img">
</div>
<div class="author-name ml-2">
<h6 class="text-custom-black no-margin fs-14 fw-500">Jhon</h6>
<p class="no-margin text-light-dark">Passenger</p>
</div>
</div>
</div>
<div class="tesimonial-item">
<cite class="text-custom-blue fs-16">Always enjoyed my ride with {{$car->name}} , a top class  service, smooth ride and car have great amenities and luxury assessories.</cite>
<div class="testimonial-author">
<div class="author-img">
<img src="{{asset('auto_rental/assets/images/blog/comment_2.jpg')}}" class="rounded-circle" alt="img">
</div>
<div class="author-name ml-2">
<h6 class="text-custom-black no-margin fs-14 fw-500">Jhon</h6>
<p class="no-margin text-light-dark">Passenger</p>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-12">
<div class="information">
<h4 class="text-custom-black">Car Rental Information</h4>
<p class="text-light-dark">{{$car->rental_information}}</p>
</div>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="amenities">
    <h4 class="text-custom-black">Amenities</h4>
    <p class="text-light-dark">The exquisite amenities in  {{$car->name}}</p>
    <ul class="custom amenities row no-gutters mb-xl-20">
        @foreach($car->amenities as $amenity)
            <li class="col-sm-6">
                <div class="icon-box text-light-dark">
                    <i class="fab fa-youtube"></i>
                    {{$amenity->name}}
                </div>
            </li>
        @endforeach
    </ul>
    @if(0)
    <h4 class="text-custom-black">Travel Info</h4>
    <p class="text-light-dark">Maecenas vitae turpis condimentum metus tincidunt semper bibendum ut orci. Donec eget accumsan est. Duis laoreet sagittis elit et vehicula. Cras viverra posuere condimentum.</p>
    <div class="travel-info bg-light-white">
        <div class="row no-gutters">
            <div class="col-sm-6">
                <div class="head padding-20">
                    <h5 class="text-custom-black fs-14 fw-500 no-margin">Pick-up location details</h5>
                    <span class="text-light-dark fs-12">Phone: (+247) 123 456 7890</span>
                </div>
                <div class="travel-info-body padding-20">
                    <div class="date-wrapper mb-xl-20">
                        <div class="icon text-custom-blue fs-20">
                            <i class="far fa-clock"></i>
                        </div>
                        <div class="text">
                            <p class="text-custom-black no-margin">Pickup Time</p>
                            <span class="text-light-dark fs-12">THU, NOV 14, 2019 | 11:00 AM</span>
                        </div>
                    </div>
                    <div class="date-wrapper">
                        <div class="icon text-custom-blue fs-20">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="text">
                            <p class="text-custom-black no-margin">Location</p>
                            <span class="text-light-dark fs-12">London City, Airport</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="head padding-20">
                    <h5 class="text-custom-black fs-14 fw-500 no-margin">Drop-off location details</h5>
                    <span class="text-light-dark fs-12">Phone: (+247) 123 456 7890</span>
                </div>
                <div class="travel-info-body padding-20">
                    <div class="date-wrapper mb-xl-20">
                        <div class="icon text-custom-blue fs-20">
                            <i class="far fa-clock"></i>
                        </div>
                        <div class="text">
                            <p class="text-custom-black no-margin">Drop Off Time</p>
                            <span class="text-light-dark fs-12">FRI, NOV 15, 2019 | 11:00 AM</span>
                        </div>
                    </div>
                    <div class="date-wrapper">
                        <div class="icon text-custom-blue fs-20">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="text">
                            <p class="text-custom-black no-margin">Location</p>
                            <span class="text-light-dark fs-12">Paris Orly, Airport</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="row">
<div class="col-12">
<div class="quick-quote bx-wrapper padding-20 mb-xl-30">
<h5 class="text-custom-black">Enquiry Now</h5>
<form>
<div class="row">
<div class="col-12">
<div class="form-group">
<label class="fs-14 text-custom-black fw-500">Pick Up</label>
<input type="text" name="#" class="form-control form-control-custom" placeholder="city, distirct or specific airpot">
</div>
<div class="form-group">
<label class="fs-14 text-custom-black fw-500">Pick Up Date/Time</label>
<div class="input-group group-form">
<input type="text" name="#" class="form-control form-control-custom datepickr" placeholder="mm/dd/yy" readonly="">
<span class="input-group-append">
<i class="far fa-calendar"></i>
</span>
</div>
</div>
<div class="form-group">
<label class="fs-14 text-custom-black fw-500">Drop Off</label>
<input type="text" name="#" class="form-control form-control-custom" placeholder="city, distirct or specific airpot">
</div>
<div class="form-group">
<label class="fs-14 text-custom-black fw-500">Drop Off Date/Time</label>
<div class="input-group group-form">
<input type="text" name="#" class="form-control form-control-custom datepickr" placeholder="mm/dd/yy" readonly="">
<span class="input-group-append">
<i class="far fa-calendar"></i>
</span>
</div>
</div>
    <div class="form-group">
        <label class="fs-14 text-custom-black fw-500">Car Type</label>
        <div class="group-form">
            <select class="custom-select form-control form-control-custom">
                <option>Economy</option>
                <option>Compact</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn-first btn-submit full-width btn-height">Submit</button>
</div>
</div>
</form>
</div>
<div class="hotel-grid mb-xl-30">
<div class="hotel-grid-wrapper bx-wrapper">
<div class="image-sec animate-img">
<a href="#">
    <img src="{{asset('auto_rental/assets/images/cars/1.png')}}" class="full-width" alt="img">
</a>
</div>
<div class="hotel-grid-caption padding-20 bg-custom-white p-relative">
<h4 class="title fs-16"><a href="#" class="text-custom-black">Economy<small class="text-light-dark">Per Day</small></a></h4>
<span class="price"><small>From</small>$58</span>
<div class="action">
 <a class="btn-second btn-small" href="#">View</a>
<a class="btn-first btn-submit" href="#">Renting</a>
</div>
</div>
</div>
</div>
    <livewire:need-help/>
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
