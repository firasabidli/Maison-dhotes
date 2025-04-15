<div class="modal" id="modal-reservation{{ $maison->id }}">
    <div class="formContent">
        <span class="close">&times;</span>
        <h3>Réserver {{ $maison->nom }}</h3>
        <form method="POST" action="{{ route('reservation.store') }}">
            @csrf
            <input type="hidden" name="maison_id" value="{{ $maison->id }}">
            <div class="form-grid">
                <div class="form-group">
                    <label>Date de début</label>
                    <input type="date" name="date_debut" class="form-control" required>
               </div>
               <div class="form-group">
                    <label>Date de fin</label>
                    <input type="date" name="date_fin" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nombre de personnes</label>
                    <input type="number" name="nombre_personnes" class="form-control" required min="1">
                </div>
            </div>
            <button type="submit" class="btn submit-btn">Réserver</button>
        </form>
    </div>
</div>
