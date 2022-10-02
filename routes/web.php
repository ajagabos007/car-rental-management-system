<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AirlineController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarTypeController;

use App\Http\Controllers\FlightController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;




use App\Http\Livewire\Airline\Index as AirlineIndex;
use App\Http\Livewire\Airline\Show as AirlineShow;

use App\Http\Livewire\Booking\Index as BookingIndex;
use App\Http\Livewire\Booking\Show as BookingShow;
use App\Http\Livewire\Booking\Checkout as BookingCheckout;
use App\Http\Livewire\Booking\Pay as BookingPay;

use App\Http\Livewire\Blog\Index as BlogIndex;
use App\Http\Livewire\Blog\Show as BlogShow;


use App\Http\Livewire\Faq\Index as FaqIndex;

use App\Http\Livewire\Flight\Index as FlightIndex;
use App\Http\Livewire\Flight\Show as FlightShow;
use App\Http\Livewire\Flight\Book as FlightBook;

use App\Http\Livewire\Gallery\Index as GalleryIndex;

use App\Http\Livewire\Hotel\Index as HotelIndex;
use App\Http\Livewire\Hotel\Show as HotelShow;
use App\Http\Livewire\Hotel\Book as HotelBook;

use App\Http\Livewire\Car\Index as CarIndex;
use App\Http\Livewire\Car\Show as CarShow;
use App\Http\Livewire\Car\Book as CarBook;


use App\Http\Livewire\Payment\Show as PaymentShow;
use App\Http\Livewire\Payment\Done as PaymentDone;
use App\Http\Livewire\Payment\Index as PaymentIndex;

use App\Http\Livewire\Service\Index as ServiceIndex;

use App\Models\Car;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome',[
        'recommendedCars' => Car::orderBy('created_at','desc')->take(5)->get(),
        'cars' => Car::orderBy('created_at','desc')->paginate(10),
    ]);

})->name('home');

Route::get('/how-it-works', function () {
    return view('welcome');
})->name('how-it-works');

Route::get('/testimonies', function () {
    return view('welcome');
})->name('testimonies');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::get('/faqs', FaqIndex::class)->name('faqs');


Route::get('/services', ServiceIndex::class)->name('services.index');


Route::resource('car-types', CarTypeController::class);

Route::name('bookings.')->group(function(){
    Route::prefix('rents')->group(function(){
        Route::get('', BookingIndex::class)->name('index');
        Route::get('{booking}', BookingShow::class, )->name('show');
        Route::get('{booking}/checkout', BookingCheckout::class)->name('checkout');
        Route::get('{booking}/pay', BookingPay::class )->name('pay');
    });
});

Route::name('blogs.')->group(function(){
    Route::prefix('blogs')->group(function(){
        Route::get('', BlogIndex::class)->name('index');
        Route::get('{blog}', BlogShow::class, )->name('show');
    });
});

Route::name('cars.')->group(function () {
    Route::prefix('cars')->group(function () {
        Route::get('', CarIndex::class)->name('index');
        Route::get('{car}', CarShow::class)->name('show');
        Route::middleware([
            'auth:sanctum',
            config('jetstream.auth_session'),
            'verified'
        ])->group(function () {
            Route::get('{car}/renting', CarBook::class)->name('book');
        });   
    });
});

Route::get('/gallery', GalleryIndex::class)->name('galleries.index');


Route::name('payments.')->group(function(){
    Route::prefix('payments')->group(function(){
        Route::get('', PaymentIndex::class, )->name('index');
        Route::get('{payment}', PaymentShow::class, )->name('show');

        Route::controller(PaymentController::class)->group(function () {
            Route::get('{payment}/verify', 'verify')->name('verify');
        });
        Route::get('', PaymentIndex::class)->name('index');
        Route::get('{payment}/done', PaymentDone::class)->name('done');
        
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::middleware(['staff'])->group(function (){
        Route::prefix('admin')->group(function (){
            Route::name('admin.')->group(function (){
                Route::get('', function () {
                    return view('admin/dashboard');
                })->name('dashboard');
                Route::resource('roles', RoleController::class);
                Route::resource('bookings', BookingController::class);
                Route::resource('cars', CarController::class);
                Route::resource('users', UserController::class);
                Route::post('users/{user}/assign-role', [RoleController::class, 'assignRole'])->name('users.assign_role');
                Route::post('users/{user}/assign-permission', [PermissionController::class, 'assignPermission'])->name('users.assign_permission');
                Route::match(['put', 'patch'], 'users/{user}/staffs', [UserController::class, 'updateStaff'])->name('users.staffs.update');
            });
        });
    });

});

Route::fallback(function () {
    return view('404');
});
