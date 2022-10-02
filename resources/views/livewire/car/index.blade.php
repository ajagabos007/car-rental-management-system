<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <x-slot name="title">
        Cars
    </x-slot>   
    <x-slot name="subheader">
        Cars
    </x-slot>
    <x-slot name="subheader_links">
        <li class="active fw-500">
            Cars
        </li>
    </x-slot>

<section class="section-padding bg-light-white">
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="row">
<div class="col-12">
<div class="listing-top-heading mb-xl-20">
<h6 class="no-margin text-custom-black">
    Showing {{$cars->count()}} / {{$cars->total()}} Results</h6>
    <!-- <div class="sort-by">
        <span class="text-custom-black fs-14 fw-600">Sort by</span>
        <div class="group-form">
            <select wire:model="sort" class="form-control form-control-custom custom-select">
                <option>A to Z</option>
                <option>Z to A</option>
            </select>
        </div>
    </div> -->
</div>
</div>
@forelse ($cars as $car)
    <div class="col-md-6">
        <div class="hotel-grid mb-xl-30">
            <div class="hotel-grid-wrapper car-grid bx-wrapper">
                <div class="image-sec animate-img">
                    <a href="{{route('cars.show', $car)}}" >
                        <img src="{{Storage::url($car->image->url)}}" class="full-width" Style="height:210px;" alt="img">
                    </a>
                </div>
                <div class="hotel-grid-caption padding-20 bg-custom-white p-relative">
                    <h4 class="title fs-16"><a href="{{route('cars.show', $car)}}" class="text-custom-black">{{$car->name}}<small class="text-light-dark">1 Day</small></a></h4>
                    <span class="price"><small>From</small>NGN {{$car->price}}</span>
                    <div class="action">
                        <a class="btn-second btn-small" href="{{route('cars.show', $car)}}">View</a>
                        <a class="btn-first btn-submit" href="{{route('cars.book', $car)}}">Rent</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="col-md-12">
        <h1 class="text-custom-black">Car rental, travel and tour Comming soon...!</h1>
        <h3 class="text-custom-blue">Contact the admin for more information</h3>
    </div>
@endforelse
</div>
    
</div>
<aside class="col-lg-4">
<div class="sidebar_wrap">
<div class="sidebar">
<div class="sidebar_widgets mb-xl-30">
<div class="widget_title bg-custom-blue">
<h5 class="no-margin text-custom-white">Modify Search</h5>
</div>
<form wire:submit.prevent="search">
    <div class="form-group">
        <label class="fs-14 text-custom-black fw-500">Search Car</label>
        <input type="search" wire:model="data" name="#" class="form-control form-control-custom" placeholder="enter car name or price">
    </div>
    <button class="btn-first btn-submit full-width btn-height">Search Now</button>
</form>
</div>
    <div class="sidebar_widgets mb-xl-30">
        <div class="widget_title bg-custom-blue">
            <h5 class="no-margin text-custom-white">Price</h5>
            </div>
            <div class="widget_range">
                <div class="thc-range-inner">
                    <input type="text" class="js-range-slider1" name="my_range" value="">
                    <input type="range" name="range" id="">
                </div>
            </div>
        </div>
    </div>
</div>
</aside>
</div>
</div>
</section>