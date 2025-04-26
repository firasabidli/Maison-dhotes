

   

    @extends('client.layouts.app')

@section('title', 'Suivie Reservation')

@section('content')
@include('client.components.alert')
    
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Acceuil</a>
                    <a class="breadcrumb-item text-dark" href="#">Maison d'Hôtes</a>
                    <span class="breadcrumb-item active">Suivie Reservation</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


 
    <div class="container-fluid">
        <div class=" px-xl-5">
           
            <div class=" table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
        <thead class="thead-dark">
            <tr>
                <th>Images</th>
                <th>Maison d'Hôte</th>
                <th>Ville</th>
                <th>Adresse</th>
                <th>Date Début</th>
                <th>Date Fin</th>
                <th>Statut</th>
                <th>Prix Par Nuit</th>
                <th>Total</th>
                <th>Modifier Réservation</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            @foreach ($reservations as $reservation)
                @php
                    $maison = $reservation->maison;
                @endphp
                <tr>
                    <td class="align-middle">
                        @if ($maison->images && count($maison->images) > 0)
                            <div id="carousel-{{ $reservation->id }}" class="carousel slide" data-ride="carousel" style="width: 100px; height: 100px; padding: 10px; margin: 0 auto;">
                                <div class="carousel-inner bg-light">
                                    @foreach ($maison->images as $index => $image)
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            <img class="w-100 h-100" src="{{ asset('storage/public/maisons/' . basename($image)) }}" alt="Image">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <span>Aucune image</span>
                        @endif
                    </td>
                <td class="align-middle">{{ $maison->nom }}</td>
                <td class="align-middle">{{ $maison->ville }}</td>
                <td class="align-middle">{{ $maison->adresse }}</td>
                <td class="align-middle">{{ $reservation->date_debut }}</td>
                <td class="align-middle">{{ $reservation->date_fin }}</td>
                <td class="align-middle">{{ $reservation->statut }}</td>
                <td class="align-middle">{{ $maison->prix_par_nuit }} TND</td>
                <td class="align-middle">{{ $totals[$reservation->id] ?? 'N/A' }} TND</td>
                <td class="align-middle">
                    <button href="" class="btn btn-sm btn-warning" data-modal-target="modal-reservation{{ $reservation->id }}">
                        <i class="fa fa-edit"></i> Modifier
                    </button>
                </td>
            </tr>
            @include('client.components.modal.edit-reservation-modal', ['reservation' => $reservation])
        @endforeach
    </tbody>
</table>

            </div>
            
        </div>
    </div>
  
@endsection

   
 