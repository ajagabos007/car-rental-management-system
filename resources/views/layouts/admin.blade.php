<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="{{asset('auto_rental/assets/css/font-awesome.css')}}" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

    </head>
    <body class="font-sans antialiased">
    
        <x-jet-banner />

        <div class="min-w-screen bg-gray-100 flex gap-2">
           
            <x-side-navigation-menu/>

            <main class="w-full  mr-1 mt-1 overflow-auto">
                <!-- Page Heading -->
                <nav class="bg-white shadow-inner mb-4  border-b border-gray-100 p-4 flex-row justify-center lg:flex lg:justify-between ">
                
                    @if (isset($header))
                        <div class="text-black md:text-xl font-extrabold shadow px-8 py-1 shadow-green-700 rounded-tl-full rounded-br-full">
                            {{$header}}
                        </div>
                    @endif
                    <div>
                        <ul class="flex gap-1 justify-center md:justify-end">
                            <li class="flex gap-2">              
                                <x-jet-nav-link href="{{ route('home') }}">
                                    {{ __('Home') }}  
                                </x-jet-nav-link>
                            </li>
                            <li>  
                                <span>/</span>
                                <x-jet-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                                    {{ __('Admin') }}
                                </x-jet-nav-link>
                            </li>
                            {{ $breadcrumb_links?? "" }}                        
                        </ul>
                    </div>  
                </nav> 
                @if ($errors->any())
                    <div class="bg-red-300 text-red-700 p-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif  
                @if (session('error'))
                    <div class="bg-red-200 text-red-700 p-2 font-bold mb-2 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="bg-green-200 text-green-700 p-2 font-bold mb-2 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- Page Content -->
                {{ $slot }}

            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script type="text/javascript">
            
            $(document).ready(function (e) {
            
                // image preview
                $('#image').change(function(){
                        
                    let reader = new FileReader();

                    reader.onload = (e) => { 
                
                        $('#preview-image-before-upload').attr('src', e.target.result); 
                    }
                    
                    reader.readAsDataURL(this.files[0]); 

                });
                // multiplie image preview
                $('#images').change(function(){
                     var $preview = $("#preview-image-before-upload-flex").empty()
                    if (this.files) $.each(this.files, function(i, file){
                        var reader = new FileReader();
                        $(reader).on("load", function() {
                            var img =$('<img class="h-36 rounded mr-2" width="200" heights="200" alt="hotel image">')
                            $preview.append($("<img/>", {
                                src:this.result, height:100, width:200,
                                class:'h-36 rounded mr-2'
                            }));
                        });

                        reader.readAsDataURL(file);

                    });
                   
                    // // Abort if there were no files selected
                    if(!files.length) return;
                });


            });
        
        </script>
    </body>
</html>
