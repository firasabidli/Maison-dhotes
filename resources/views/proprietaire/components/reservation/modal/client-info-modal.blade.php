<div class="modal" id="modal-client-info-{{ $reservation->id }}">
    <div class="modal-content">
        <span class="close"><i class="ri-close-large-line"></i></span>
       
<br>
        <div class="modal-body">
           
            <div class="profile-card">
            <!-- Profile Image -->
            <div class="image">
            
            <img src="{{ $reservation->client->avatar ? asset('storage/public/avatars/' . basename($reservation->client->avatar)) : asset('img/noprofil.jpg') }}"  alt="avatar"  class="profile-img" >
            </div>

            <!-- Profile Details -->
            <div class="text-data">
            <span class="name">{{ $reservation->client->name }}</span>
            
            <p><strong><i class="ri-mail-fill"></i> :</strong> {{ $reservation->client->email }}</p>
            <p><strong><i class="ri-phone-fill"></i> :</strong> {{ $reservation->client->num_tel }}</p>
            <p><strong><i class="ri-home-8-line"></i> :</strong> {{ $reservation->client->adresse }}</p>
            </div>
            <div class="media-buttons">
               
                
                <a href="https://wa.me/whatsappphonenumber" style="background: #64cd47" class="link">
                <i class="ri-whatsapp-line"></i>
                </a>
                <a href="mailto:{{ $reservation->client->email}}" style="background: #000000" class="link">
                <i class="ri-mail-send-line"></i>
                </a>
                </div>
           
     
   
  </div>
        </div>

        
    </div>
</div>