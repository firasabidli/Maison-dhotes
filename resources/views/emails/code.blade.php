<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Code de réinitialisation</title>
    <style>
        /* (colle ici tout ton CSS de la question précédente) */
    </style>
</head>
<body>
<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;">
    <tr>
        <td bgcolor="#ffffff" class="email-container">
            <table role="presentation" width="100%">
                <tr>
                    <td style="padding: 20px; text-align: center; background-color: #313131;">
                        <img src="{{ asset('img/login-register.gif') }}" width="250" alt="Logo" style="height: auto; display: block; margin: 0 auto;" />
                    </td>
                </tr>
            </table>

            <table role="presentation" width="100%">
                <tr>
                    <td class="email-content">
                        <h1 style="margin-top: 0; color: #007bff;">Bonjour {{ $name }},</h1>
                        <p>Voici votre code de réinitialisation :</p>
                        <p style="font-size: 24px; font-weight: bold; color: #333;">{{ $code }}</p>
                        <p>Ce code est valide pendant 15 minutes.</p>
                    </td>
                </tr>
            </table>

            <table role="presentation" width="100%">
                <tr>
                    <td style="padding: 20px; text-align: center; background-color: #f8f9fa; font-size: 14px;">
                        <p style="margin: 0;">&copy; 2025 Locadar. Tous droits réservés.</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
