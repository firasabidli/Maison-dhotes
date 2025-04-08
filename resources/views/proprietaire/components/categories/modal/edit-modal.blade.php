<!-- Modal Édition d'une catégorie -->
<div class="modal" id="modal-edit-{{ $category->id }}">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Modifier la catégorie</h3>
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="edit-nom-{{ $category->id }}">Nom :</label>
            <input type="text" name="nom" id="edit-nom-{{ $category->id }}" value="{{ $category->nom }}" required>
            <button type="submit" class="submit-btn">Mettre à jour</button>
        </form>
    </div>
</div>
