<x-admin-layout>
    <x-slot name="header">
        Admin Dashboard
    </x-slot> 
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-green-600 rounded hover:shadow-green-700 hover:shadow hover:scale-105 duration-300">
            <div class="flex justify-between p-8">
                <div>
                    <h3 class="text-6xl font-extrabold text-white">{{App\Models\User::all()->count()}}</h3>
                    <p class="text-white font-sans">Users</p>
                </div>
                <div>
                    <i class="fas fa-users text-8xl opacity-25 text-slate-100 "></i> 
                </div>
            </div>
            
            <a href="{{route('admin.users.index')}}" class="bg-green-700  text-white w-full flex justify-center p-1 rounded">
                More info  <i class="fas fa-arrow-right bg-white text-green-700 p-1 px-2 ml-2 text-xs rounded-full"></i>
            </a>
        </div>
    

        <div class="bg-red-500 rounded hover:shadow-red-600 hover:shadow hover:scale-105 duration-300">
            <div class="flex justify-between p-8">
                <div>
                    <h3 class="text-6xl font-extrabold text-white">{{App\Models\Car::all()->count()}}</h3>
                    <p class="text-white font-sans">Cars</p>
                </div>
                <div>
                    <i class="fas fa-car text-8xl opacity-25 text-slate-100 "></i> 
                </div>
            </div>
            
            <a href="{{route('admin.cars.index')}}" class="bg-red-600  text-white w-full flex justify-center p-1 rounded">
                More info  <i class="fas fa-arrow-right bg-white text-red-600 p-1 px-2 ml-2 text-xs rounded-full"></i>
            </a>
        </div>       
    </div> 
    <div class="my-4"></div>
    <div class="bg-white p-4 rounded">
    <div class="shadow-lg rounded-lg overflow-hidden">
  <div class="py-3 px-5 bg-gray-50">Bar chart</div>
  <canvas class="p-10" id="chartBar"></canvas>
</div>

<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart bar -->
<script>
  const labelsBarChart = [
    'Bookings',
    "Cars",
    "Amenities",
  ];
  const dataBarChart = {
    labels: labelsBarChart,
    datasets: [
      {
        label: "{{env('APP_NAME')}} data set",
        backgroundColor: "hsl(252, 82.9%, 67.8%)",
        borderColor: "hsl(252, 82.9%, 67.8%)",
        data: [
            {{App\Models\Booking::all()->count()}},
            {{App\Models\Car::all()->count()}},
            {{App\Models\Amenity::all()->count()}},
        ],
      },
    ],
  };

  const configBarChart = {
    type: "bar",
    data: dataBarChart,
    options: {},
  };

  var chartBar = new Chart(
    document.getElementById("chartBar"),
    configBarChart
  );
</script>
    </div> 
</x-admin-layout>