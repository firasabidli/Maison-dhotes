<div class="modal" id="modal-delete-{{ $maison->id }}">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Confirmer la suppression</h3>
        <p>Voulez-vous vraiment supprimer la Maison d'Hôte <strong>{{ $maison->nom }}</strong> ?</p>
        <form action="{{ route('admin.maisonsDestroy', $maison->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div style="display: flex; justify-content: end; gap: 10px;">
                <button type="button" class="cancel-btn">Annuler</button>
                <button type="submit" class="submit-btn" style="background-color: red;">Supprimer</button>
            </div>
        </form>
    </div>
</div>
