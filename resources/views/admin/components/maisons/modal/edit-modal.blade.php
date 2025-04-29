<!-- Modal Édition d'une maison -->
<div class="modal" id="modal-edit-{{ $maison->id }}">
    <div class="formContent">
        <span class="close">&times;</span>
        <h3>Modifier la maison</h3>
        <form action="{{ route('admin.maisonsUpdate', $maison->id) }}" method="POST" enctype="multipart/form-data">
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
                    <select name="ville" class="form-control" required>
                        <option value="">Sélectionnez une ville</option>
                        <option value="Tunis" {{ $maison->ville == 'Tunis' ? 'selected' : '' }}>Tunis</option>
                        <option value="Sfax" {{ $maison->ville == 'Sfax' ? 'selected' : '' }}>Sfax</option>
                        <option value="Sousse" {{ $maison->ville == 'Sousse' ? 'selected' : '' }}>Sousse</option>
                        <option value="Kairouan" {{ $maison->ville == 'Kairouan' ? 'selected' : '' }}>Kairouan</option>
                        <option value="Bizerte" {{ $maison->ville == 'Bizerte' ? 'selected' : '' }}>Bizerte</option>
                        <option value="Gabès" {{ $maison->ville == 'Gabès' ? 'selected' : '' }}>Gabès</option>
                        <option value="Ariana" {{ $maison->ville == 'Ariana' ? 'selected' : '' }}>Ariana</option>
                        <option value="Monastir" {{ $maison->ville == 'Monastir' ? 'selected' : '' }}>Monastir</option>
                        <option value="Nabeul" {{ $maison->ville == 'Nabeul' ? 'selected' : '' }}>Nabeul</option>
                        <option value="Béja" {{ $maison->ville == 'Béja' ? 'selected' : '' }}>Béja</option>
                        <option value="Jendouba" {{ $maison->ville == 'Jendouba' ? 'selected' : '' }}>Jendouba</option>
                        <option value="Le Kef" {{ $maison->ville == 'Le Kef' ? 'selected' : '' }}>Le Kef</option>
                        <option value="Mahdia" {{ $maison->ville == 'Mahdia' ? 'selected' : '' }}>Mahdia</option>
                        <option value="Médenine" {{ $maison->ville == 'Médenine' ? 'selected' : '' }}>Médenine</option>
                        <option value="Tataouine" {{ $maison->ville == 'Tataouine' ? 'selected' : '' }}>Tataouine</option>
                        <option value="Tozeur" {{ $maison->ville == 'Tozeur' ? 'selected' : '' }}>Tozeur</option>
                        <option value="Kébili" {{ $maison->ville == 'Kébili' ? 'selected' : '' }}>Kébili</option>
                        <option value="Zaghouan" {{ $maison->ville == 'Zaghouan' ? 'selected' : '' }}>Zaghouan</option>
                        <option value="Ben Arous" {{ $maison->ville == 'Ben Arous' ? 'selected' : '' }}>Ben Arous</option>
                        <option value="La Manouba" {{ $maison->ville == 'La Manouba' ? 'selected' : '' }}>La Manouba</option>
                        <option value="Siliana" {{ $maison->ville == 'Siliana' ? 'selected' : '' }}>Siliana</option>
                        <option value="Gafsa" {{ $maison->ville == 'Gafsa' ? 'selected' : '' }}>Gafsa</option>
                        <option value="Sidi Bouzid" {{ $maison->ville == 'Sidi Bouzid' ? 'selected' : '' }}>Sidi Bouzid</option>
                        <option value="Djerba" {{ $maison->ville == 'Djerba' ? 'selected' : '' }}>Djerba</option>
                    </select>
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
                    <label>Disponible:</label>
                    <select name="disponible" required>
                        <option value="1" {{ old('disponible', $maison->disponible) == '1' ? 'selected' : '' }}>Oui</option>
                        <option value="0" {{ old('disponible', $maison->disponible) == '0' ? 'selected' : '' }}>Non</option>
                    </select>
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
