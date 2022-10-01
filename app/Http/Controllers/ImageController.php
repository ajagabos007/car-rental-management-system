<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Cloudinary\Cloudinary;
use App\Services\GeneratorService;

class ImageController extends Controller
{

    protected $cloudinary;

    public function __construct(){
        $this->cloudinary = new Cloudinary; 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImageRequest $request)
    {
        //
    }

    public function storeImage($image, $path="images/", $imageable_id, $imageble_type){
        if(!$image)
            return;

        // $cloudinary_image = $this->cloudinary->uploadApi()->upload(
        //     $image->getRealPath(), 
        //     $options = [
        //         'public_id' =>  GeneratorService::randomAlphaNumeric(6).time(),
        //         'folder' => $path,
        //         'overwrite'=>true,
        //     ]
        // );

        $url = $image->store($folder);
        $image = new Image();
        $image->url = $url;
        // $image->url = $cloudinary_image['secure_url'];
        $image->imageable_id = $imageable_id;
        $image->imageable_type =$imageble_type;
        $image->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImageRequest  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        // Storage::delete($image->url);
        $token = explode('/', $image->url);
        $folder = "";
        
        for($i=7; $i < sizeof($token)-1; $i++ )
            $folder .= $token[$i].'/';
        // end of for loop
        $filename = explode('.', $token[sizeof($token)-1])[0];

        $this->cloudinary->uploadApi()->destroy($folder.$filename);
        $image->delete();
    }

    public function destroyImage(Image $image){
        Storage::delete($image->url);
        $image->delete();
    }

}
