@php use Illuminate\Support\Str; @endphp

<div class="modal" id="modal-edit-profil-{{ $user->id }}"> 
    <div class="formContent">
        <span class="close">&times;</span>
        <h3>Modifier la maison</h3>
        <form action="{{ route('profil.updateProfile', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="upload">
                <img id="avatarPreview" src="{{ $user->avatar ? asset('storage/public/avatars/' . basename($user->avatar)) : asset('img/noprofil.jpg') }}" width="100" height="100" alt="Avatar">
                <div class="round">
                    <input type="file" name="avatar" accept="image/*,.jpeg,.png,.jpg">
                    <i class="fa fa-camera" style="color: #fff;"></i>
                </div>
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
                    <label>Adresse:</label>
                    <input type="text" name="adresse" value="{{ old('adresse', $user->adresse) }}" required>
                </div>

                <div class="form-group">
                    <label>Numéro du téléphone:</label>
                    <input type="text" name="num_tel" value="{{ old('num_tel', $user->num_tel) }}" required>
                </div>


                

                
            </div>

            <button type="submit" class="btn btn--primary">Mettre à jour</button>
        </form>
    </div>
</div>

<script>
    // upload avatar => remplacer l'image sélectionné au lieu de l'image noprofil.jpg

document.addEventListener("DOMContentLoaded", function () {
  const fileInput = document.querySelector(".upload input[type='file']");
  const imgPreview = document.querySelector(".upload img");

  fileInput.addEventListener("change", function (event) {
      const file = event.target.files[0];

      if (file) {
          const reader = new FileReader();

          reader.onload = function (e) {
              imgPreview.src = e.target.result;
          };

          reader.readAsDataURL(file);
      }
  });
});
</script>