
    <!-- Navbar End -->
    @include('client.components.alert')

   


    @extends('client.layouts.app')

@section('title', 'List')

@section('content')
    
    
     <!-- Breadcrumb Start -->
     <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Acceuil</a>
                    <a class="breadcrumb-item text-dark" href="#">Maison d'Hôtes</a>
                    
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            @include('client.sections.maison-list.filtres-side-bar')
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            @include('client.sections.maison-list.maison-list')
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
    
   
@endsection
