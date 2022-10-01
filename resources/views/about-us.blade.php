<x-app-layout>
    <x-slot name="title">
        About Us
    </x-slot>
    <x-slot name="subheader">
        About Us
    </x-slot>
    <x-slot name="subheader_links">
        <li class="active fw-500">
            About Us
        </li>
    </x-slot>
     
<section class="section-padding partners">
    <div class="container">
        <div class="section-header">
            <div class="section-heading">
                <h3 class="text-custom-black">About Us</h3>
                <div class="section-description">
                    <p class="text-light-dark">{{env('APP_NAME')}}</p>
                </div>
            </div>
        </div>
        <div class="section-content">
            <p> <strong class="h4 text-capitalize text-custom-blue" >{{env('APP_NAME')}} </strong> is a Nigerian based company that provides a variety of car rental services. Our main priority is to give you the most comfortable and affordable car mobility to any part of the globe.</p>

            <p>We provide classics cars with suitable amenities for rents at affordable price</p>

            <p>Other services we offer include car repairs, engine oiling, car tours to placies of your fantasy.<p>

            <p>You can be rest assured that you will be treated with the warmest reception by our hospitable and carefully selected staff.</p>

            <p>We have made our payment modes convenient for clients and that is why <span class="text-bold text-custom-blue" >{{env('APP_NAME')}}</span> also accepts payment In crypto currencies. Payment links and invoices will be generated and shared as requested by clients.</p>
        </div>
    </div>
</section>

</x-app-layout>