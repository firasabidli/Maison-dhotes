<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mot de passe Oublié</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="{{ asset('img/logoApp.ico') }}">
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('css/forgotPassword.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #loader {
            position: fixed;
            z-index: 9999;
            background-color: black;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #loader img {
            width: 30%;
        }

        #app-content {
            display: none;
        }
    </style>
</head>
<body>

    <div id="loader">
            <img src="{{ asset('img/loiding.gif') }}" alt="Chargement...">
        </div>
    <div id="app-content"> 
        <div class="container pt-5">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 text-center">
                        <img src="{{ asset('img/forgot-password.gif') }}" alt="Main IMG" class="img-fluid">
                    </div>
                    
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 pt-5">
                        <h2 class="main-text pt-5 mt-5">Mot de passe oublié</h2>
                        <p>Veuillez saisir votre adresse e-mail pour réinitialiser votre mot de passe en toute sécurité.</p>

                        <form method="POST" action="{{ route('forgot.step1') }}">
                            @csrf
                            <input 
                                placeholder="Enter Your E-mail" 
                                type="email" 
                                name="email" 
                                required 
                                class="form-control main-input mt-5" 
                                style="width: 100%; border: none !important; box-shadow: none !important; border-radius: 0px !important; border-bottom: 4px solid #4e51fd !important;"
                            >
                            @error('email') 
                                <div class="text-danger mt-1">{{ $message }}</div> 
                            @enderror

                            <div class="row">
                                <div class="col-3">
                                    <button class="btn btn-primary mt-5" type="submit">Envoyer le code</button>
                                </div>
                                <div class="col-6 pt-5">
                                    <a href="{{ route('login') }}" class="back-to-login" style="text-decoration: none;">Se connecter</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <!-- Étape 2 : Vérification du code -->
        <div class="modal fade" id="codeModal" tabindex="-1" aria-labelledby="codeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('forgot.step2') }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Vérification du code</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <p>Veuillez saisir le code que vous avez reçu par e-mail.</p>
                    
                    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" required>
                    @error('code')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Vérifier</button>
            </div>
            </form>
        </div>
        </div>


        <!-- Modal Étape 3 : Nouveau mot de passe -->
        <div class="modal fade" id="resetModal" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('forgot.step3') }}" class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Nouveau mot de passe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Nouveau mot de passe</label>
                            <input type="password" name="password" class="form-control" required>
                            @error('password') 
                                <div class="text-danger mt-1">{{ $message }}</div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Confirmer le mot de passe</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                            @error('password_confirmation') 
                                <div class="text-danger mt-1">{{ $message }}</div> 
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Réinitialiser</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            @if(session('step') === 'code')
                var codeModal = new bootstrap.Modal(document.getElementById('codeModal'));
                codeModal.show();
            @elseif(session('step') === 'reset')
                var resetModal = new bootstrap.Modal(document.getElementById('resetModal'));
                resetModal.show();
            @endif
        });
    </script>

<script>
        window.addEventListener('load', function () {
            setTimeout(function () {
                document.getElementById('loader').style.display = 'none';
                document.getElementById('app-content').style.display = 'block';
            }, 2000); // 3 secondes
        });
    </script>


</body>
</html>
