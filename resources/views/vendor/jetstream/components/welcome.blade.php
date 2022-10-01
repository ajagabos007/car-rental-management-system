<div>
    <section class="section-padding our-services-sec bg-light-white">
        <div class="container">
            <div class="section-header">
                <div class="section-heading">
                    <h3 class="text-custom-black"> Dashboard</h3>
                    <div class="section-description">

                        <h4 class="text-light-dark">
                            <a href="http://">
                                <i class="fas fa-user"></i>
                            {{auth()->user()->name}} 
                            </a>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <ul class="nav nav-pills nav-fill mb-2">
                    <li class="nav-item">
                        <h5 class="btn-second btn-small">
                            <a class="nav-link" href="{{ route('profile.show') }}">Profile</a>

                        </h5>
                    </li>
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <li class="nav-item">
                            <h5 class="btn-second btn-small">
                                <a class="nav-link" href="{{route('teams.show', Auth::user()->currentTeam->id) }}">
                                {{ Auth::user()->currentTeam->name }}
                                </a>
                            </h5>
                        </li>
                    @endif
                </ul>
            </div>
            

            <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Rents  <a href="{{route('bookings.index')}}" class="ml-2 underline">view all</a>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{auth()->user()->bookings->count()}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Car Rents -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Car Rents <a href="{{route('bookings.index')}}" class="ml-2 underline">view all</a>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{auth()->user()->bookings->where('bookable_type', App\Models\Car::class)->count()}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-car fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- Car Rents -->
                         <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               My Payments <a href="{{route('payments.index')}}" class="ml-2 underline">view all</a>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{auth()->user()->payments->count()}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-money fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->

            </div>
        </div>
    </section>
</div>
    