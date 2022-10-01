<div>
    {{-- Stop trying to control. --}}
    <x-slot name="title">
        Gallery
    </x-slot>   
    <x-slot name="subheader">
        Gallery
    </x-slot>
    <x-slot name="subheader_links">
        <li class="active fw-500">
            Gallery
        </li>
    </x-slot>
    <section class="section-padding bg-light-white gallery">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tabs filter-gallery">
                        <ul class="custom-flex nav nav-tabs mb-xl-40">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" data-filter="*">All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-filter=".car-gallery">Cars</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row gallery-grid">
                    @foreach(App\Models\Image::all()->sortByDesc('created_at') as $image)
                            @php 
                                $gallery_class = '';
                                if($image->imageable_type == App\Models\Car::class)
                                $gallery_class = 'car-gallery';
                            @endphp
                            <div class="col-lg-4 col-md-6 filter-box {{$gallery_class}}">
                                <div class="gallery-item mb-xl-30">
                                    <a href="{{Storage::url($image->url)}}" class="popup">
                                        <img src="{{Storage::url($image->url)}}" class="image-fit" style="height:250px;" alt="img">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
