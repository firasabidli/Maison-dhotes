<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Se connecter</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <main>
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
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
                                <input type="email" name="email" class="input-field" required autofocus autocomplete="off" value="{{ old('email') }}" />
                                <label>Email:</label>
                            </div>

                            <!-- Mot de passe -->
                            <div class="input-wrap">
                                <input type="password" name="password" class="input-field" required autocomplete="off" />
                                <label>Mot de passe:</label>
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
                    <form method="POST" action="{{ route('register') }}" autocomplete="off" class="sign-up-form">
                        @csrf

                        <div class="heading">
                            <h2>Créez votre compte</h2>
                            <h6>Vous avez déjà un compte ?</h6>
                            <a href="#" class="toggle">Se connecter</a>
                        </div>

                        <div class="actual-form">
                            <!-- Nom -->
                            <div class="input-wrap">
                                <input type="text" name="name" class="input-field" required autocomplete="off" value="{{ old('name') }}" />
                                <label>Nom</label>
                            </div>

                            <!-- Email -->
                            <div class="input-wrap">
                                <input type="email" name="email" class="input-field" required autocomplete="off" value="{{ old('email') }}" />
                                <label>Email</label>
                            </div>

                            <!-- Mot de passe -->
                            <div class="input-wrap">
                                <input type="password" name="password" class="input-field" required autocomplete="off" />
                                <label>Mot de passe</label>
                            </div>

                            <!-- Confirmation mot de passe -->
                            <div class="input-wrap">
                                <input type="password" name="password_confirmation" class="input-field" required autocomplete="off" />
                                <label>Confirmer mot de passe</label>
                            </div>

                            <input type="submit" value="S'inscrire" class="sign-btn" />

                            <p class="text">
                                En vous inscrivant, vous acceptez les
                                <a href="#">Conditions d'utilisation</a> et
                                <a href="#">Politique de confidentialité</a>
                            </p>
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
