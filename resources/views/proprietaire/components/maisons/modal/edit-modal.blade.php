<!-- Modal Édition d'une maison -->
<div class="modal" id="modal-edit-{{ $maison->id }}">
    <div class="formContent">
        <span class="close">&times;</span>
        <h3>Modifier la maison</h3>
        <form action="{{ route('maisons.update', $maison->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group">
                    <label>Nom:</label>
                    <input type="text" name="nom" value="{{ old('nom', $maison->nom) }}" required>
                </div>

                <div class="form-group">
                    <label>Adresse:</label>
                    <input type="text" name="adresse" value="{{ old('adresse', $maison->adresse) }}" required>
                </div>

                <div class="form-group">
                    <label>Ville:</label>
                    <input type="text" name="ville" value="{{ old('ville', $maison->ville) }}" required>
                </div>

                <div class="form-group">
                    <label>Prix par nuit (DT):</label>
                    <input type="number" step="0.01" name="prix_par_nuit" value="{{ old('prix_par_nuit', $maison->prix_par_nuit) }}" required>
                </div>

                <div class="form-group">
                    <label>Capacité:</label>
                    <input type="number" name="capacite" value="{{ old('capacite', $maison->capacite) }}" required>
                </div>

                

                <div class="form-group">
                    <label>Catégorie:</label>
                    <select name="category_id" required>
                        @foreach(App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $maison->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group full-width">
                    <label>Description:</label>
                    <textarea name="description">{{ old('description', $maison->description) }}</textarea>
                </div>

                <div class="form-group full-width">
                    <label>Images (vous pouvez en ajouter d'autres):</label>
                    <input type="file" name="images[]" multiple accept="image/*">
                </div>
            </div>

            <button type="submit" class="btn submit-btn">Mettre à jour</button>
        </form>
    </div>
</div>
