<div class="modal" id="modal-delete-{{ $user->id }}">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Confirmer la suppression</h3>
        <p>Voulez-vous vraiment supprimer cette Utilisateur <strong>{{ $user->name }}</strong> ?</p>
        <form action="{{ route('admin.userDestroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div style="display: flex; justify-content: end; gap: 10px;">
                <button type="button" class="cancel-btn close">Annuler</button>
                <button type="submit" class="submit-btn" style="background-color: red;">Supprimer</button>
            </div>
        </form>
    </div>
</div>
