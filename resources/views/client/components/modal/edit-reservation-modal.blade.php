<div class="modal" id="modal-reservation{{ $reservation->id }}">
    <div class="formContent">
        <span class="close">&times;</span>
        <h3>Modifier Réservation</h3>
        <form method="POST" action="{{ route('reservation.updateRes', $reservation->id) }}">
            @csrf
            @method('PUT')
            
            <div class="form-grid">
                <div class="form-group">
                    <label>Date de début</label>
                    <input type="date" name="date_debut" class="form-control" value="{{ $reservation->date_debut }}" required>
               </div>
               <div class="form-group">
                    <label>Date de fin</label>
                    <input type="date" name="date_fin" class="form-control" value="{{  $reservation->date_fin  }}" required>
                </div>
                <div class="form-group">
                    <label>Nombre de personnes</label>
                    <input type="number" name="nombre_personnes" class="form-control" value="{{  $reservation->nombre_personnes  }}" required min="1" max="{{$maison->capacite}}">
                </div>
                <div class="form-group">
                    <label>Statut</label>
                    <select name="statut" id="statut" class="form-control">
                        <option value="en attente" {{ $reservation->statut === 'en attente'  ? 'selected' : '' }}>En attente</option> 
                        <option value="annulée"  {{ $reservation->statut === 'annulée'     ? 'selected' : '' }}>Annulée</option>
                    </select>    
                </div>
            </div>
            <button type="submit" class="btn submit-btn">Modifier</button>
        </form>
    </div>
</div>
