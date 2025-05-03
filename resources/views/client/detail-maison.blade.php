
  
    @extends('client.layouts.app')

@section('title', 'Accueil')

@section('content')
@include('client.components.alert')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Acceuil</a>
                    <a class="breadcrumb-item text-dark" href="#">Maison d'Hôtes</a>
                    <span class="breadcrumb-item active">Détaille de la maison</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
 

   
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
             @include('client.sections.maison-detail.detail')
        </div>
        <div class="row px-xl-5">
             @include('client.sections.maison-detail.description-avis')
        </div>
    </div>
    @include('client.components.modal.info-proprietaire-modal', ['user' => $maisondet->user])
    @include('client.components.modal.reservation-modal', ['maison' => $maisondet])
   
  
@endsection
