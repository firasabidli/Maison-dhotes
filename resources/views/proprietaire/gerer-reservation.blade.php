@extends('proprietaire.layouts.content')

@section('title', "Reservation")

@section('page-content')






<div class="recent--patients">
@include('proprietaire.components.alert')
    <div class="title">
        <h2 class="section--title">Gestion des réservation Maison d'Hôtes</h2>
       
    </div>
    <div class="table">
        <table>
            <thead>
            <tr>
                
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
            <tbody>
            @foreach ($reservations as $reservation)
                @php
                    $maison = $reservation->maison;
                    $client =$reservation->client;
                @endphp
                    <tr>
                        
                        <td >{{ $maison->nom }}</td>
                        <td >{{ $maison->ville }}</td>
                        <td >{{ $maison->adresse }}</td>
                        <td >{{ $reservation->date_debut }}</td>
                        <td >{{ $reservation->date_fin }}</td> 
                        <td class="{{ $reservation->statut === 'confirmée' ? 'confirmed' : ($reservation->statut ==='en attente' ? 'pending' : 'rejected') }}">{{ $reservation->statut }}</td>
                        <td >{{ $maison->prix_par_nuit }} TND</td>
                        <td >{{ $totals[$reservation->id] ?? 'N/A' }} TND</td>
                        
                        <td>
                            <span>
                                <i class="ri-id-card-line info " data-modal-target="modal-client-info-{{ $reservation->id }}"></i>
                                <i class="ri-edit-line edit" data-modal-target="modal-edit-{{ $reservation->id }}"></i>
                                <i class="ri-delete-bin-line delete" data-modal-target="modal-delete-{{ $reservation->id }}"></i>
                                
                              
                            </span>
                        </td>

                    </tr>
                    @include('proprietaire.components.reservation.modal.client-info-modal', ['reservation' => $reservation])
                    @include('proprietaire.components.reservation.modal.edit-modal', ['reservation' => $reservation])
                    @include('proprietaire.components.reservation.modal.delete-modal', ['reservation' => $reservation])
                @endforeach
            </tbody>
        </table>
        
    </div>
    <!-- Pagination Laravel -->
    {{ $reservations->links() }}
</div>

@endsection


