<x-app-layout>
    <x-slot name="title">
        Contact Us
    </x-slot>
    <x-slot name="subheader">
        Contact Us
    </x-slot>
    <x-slot name="subheader_links">
        <li class="active fw-500">
            Contact Us
        </li>
    </x-slot>
<section class="section-padding bg-light-white contact-top">
<div class="container">
<div class="row">
    <div class="col-lg-4 col-sm-6">
        <div class="contact-info-box mb-md-40">
            <i class="flaticon-placeholder"></i>
            <h6 class="text-theme fw-600">No. 18,<br> Ahamdu Bello Way, Jos, Nig.</h6>
        </div>
    </div>

    <div class="col-lg-4 col-sm-6">
        <div class="contact-info-box mb-md-40">
            <i class="flaticon-telephone-1"></i>
            <h6 class="text-theme fw-600">
            <a href=""></a>
            <a href="tel:+2347060426163" class="text-theme">(+234) XXX XXXX XX</a>
            <br> Mon-Sat 9:00am-5:00pm</h6>
        </div>
    </div>
<div class="col-lg-4 col-sm-6">
<div class="contact-info-box">
    <i class="flaticon-envelope"></i>
    <h6 class="text-theme fw-600">
        <a href="mailto: {{env('MAIL_FROM_ADDRESS')}}" class="text-theme">
        <span class="__cf_email__"> {{env('MAIL_FROM_ADDRESS')}} </span>
        </a>
        <!-- <a href="#" class="text-theme"><span class="__cf_email__" data-cfemail="523b3c343d12363d3f333b3c7c313d3f">[email&#160;protected]</span></a> -->
        <br> 24 X 7 online support
    </h6>
</div>
</div>
</div>
</div>
</section>

<div class="section-padding contact-form-map">
<div class="container">
<div class="row">
<div class="col-lg-7">
<div class="section-header">
<div class="section-heading">
<h3 class="text-custom-black">Get In Touch</h3>
<div class="section-description">
<p class="text-light-dark">Send us a mail</p>
</div>
</div>
</div>
<form class="mb-md-80">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<input type="text" name="#" class="form-control form-control-custom" placeholder="Name" required="">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<input type="email" name="#" class="form-control form-control-custom" placeholder="Email I'd" required="">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<input type="text" name="#" class="form-control form-control-custom" placeholder="Subject" required="">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<input type="text" name="#" class="form-control form-control-custom" placeholder="Phone No." required="">
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<textarea name="message" rows="5" class="form-control form-control-custom" placeholder="Message" required=""></textarea>
</div>
<button type="submit" class="btn-first btn-submit">Submit</button>
 </div>
</div>
</form>
</div>
<div class="col-lg-5">
<div class="contact-map full-height">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3930.2168489067953!2d8.88712501406472!3d9.915889677199258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x105373ad0ffda5eb%3A0x4f3c4597707b092d!2s28%20Ahmadu%20Bello%20Way%2C%20930105%2C%20Jos!5e0!3m2!1sen!2sng!4v1662291966453!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
</div>
</div>
</div>
</div>
</x-app-layout>
