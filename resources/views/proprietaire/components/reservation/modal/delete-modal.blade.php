<div class="modal" id="modal-delete-{{ $reservation->id }}">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Confirmer la suppression</h3>
        <p>Voulez-vous vraiment supprimer la réservation ?</p>
        <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div style="display: flex; justify-content: end; gap: 10px;">
                
                <button type="submit" class="submit-btn" style="background-color: red;">Supprimer</button>
            </div>
        </form>
    </div>
</div>
