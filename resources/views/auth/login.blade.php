<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Se connecter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logoApp.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>

<main class="{{ session()->has('register_errors') ? 'sign-up-mode' : '' }}">

        


        <div class="box {{ session()->has('register_errors') ? 'box-errors' : '' }}"">
       
            <div class="inner-box">
                <div class="forms-wrap">
                @if ($errors->any())
                    @if (old('name')) 
                        @php session()->flash('register_errors', true); @endphp
                    @endif

                    <div class="notification notification--failure" role="alert" aria-live="assertive">
                        <div class="notification__body">
                            <i class="bi bi-x-circle-fill notification__icon"></i>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="notification__progress"></div>
                    </div>
                @endif
                    <!-- Formulaire de connexion -->
                    <form method="POST" action="{{ route('login') }}" autocomplete="off" class="sign-in-form">
                        @csrf

                        <div class="heading">
                            <h2>Bon retour parmi nous</h2>
                            <h6>Pas encore inscrit ?</h6>
                            <a href="#" class="toggle">S'inscrire</a>
                        </div>

                        <div class="actual-form">
                          <!-- Email -->
                            <div class="input-wrap">
                                <input type="email" name="email" class="input-field " required autofocus autocomplete="off" value="{{ old('email') }}" />
                                <label>Email:</label>
                               
                            </div>
                           <div class="erreurs" >
                           @error('email')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                           </div>
                          <!-- Mot de passe -->
                          <div class="input-wrap">
                                    <input type="password" name="password" class="input-field password-field" required autocomplete="off" />
                                    <label>Mot de passe</label>
                                    <span class="toggle-password">
                                    <i class="bi bi-eye-slash-fill"></i>
                                    </span>
                                </div>
                                <div class="  mb-4">
                                @error('password')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                                </div>

                            <!-- Se connecter -->
                            <input type="submit" value="Se connecter" class="sign-btn" />

                            <!-- Mot de passe oublié -->
                            @if (Route::has('password.request'))
                            <p class="text">
                                Vous avez oublié votre mot de passe ?
                                <a href="{{ route('password.request') }}">Réinitialiser votre mot de passe</a>
                            </p>
                            @endif
                        </div>
                    </form>

                    <!-- Formulaire d'inscription -->
                    <form method="POST" action="{{ route('register') }}" autocomplete="off" enctype="multipart/form-data" class="sign-up-form" >
                        @csrf

                        <div class="heading">
                            <h2>Créez votre compte</h2>
                            <h6>Vous avez déjà un compte ?</h6>
                            <a href="#" class="toggle">Se connecter</a>
                        </div>

                        <div class="actual-form" >
                            <!-- Avatar -->
                            <div class="upload">
                                <img id="avatarPreview" src="{{ asset('img/noprofil.jpg') }}" width="100" height="100" alt="Avatar">
                                <div class="round">
                                    <input type="file" name="avatar" accept="image/*,.jpeg,.png,.jpg">
                                    <i class="fa fa-camera" style="color: #fff;"></i>
                                </div>
                            </div>
                            <div class="mb-4">
                                @error('avatar')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                            </div>

                         <!-- Nom -->
                            <div class="input-wrap">
                                <input type="text" name="name" class="input-field " required autocomplete="off" value="{{ old('name') }}" />
                                <label>Nom</label>
                               
                            </div>
                            <div class="  mb-4">
                            @error('name')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                            </div> 
                         <!-- Email -->
                            <div class="input-wrap">
                                <input type="email" name="email" class="input-field " required autocomplete="off" value="{{ old('email') }}" />
                                <label>Email</label>
                               
                            </div>
                            <div class="  mb-4">
                            @error('email')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                            </div> 
                         <!-- Numéro du téléphone-->
                         <div class="input-wrap">
                                <input type="text" name="num_tel" class="input-field " required autocomplete="off" value="{{ old('num_tel') }}" />
                                <label>Numéro du téléphone</label>
                               
                            </div>
                            <div class="  mb-4">
                            @error('num_tel')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                            </div> 
                            <!-- Adresse -->
                            <div class="input-wrap">
                                <input type="text" name="adresse" class="input-field " required autocomplete="off" value="{{ old('adresse') }}" />
                                <label>Adresse</label>
                               
                            </div>
                            <div class="  mb-4">
                            @error('adresse')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                            </div> 
                                <!-- Mot de passe -->
                                <div class="input-wrap">
                                    <input type="password" name="password" class="input-field password-field" required autocomplete="off" />
                                    <label>Mot de passe</label>
                                    <span class="toggle-password">
                                    <i class="bi bi-eye-slash-fill"></i>
                                    </span>
                                </div>
                                <div class="  mb-4">
                                @error('password')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                                </div>

                                <!-- Confirmation de mot de passe -->
                                <div class="input-wrap">
                                    <input type="password" name="password_confirmation" class="input-field password-field" required autocomplete="off" />
                                    <label>Confirmer mot de passe</label>
                                    <span class="toggle-password">
                                    <i class="bi bi-eye-slash-fill"></i>
                                    </span>
                                </div>
                                <div class="  mb-4">
                                @error('password')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                                </div>


                           <!-- role -->
                            <div class="select-wrap">
                                <select name="role" id="role" class="select-field" required >
                                    <option value="" selected disabled>Choisir votre rôle</option>
                                    <option value="client">Client</option>
                                    <option value="propriétaire">Propriétaire</option>
                                </select>
                                <label class="select-label">S'inscrire en tant que Client / Propriétaire</label>
                            </div>
                            <div class="mb-4">
                                @error('role')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                            </div>

                            <input type="submit" value="S'inscrire" class="sign-btn" />

                            
                        </div>
                    </form>
                </div>

                <div class="carousel">
                    <div class="images-wrapper">
                        <img src="{{ asset('img/login-register.gif') }}" class="image show" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
