<div class="modal" id="modal-ajout">
    <div class="formContent">
        <span class="close">&times;</span>
        <h3>Ajouter un utilisateur</h3>
        <form action="{{ route('admin.addUser') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="margin: 0 auto">
            <img  src="{{ asset('img/noprofil.jpg') }}"  class="avatarUsersProfil" alt="Avatar">
            </div>
            <div class="form-grid">
                <div class="form-group">
                    <label>Nom:</label>
                    <input type="text" name="name" value="{{ old('name') }}" required>
                </div>

                

                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label>Numéro du téléphone:</label>
                    <input type="text"  name="num_tel" value="{{ old('num_tel') }}" required>
                </div>

                <div class="form-group">
                    <label>Adresse:</label>
                    <textarea name="adresse" id="adresse" cols="30" rows="3"  required>{{ old('adresse') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Mot de passe:</label>
                    <input type="password" name="password" class="input-field password-field" required autocomplete="off" />
                </div>

                <div class="form-group">              
                    <label>Confirmer mot de passe:</label>
                    <input type="password" name="password_confirmation" class="input-field password-field" required autocomplete="off" />
                </div>

                <div class="form-group">
                    <label>S'inscrire en tant que Client / Propriétaire:</label>
                    <select name="role" id="role" class="select-field" required >
                        <option value="" selected disabled>Choisir votre rôle</option>
                        <option value="client">Client</option>
                        <option value="propriétaire">Propriétaire</option>
                    </select>
                                
                </div>

            </div>
            <button type="submit" class="btn submit-btn">Ajouter</button>
        </form>
    </div>
</div>
