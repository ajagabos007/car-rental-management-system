<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <x-slot name="title">
        Services
    </x-slot>   
    <x-slot name="subheader">
        Services
    </x-slot>
    <x-slot name="subheader_links">
        <li class="active fw-500">
            Services
        </li>
    </x-slot>

    <section class="section-padding our-services-sec bg-light-white">
        <div class="container">
            <div class="section-header">
                <div class="section-heading">
                    <h3 class="text-custom-black">Our Services</h3>
                    <div class="section-description">
                        <p class="text-light-dark">At <span class="text-custom-blue"> {{env('APP_NAME')}}</span>, we have varieties of offers you can choose from. We are here to serve you and to make things easy for you with the most amazing and stress -free experience. 
                        </p>
                    </div>
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
    
</div>

