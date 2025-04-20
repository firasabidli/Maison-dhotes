<!-- Modal Édition d'une  reservation -->
<div class="modal" id="modal-pay-{{ $reservation->id }}">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Validation de paiment de le client <strong class="scheduled">{{$reservation->client->name}}</strong></h3>
        <form action="{{ route('reservation.paiement', $reservation->id) }}" method="POST" >
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group">
                    <strong class="scheduled"><i class="ri-mail-fill"></i>{{$reservation->client->email}}</strong>
                </div>
                <div class="form-group">
                    <strong class="scheduled"><i class="ri-phone-fill"></i>{{$reservation->client->num_tel }}</strong>
                </div>
                <div class="form-group">
                    <label>Paiement effectué</label>
                    <select name="is_paid" id="is_paid" class="form-control">
                        <option value="0" {{ $reservation->is_paid == '0' ? 'selected' : '' }}>Non payée</option> 
                        <option value="1" {{ $reservation->is_paid == '1'  ? 'selected' : '' }}>Payée</option> 
                        
                    </select>    
                </div>
            </div>

            <button type="submit" class="btn submit-btn">Mettre à jour</button>
        </form>
    </div>
</div>
