<x-app-layout>
    <div class="slider p-relative">
        <div class="main-banner arrow-layout-1 ">
            <div class="slide-item">
                <img src="{{asset('auto_rental/assets/images/car-1.jpg')}}" class="image-fit" alt="Slider">
                <div class="transform-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="slider-content">
                                    <h1 class="text-custom-white">Best <span class="text-custom-blue">Car</span> renting platform with 10% discount on every rent</h1>
                                    <ul class="custom">
                                        <li class="text-custom-white">
                                            <i class="fas fa-dollar-sign"></i>
                                            Best Price Guaranteed
                                        </li>
                                        <li class="text-custom-white">
                                            <i class="fas fa-car"></i>
                                            Affordable Car Rental
                                        </li>
                                        <li class="text-custom-white">
                                            <i class="fas fa-laptop"></i>
                                            Easy application
                                        </li>
                                        <li class="text-custom-white">
                                            <i class="fas fa-headphones-alt"></i>
                                            24/7 Customer Care
                                        </li>
                                    </ul>
                                    <a href="{{route('cars.index')}}" class="btn-first btn-small">Find Out More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item">
                <img src="{{asset('auto_rental/assets/images/car-10.jpg')}}" class="image-fit" alt="Slider">
                <div class="transform-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="slider-content">
                                    <h1 class="text-custom-white">Upto 25% off on first <span class="text-custom-blue">Car</span> rent through our app!</h1>
                                    <ul class="custom">
                                        <li class="text-custom-white">
                                            <i class="fas fa-dollar-sign"></i>
                                            Best Price Guaranteed
                                        </li>
                                        <li class="text-custom-white">
                                            <i class="fas fa-car"></i>
                                            Affordable Car Rental
                                        </li>
                                        <li class="text-custom-white">
                                            <i class="fas fa-laptop"></i>
                                            Easy application
                                        </li>
                                        <li class="text-custom-white">
                                            <i class="fas fa-headphones-alt"></i>
                                            24/7 Customer Care
                                        </li>
                                    </ul>
                                    <a href="{{route('cars.index')}}" class="btn-first btn-small">Find Out More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item">
                <img src="{{asset('auto_rental/assets/images/car-9.jpg')}}" class="image-fit" alt="Slider">
                <div class="transform-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="slider-content">
                                    <h1 class="text-custom-white">A 30% off on fleet of <span class="text-custom-blue">Cars</span> renting offer for you!</h1>
                                    <ul class="custom">
                                        <li class="text-custom-white">
                                            <i class="fas fa-dollar-sign"></i>
                                            Best Price Guaranteed
                                        </li>
                                        <li class="text-custom-white">
                                            <i class="fas fa-car"></i>
                                            Affordable Car Rental
                                        </li>
                                        <li class="text-custom-white">
                                            <i class="fas fa-laptop"></i>
                                            Easy application
                                        </li>
                                        <li class="text-custom-white">
                                            <i class="fas fa-headphones-alt"></i>
                                            24/7 Customer Care
                                        </li>
                                    </ul>
                                    <a href="{{route('cars.index')}}" class="btn-first btn-small">Find Out More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-tabs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tabs">
                        <ul class="custom-flex nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#cars">{{env('APP_NAME')}} CAR SERVICES</a>
                            </li>
                        </ul>
                        <div class="tab-content bg-custom-white bx-wrapper padding-20">
                            <div class="tab-pane active" id="cars">
                                <div class="tab-inner">
                                    <!-- <form>
                                        <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label class="fs-14 text-custom-black fw-500">Pick Up</label>
                                                <input type="text" name="#" class="form-control form-control-custom" placeholder="city, distirct or specific airpot">
                                            </div>
                                            <div class="form-group">
                                                <label class="fs-14 text-custom-black fw-500">Drop Off</label>
                                                <input type="text" name="#" class="form-control form-control-custom" placeholder="city, distirct or specific airpot">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Pick Up Date/Time</label>
                                                        <div class="input-group group-form">
                                                            <input type="text" name="#" class="form-control form-control-custom datepickr" placeholder="mm/dd/yy" readonly>
                                                            <span class="input-group-append">
                                                                <i class="far fa-calendar"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="submit"></label>
                                                        <div class="group-form">
                                                            <select class="custom-select form-control form-control-custom">
                                                                <option>Anytime</option>
                                                                <option>Morning</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Drop Off Date/Time</label>
                                                        <div class="input-group group-form">
                                                            <input type="text" name="#" class="form-control form-control-custom datepickr" placeholder="mm/dd/yy" readonly>
                                                            <span class="input-group-append">
                                                                <i class="far fa-calendar"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="submit"></label>
                                                        <div class="group-form">
                                                            <select class="custom-select form-control form-control-custom">
                                                                <option>Anytime</option>
                                                                <option>Morning</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Adults</label>
                                                        <div class="group-form">
                                                            <select class="custom-select form-control form-control-custom">
                                                                <option>01</option>
                                                                <option>02</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Kids</label>
                                                        <div class="group-form">
                                                            <select class="custom-select form-control form-control-custom">
                                                                <option>01</option>
                                                                <option>02</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Promocode</label>
                                                        <input type="text" name="#" class="form-control form-control-custom" placeholder="type here">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Car Type</label>
                                                        <div class="group-form">
                                                            <select class="custom-select form-control form-control-custom">
                                                                <option>Economy</option>
                                                                <option>Compact</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="submit"></label>
                                                        <button class="btn-first btn-submit full-width btn-height">Search</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form> -->
                                    <h5 class="text-custom-blue fw-500">Car Rental, Travel and Tours</h5>
                                    <h6>Enjoy the best Car rental services with {{config('app.name')}}</h6>
                                    <p>Chat with our agent for your favourite car renting</p>
                                    <livewire:chat.whats-app-chat />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- Recommended Cars Section -->
     <section class="section-padding car-booking">
        <div class="container">
            <div class="section-header">
                <div class="section-heading">
                    <h3 class="text-custom-black">Recommended Cars for you</h3>
                    <div class="section-description">
                        <p class="text-light-dark">The affordable classic cars suitable for your travels and tour </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="hotel-slider arrow-layout-2 row">
                    @forelse($recommendedCars as $recommendedCar)
                        <div class="slide-item col-12">
                            <div class="hotel-grid">
                                <div class="hotel-grid-wrapper car-grid bx-wrapper">
                                    <div class="image-sec animate-img">
                                        <a href="{{route('cars.show', $recommendedCar)}}">
                                            <img src="{{$recommendedCar->image->url}}" class="full-width" alt="img">
                                        </a>
                                    </div>
                                    <div class="hotel-grid-caption padding-20 bg-custom-white p-relative">
                                        <h4 class="title fs-16"><a href="{{route('cars.show', $recommendedCar)}}" class="text-custom-black">{{$recommendedCar->type? $recommendedCar->type->name : '' }}<small class="text-light-dark">Per day</small></a></h4>
                                        <span class="price"><small>From</small>NGN {{$recommendedCar->price}}</span>
                                        <div class="action">
                                            <a class="btn-second btn-small" href="{{route('cars.show', $recommendedCar)}}">View</a>
                                            <a class="btn-first btn-submit yellow" href="{{route('cars.book', $recommendedCar)}}">Rent</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="slide-item col-12">
                            <h1 class="text-custom-black">Recommended cars for you Comming soon...!</h1>
                            <h3 class="text-custom-blue">{{config('app.name')}}</h3>
                        </div>
                            
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Recommended Cars Section  End-->
    <!--  All cars  section -->
        <section class="section-padding bg-light-white">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="listing-top-heading mb-xl-20">
                            <h6 class="no-margin text-custom-black">Showing {{$cars->count()}} / {{$cars->total()}} Results</h6>
                            <div class="sort-by">
                                <span class="text-custom-black fs-14 fw-600">Sort by</span>
                                <div class="group-form">
                                    <select class="form-control form-control-custom custom-select" style="display: none;">
                                        <option>A to Z</option>
                                        <option>Z to A</option>
                                    </select>
                                    <div class="nice-select form-control form-control-custom custom-select" tabindex="0"><span class="current">A to Z</span><ul class="list"><li data-value="A to Z" class="option selected">A to Z</li><li data-value="Z to A" class="option">Z to A</li></ul></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($cars as $car)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="hotel-grid mb-xl-30">
                                <div class="hotel-grid-wrapper car-grid bx-wrapper">
                                    <div class="image-sec animate-img">
                                        <a href="{{route('cars.show', $car)}}">
                                            <img src="{{$car->image->url}}" class="full-width" alt="img">
                                        </a>
                                    </div>
                                    <div class="hotel-grid-caption padding-20 bg-custom-white p-relative">
                                        <h4 class="title fs-16"><a href="{{route('cars.show', $car)}}" class="text-custom-black">{{$car->type->name}}<small class="text-light-dark">Per Day</small></a></h4>
                                        <span class="price"><small>From</small>NGN {{$car->price}}</span>
                                        <div class="action">
                                            <a class="btn-second btn-small" href="{{route('cars.show', $car)}}">View</a>
                                            <a class="btn-first btn-submit" href="{{route('cars.book', $car)}}">Rent</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if($cars->hasPages())
                    <div class="row">
                        <div class="col-12">
                            <nav class="">
                                <ul class="pagination justify-content-center">
                                    @if(!$cars->onFirstPage())
                                    <li class="page-item">
                                        <a class="page-link" href="{{$cars->previousPageUrl()}}">Previous</a>
                                    </li>
                                    @endif
                                    @for($i=$cars->currentPage()-2; $i <= $cars->currentPage()+2; $i++)
                                    @if($i >= 1 && $i <=ceil($cars->total()/ $cars->perPage()))
                                            <li class="page-item {{$i==$cars->currentPage()? 'active':'' }}">
                                                <a class="page-link" href="{{$cars->url($i)}}">{{$i}}</a>
                                            </li>
                                        @endif
                                    @endfor
                        
                                    @if($cars->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{$cars->nextPageUrl()}}">Next</a>
                                    </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                @endif
                <!-- <div class="row">
                    <div class="col-12">
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div> -->
            </div>
        </section>
    <!--  All cars  section End -->


    <!-- Our Work Section -->
        <section class="section-padding our-work-sec">
            <div class="container">
                <div class="section-header">
                    <div class="section-heading">
                        <h3 class="text-custom-black">Our Work</h3>
                        <div class="section-description">
                            <p class="text-light-dark">Our  work is done only when you are satisfied with <span class="text-custom-blue">{{env('APP_NAME')}}</span></p>
                        </div>
                    </div>
                    <div class="section-btn mb-xl-20">
                        <a href="{{route('services.index')}}" class="btn-first btn-small">View All</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="work-sec animate-img first-box">
                            <a href="{{route('cars.index')}}">
                                <img src="{{asset('auto_rental/assets/images/car-5.jpg')}}" class="image-fit" alt="img">
                                <div class="text-wrapper">
                                    <h2 class="text-custom-white no-margin fw-600">Car rental</h2>
                                    <p class="text-custom-white no-margin">1150 Offers</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="work-sec animate-img">
                                    <a href="#">
                                        <img src="{{asset('auto_rental/assets/images/car-7.jpg')}}" class="image-fit" alt="img">
                                        <div class="text-wrapper">
                                            <h2 class="text-custom-white no-margin fw-600">Fleet</h2>
                                            <p class="text-custom-white no-margin">1100 Locations</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="work-sec animate-img">
                                    <a href="#">
                                        <img src="{{asset('auto_rental/assets/images/car-1.jpg')}}" class="image-fit" alt="img">
                                        <div class="text-wrapper">
                                            <h2 class="text-custom-white no-margin fw-600">Tours</h2>
                                            <p class="text-custom-white no-margin">1250 Locations</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="work-sec animate-img">
                                    <a href="#">
                                        <img src="{{asset('auto_rental/assets/images/car-11.jpg')}}" class="image-fit" alt="img">
                                        <div class="text-wrapper">
                                            <h2 class="text-custom-white no-margin fw-600">Cruises</h2>
                                            <p class="text-custom-white no-margin">1213 Cars</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Our Work Section End-->

    <!-- Our Services Section -->
        <section class="section-padding our-services-sec bg-light-white">
            <div class="container">
                <div class="section-header">
                    <div class="section-heading">
                        <h3 class="text-custom-black">Our Services</h3>
                        <div class="section-description">
                            <p class="text-light-dark">Get the most comfortable and unforgettable experiences with <span class="text-custom-blue">{{env('APP_NAME')}}</span>. </p>
                        </div>
                    </div>
                    <div class="section-btn mb-xl-20">
                        <a href="{{route('services.index')}}" class="btn-first btn-small">View All</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="service-box p-relative mb-xl-30">
                            <div class="service-wrapper bg-custom-white bx-wrapper">
                                <div class="service-img animate-img">
                                    <a href="#">
                                        <img src="{{asset('auto_rental/assets/images/car-4.webp')}}" class="image-fit" alt="img">
                                    </a>
                                </div>
                                <div class="service-text padding-15">
                                    <h5><a href="{{route('cars.index')}}" class="text-custom-black">Car Renting</a></h5>
                                    <p class="text-light-dark">We handle both your car renting. So luxurious accommodations and hitch-free cars are things you can be assured to attain.</p>
                                    <a href="#" class="btn-second btn-small">See All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="service-box p-relative mb-xl-30">
                            <div class="service-wrapper bg-custom-white bx-wrapper">
                                <div class="service-img animate-img">
                                    <a href="#">
                                        <img src="{{asset('auto_rental/assets/images/car-12.png')}}" class="image-fit" alt="img">
                                    </a>
                                </div>
                                <div class="service-text padding-15">
                                    <h5><a href="#" class="text-custom-black">Car Repairs</a></h5>
                                    <p class="text-light-dark"><span class="text-custom-blue">{{env('APP_NAME')}}</span> mechanics that go and service your vehicle either at their home or office.</p>
                                    <a href="#" class="btn-second btn-small">See All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Our Services Section End-->

   

</x-app-layout>