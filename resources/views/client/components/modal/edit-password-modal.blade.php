<!-- Modal Édition d'une catégorie -->
<div class="modal" id="modal-edit-password-{{ $user->id }}">
    <div class="modal-content" >
        <span class="close">&times;</span>
        <h3>Changer Mot de passe</h3>
        <form action="{{ route('profil.changePassword', $user->id) }}" method="POST" >
            @csrf
            @method('PUT')
          
            
                <label>Mot de passe actuel</label>
                <input type="password" name="actual_password"   required  placeholder="••••••" />
            

            
                <label>Nouveau Mot de passe</label>
                <input type="password" name="new_password" required  placeholder="••••••" />
            
            
                <label>Confirmer mot de passe</label>
                <input type="password" name="new_password_confirmation" required placeholder="••••••" />

            <button type="submit" class="btn btn--primary">Mettre à jour</button>
        </form>
    </div>
</div>
