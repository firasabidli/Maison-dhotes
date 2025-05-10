<div class="modal" id="modal-ajout">
    <div class="formContent">
        <span class="close">&times;</span>
        <h3>Ajouter une maison d'hôtes</h3>
        <form action="{{ route('admin.maisonsStore') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label>Nom:</label>
                    <input type="text" name="nom" value="{{ old('nom') }}" required>
                </div>

                <div class="form-group">
                    <label>Ville:</label>
                    <select name="ville" class="form-control" required>
                        <option value="">Sélectionnez une ville</option>
                        <option value="Tunis" {{ old('ville') == 'Tunis' ? 'selected' : '' }}>Tunis</option>
                        <option value="Sfax" {{ old('ville') == 'Sfax' ? 'selected' : '' }}>Sfax</option>
                        <option value="Sousse" {{ old('ville') == 'Sousse' ? 'selected' : '' }}>Sousse</option>
                        <option value="Kairouan" {{ old('ville') == 'Kairouan' ? 'selected' : '' }}>Kairouan</option>
                        <option value="Bizerte" {{ old('ville') == 'Bizerte' ? 'selected' : '' }}>Bizerte</option>
                        <option value="Gabès" {{ old('ville') == 'Gabès' ? 'selected' : '' }}>Gabès</option>
                        <option value="Ariana" {{ old('ville') == 'Ariana' ? 'selected' : '' }}>Ariana</option>
                        <option value="Monastir" {{ old('ville') == 'Monastir' ? 'selected' : '' }}>Monastir</option>
                        <option value="Nabeul" {{ old('ville') == 'Nabeul' ? 'selected' : '' }}>Nabeul</option>
                        <option value="Béja" {{ old('ville') == 'Béja' ? 'selected' : '' }}>Béja</option>
                        <option value="Jendouba" {{ old('ville') == 'Jendouba' ? 'selected' : '' }}>Jendouba</option>
                        <option value="Le Kef" {{ old('ville') == 'Le Kef' ? 'selected' : '' }}>Le Kef</option>
                        <option value="Mahdia" {{ old('ville') == 'Mahdia' ? 'selected' : '' }}>Mahdia</option>
                        <option value="Médenine" {{ old('ville') == 'Médenine' ? 'selected' : '' }}>Médenine</option>
                        <option value="Tataouine" {{ old('ville') == 'Tataouine' ? 'selected' : '' }}>Tataouine</option>
                        <option value="Tozeur" {{ old('ville') == 'Tozeur' ? 'selected' : '' }}>Tozeur</option>
                        <option value="Kébili" {{ old('ville') == 'Kébili' ? 'selected' : '' }}>Kébili</option>
                        <option value="Zaghouan" {{ old('ville') == 'Zaghouan' ? 'selected' : '' }}>Zaghouan</option>
                        <option value="Ben Arous" {{ old('ville') == 'Ben Arous' ? 'selected' : '' }}>Ben Arous</option>
                        <option value="La Manouba" {{ old('ville') == 'La Manouba' ? 'selected' : '' }}>La Manouba</option>
                        <option value="Siliana" {{ old('ville') == 'Siliana' ? 'selected' : '' }}>Siliana</option>
                        <option value="Gafsa" {{ old('ville') == 'Gafsa' ? 'selected' : '' }}>Gafsa</option>
                        <option value="Sidi Bouzid" {{ old('ville') == 'Sidi Bouzid' ? 'selected' : '' }}>Sidi Bouzid</option>
                        <option value="Djerba" {{ old('ville') == 'Djerba' ? 'selected' : '' }}>Djerba</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Adresse:</label>
                    <input type="text" name="adresse" value="{{ old('adresse') }}" required>
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
