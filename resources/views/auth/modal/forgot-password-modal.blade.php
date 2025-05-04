
            @if(session('step') === null || session('step') === 'email')
                <div class="modal" id="modal-forgot-password" style="display: block;">
                    <div class="formContent">
                        <form action="{{ route('forgot.step1') }}" method="POST">
                            @csrf
                            <span class="close"><i class="ri-close-large-line"></i></span>
                            <h4>Mot de passe oublié</h4>
                            <label>Adresse email :</label>
                            <input type="email" name="email" class="form-control" required>
                            @if(session('error')) <div class="text-danger mt-2">{{ session('error') }}</div> @endif
                            <button type="submit" class="btn btn-primary mt-3">Envoyer le code</button>
                        </form>
                    </div>
                </div>
            @endif


            @if(session('step') === 'code')
                <div class="modal" id="modal-verify-code" style="display: block;">
                    <div class="formContent">
                        <form action="{{ route('forgot.step2') }}" method="POST">
                            @csrf
                            <h4>Vérifiez le code</h4>
                            <input type="hidden" name="email" value="{{ session('email') }}">
                            <label>Code reçu :</label>
                            <input type="text" name="code" class="form-control" required>
                            @if(session('error')) <div class="text-danger mt-2">{{ session('error') }}</div> @endif
                            <button type="submit" class="btn btn-success mt-3">Vérifier</button>
                        </form>
                    </div>
                </div>
            @endif

            @if(session('step') === 'reset')
                <div class="modal" id="modal-reset-password" style="display: block;">
                    <div class="formContent">
                        <form action="{{ route('forgot.step3') }}" method="POST">
                            @csrf
                            <h4>Réinitialiser le mot de passe</h4>
                            <input type="hidden" name="email" value="{{ session('email') }}">
                            <input type="hidden" name="code" value="{{ session('code') }}">
                            <label>Nouveau mot de passe :</label>
                            <input type="password" name="password" class="form-control" required>
                            <label>Confirmer le mot de passe :</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                            @if(session('error')) <div class="text-danger mt-2">{{ session('error') }}</div> @endif
                            <button type="submit" class="btn btn-danger mt-3">Changer</button>
                        </form>
                    </div>
                </div>

            @endif
  
       