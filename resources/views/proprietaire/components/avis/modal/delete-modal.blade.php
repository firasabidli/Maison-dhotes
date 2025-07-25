<div class="modal" id="modal-delete-{{ $avis->id }}">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Confirmer la suppression</h3>
        <p><i class="ri-feedback-fill mx-4 "></i> {{$avis->commentaire}}</p>
        <p>Voulez-vous vraiment supprimer cette Avis ?</p>
        <form action="{{ route('avis.destroy', $avis->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div style="display: flex; justify-content: end; gap: 10px;">
                <button type="submit" class="submit-btn" style="background-color: red;">Supprimer</button>
            </div>
        </form>
    </div>
</div>
