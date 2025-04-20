<!-- Modal Édition d'une  reservation -->
<div class="modal" id="modal-edit-{{ $reservation->id }}">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Modifier la  reservation</h3>
        <form action="{{ route('reservation.gestionReservation', $reservation->id) }}" method="POST" >
            @csrf
            @method('PUT')

            <div class="form-grid">
            <div class="form-group">
                    <label>Statut</label>
                    <select name="statut" id="statut" class="form-control">
                        <option value="en attente" {{ $reservation->statut === 'en attente'  ? 'selected' : '' }}>En attente</option> 
                        <option value="confirmée" {{ $reservation->statut === 'confirmée'  ? 'selected' : '' }}>Confirmée</option> 
                        <option value="annulée"  {{ $reservation->statut === 'annulée'     ? 'selected' : '' }}>Annulée</option>
                    </select>    
                </div>
            </div>

            <button type="submit" class="btn submit-btn">Mettre à jour</button>
        </form>
    </div>
</div>
