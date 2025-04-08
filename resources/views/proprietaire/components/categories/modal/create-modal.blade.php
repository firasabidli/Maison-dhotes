<div class="modal" id="modal-ajout">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Ajouter une catégorie</h3>
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" required>
            <button type="submit" class="submit-btn">Ajouter</button>
        </form>
    </div>
</div>
