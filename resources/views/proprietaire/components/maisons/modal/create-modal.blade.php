<div class="modal" id="modal-ajout">
    <div class="formContent">
        <span class="close">&times;</span>
        <h3>Ajouter une maison d'hôtes</h3>
        <form action="{{ route('maisons.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label>Nom:</label>
                    <input type="text" name="nom" value="{{ old('nom') }}" required>
                </div>

                <div class="form-group">
                    <label>Adresse:</label>
                    <input type="text" name="adresse" value="{{ old('adresse') }}" required>
                </div>

                <div class="form-group">
                    <label>Ville:</label>
                    <input type="text" name="ville" value="{{ old('ville') }}" required>
                </div>

                <div class="form-group">
                    <label>Prix par nuit (DT):</label>
                    <input type="number" step="0.01" name="prix_par_nuit" value="{{ old('prix_par_nuit') }}" required>
                </div>

                <div class="form-group">
                    <label>Capacité:</label>
                    <input type="number" name="capacite" value="{{ old('capacite') }}" required>
                </div>

                <div class="form-group">
                    <label>Disponible:</label>
                    <select name="disponible" required>
                        <option value="1" {{ old('disponible') == '1' ? 'selected' : '' }}>Oui</option>
                        <option value="0" {{ old('disponible') == '0' ? 'selected' : '' }}>Non</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Catégorie:</label>
                    <select name="category_id" required>
                        @foreach(App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group full-width">
                    <label>Description:</label>
                    <textarea name="description">{{ old('description') }}</textarea>
                </div>

                <div class="form-group full-width">
                    <label>Images:</label>
                    <input type="file" name="images[]" multiple accept="image/*">
                </div>
            </div>
            <button type="submit" class="btn submit-btn">Ajouter</button>
        </form>
    </div>
</div>
