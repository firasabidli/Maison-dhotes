<div class="modal" id="modal-client-info-{{ $user->id }}">
    <div class="formContent">
        <span class="close"><i class="ri-close-large-line"></i></span>
       
<br>
        <div class="modal-body">
           
            <div class="profile-card">
                <!-- Profile Image -->
                <div class="image">
                
                <img src="{{ $user->avatar ? asset('storage/public/avatars/' . basename($user->avatar)) : asset('img/noprofil.jpg') }}"  alt="avatar"  class="profile-img" >
                </div>

                <!-- Profile Details -->
                <div class="text-data">
                <span class="name">{{ $user->name }}</span>
                
                <p><strong><i class="ri-mail-fill"></i> :</strong> {{ $user->email }}</p>
                <p><strong><i class="ri-phone-fill"></i> :</strong> {{ $user->num_tel }}</p>
                <p><strong><i class="ri-home-8-line"></i> :</strong> {{ $user->adresse }}</p>
                </div>
                <div class="media-buttons">
                
                    
                    <a href="https://wa.me/whatsappphonenumber" style="background: #64cd47" class="link">
                    <i class="ri-whatsapp-line"></i>
                    </a>
                    <a href="mailto:{{ $user->email}}" style="background: #000000" class="link">
                    <i class="ri-mail-send-line"></i>
                    </a>
                    </div>
           
     
   
            </div>
        </div>

        
    </div>
</div>