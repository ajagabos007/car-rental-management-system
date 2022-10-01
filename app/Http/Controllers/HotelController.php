<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Models\Hotel;
use App\Models\Amenity;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::paginate(10);
        return view('admin.hotels.index', ['hotels'=>$hotels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHotelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHotelRequest $request)
    {
        $hotel = Hotel::create($request->safe()->except(['images']));
        Amenity::all()->each(function ($amenity) use (&$request, &$hotel){
            if(isset($request->validated()['amenity_'.$amenity->id]))
                $hotel->amenities()->attach($amenity);
        });

        if($request->file('images'))
            foreach($request->file('images') as $image){
                $image_controller = new ImageController();
                    $image_controller->storeImage(
                    $image = $image, 
                    $path='hotels/', 
                    $imageable_id = $hotel->id, 
                    $imageable_type=$hotel::class
                );
            }
        // End of if

        return redirect()->route('admin.hotels.show', $hotel)->with('success','Hotel created Successfully');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        return view('admin.hotels.show', ['hotel'=>$hotel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        return view('admin.hotels.edit', ['hotel'=>$hotel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHotelRequest  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        $hotel->update($request->safe()->except(['images']));

        $hotel->amenities()->detach();
        Amenity::all()->each(function ($amenity) use (&$request, &$hotel){
            if(isset($request->validated()['amenity_'.$amenity->id]))
                $hotel->amenities()->attach($amenity);
        });

        if($request->file('images')){
            $hotel->images->each(function ($image){
                $image_controller = new ImageController();
                $image_controller->destroyImage($image);
            });

            foreach($request->file('images') as $image){
                $image_controller = new ImageController();
                    $image_controller->storeImage(
                    $image = $image, 
                    $path='hotels/', 
                    $imageable_id = $hotel->id, 
                    $imageable_type=$hotel::class
                );
            }
        }
        // End of if

        return redirect()->route('admin.hotels.show', $hotel)->with('success','Hotel created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->amenities()->detach();
       
        $hotel->images->each(function ($image){
            $image_controller = new ImageController();
            $image_controller->destroyImage($image);
        });

        $hotel->delete();
        return redirect()->route('admin.hotels.index')->with('success','Hotel and it resources deleted successfully');
    }
}
