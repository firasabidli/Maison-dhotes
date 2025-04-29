<!-- Modal Édition d'un user -->
<div class="modal" id="modal-edit-{{ $user->id }}">
    <div class="formContent">
        <span class="close">&times;</span>
        <h3>Modifier l'utilisateur {{$user->name}}</h3>
        <form action="{{ route('admin.updateUser', $user->id) }}" method="POST" >
            @csrf
            @method('PUT')
            <div style="margin: 0 auto">
            <img id="avata" src="{{ $user->avatar ? asset('storage/public/avatars/' . basename($user->avatar)) : asset('img/noprofil.jpg') }}" width="100" height="100" alt="Avatar">
            </div>
            <div class="form-grid">
                <div class="form-group">
                    <label>Nom:</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
                </div>
                
                

                

                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="form-group">
                    <label>Numéro du téléphone:</label>
                    <input type="text"  name="num_tel" value="{{ old('num_tel', $user->num_tel) }}" required>
                </div>

                <div class="form-group">
                    <label>Adresse:</label>
                    <textarea name="adresse" id="adresse" cols="30" rows="3"  required>{{ old('adresse', $user->adresse) }}</textarea>
                </div>


                <div class="form-group">
                    <label>S'inscrire en tant que Client / Propriétaire:</label>
                    <select name="role" id="role" class="select-field" required >
                        <option value=""  disabled>Choisir votre rôle</option>
                        <option value="client" {{ old('role', $user->role) == 'client' ? 'selected' : '' }}>Client</option>
                        <option value="propriétaire" {{ old('role', $user->role) == 'propriétaire' ? 'selected' : '' }}>Propriétaire</option>
                    </select>
                                
                </div>

            </div>

            <button type="submit" class="btn submit-btn">Mettre à jour</button>
        </form>
    </div>
</div>
