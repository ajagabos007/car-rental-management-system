<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Models\Amenity;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::paginate(10);
        return view('admin.cars.index', ['cars'=>$cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $request)
    {
        $car = Car::create($request->safe()->except(['image']));
        Amenity::all()->each(function ($amenity) use (&$request, &$car){
            if(isset($request->validated()['amenity_'.$amenity->id]))
                $car->amenities()->attach($amenity);
        });
        if( $request->file('image')){
            $image_controller = new ImageController();
            $image_controller->storeImage(
                $image = $request->file('image'), 
                $path='cars/', 
                $imageable_id = $car->id, 
                $imageable_type=$car::class
            );
        }

        return redirect()->route('admin.cars.show', $car)->with('success','Flight Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('admin.cars.show', ['car'=>$car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('admin.cars.edit', ['car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarRequest  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->update($request->safe()->except(['image']));
        $car->amenities()->detach();
        foreach(Amenity::all() as $amenity)
            if(isset($request->validated()['amenity_'.$amenity->id]))
                $car->amenities()->attach($amenity);

        if($request->file('image')){
            $image_controller = new ImageController();
            if($car->image)
            $image_controller->destroy($car->image);

            $image_controller->storeImage(
                $image = $request->file('image'), 
                $path='cars/', 
                $imageable_id = $car->id, 
                $imageable_type=$car::class
            );
        }

        return redirect()->route('admin.cars.show', $car)->with('success','Car Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->amenities()->detach();

        if($car->image){
            $image_controller = new ImageController();
            $image_controller->destroyImage($car->image);
        }

        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'Car and it resources deleted successfully');
    }
}
