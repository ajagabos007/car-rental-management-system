<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Models\CarType;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Http\Controllers\ImageController;

class CarTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car_types = CarType::factory()->count(10)->state(
            new Sequence(
                ['name' => 'Economy'],
                ['name' => 'Duplex'],
                ['name' => 'Super Gold'],
                ['name' => 'Platinum'],
                ['name' => 'Full Size'],
                ['name' => 'Compact'],
                ['name' => 'Luxury/Premium'],
                ['name' => 'Min Car'],
                ['name' => 'Van/Minivan'],
                ['name' => 'Exotic/Special'],
            )
        )->hasCars(1)->create();

        $car_types->each(function($car_type, $key){
            $car_type->cars->each(function($car)use($key){
                $image_file = new File(public_path('auto_rental/assets/images/cars/'. $key+1 .'.png'));
                $image_controller = new ImageController();

                $image_controller->storeImage($image_file, $path="auto-rental/images/cars/", $car->id, $car::class);

                // $url = Storage::putFile('public/images/cars', $image_file);
                // $image = new Image();
                // $image->url = $url;
                // $image->imageable_id = $car->id;
                // $image->imageable_type =$car::class;
                // $image->save();  
            });
        });
    }
}
