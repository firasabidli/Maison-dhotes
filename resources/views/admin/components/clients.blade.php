<div class="recent--patients">
    <div class="title">
        <h2 class="section--title">Clients récents</h2>
       
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Numéro du téléphone</th>
                    <th>Maison d'Hôte</th>
                    <th>Date Réservation</th>
                    <th>Paiement effectué</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->client->name ?? 'N/A' }}</td>
                        <td>{{ $reservation->client->email ?? 'N/A' }}</td>
                        <td>{{ $reservation->client->num_tel ?? 'N/A' }}</td>
                        <td>{{ $reservation->maison->nom ?? 'N/A' }}</td>
                        <td>{{ $reservation->created_at->format('d/m/Y')}}</td>
                        <td class="{{ $reservation->is_paid ? 'confirmed' : 'rejected' }}">
                            {{ $reservation->is_paid ? 'Payée' : 'Non payée' }}
                        </td>
                        
                        <td>
                            <span>
                            <i class="ri-bank-card-fill scheduled"data-modal-target="modal-pay-{{ $reservation->id }}"></i>
                                
                            </span>
                        </td>
                    </tr>
                    @include('proprietaire.components.reservation.modal.pay-modal', ['reservation' => $reservation])
                @endforeach
            </tbody>

        </table>
    </div>
 </div>