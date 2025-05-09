<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Votre email</title>
    <style type="text/css">
        body { margin: 0; padding: 0; min-width: 100%; font-family: Arial, sans-serif; line-height: 1.4; color: #333; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        .email-container { width: 100%; max-width: 600px; margin: 0 auto; }
        .email-content { padding: 20px; font-size: 16px; line-height: 1.5; }
        .button { display: inline-block; padding: 12px 24px; background-color: #007bff; color: #fff !important; text-decoration: none; border-radius: 4px; font-weight: bold; }
        img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; max-width: 100%; }
        @media screen and (max-width: 600px) {
            .email-container { width: 100% !important; }
            .email-content { padding: 15px !important; font-size: 14px !important; }
            .button { width: 100% !important; text-align: center !important; }
        }
        .ExternalClass { width: 100%; }
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
    </style>
</head>
<body>
<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;">
    <tr>
        <td bgcolor="#ffffff" class="email-container">
            <table role="presentation" width="100%">
                <tr>
                    <td style="padding: 20px; text-align: center; background-color:rgb(255, 255, 255);">
                        <img src="https://i.imgur.com/6YRpoqd.png" width="250" alt="Logo" style="height: auto; display: block; margin: 0 auto;" />
                    </td>
                </tr>
            </table>

            <table role="presentation" width="100%">
                <tr>
                    <td class="email-content">
                        <h1 style="margin-top: 0; color: #007bff;">Bonjour {{ $name }},</h1>
                        <p>Merci pour votre message ! Voici un récapitulatif :</p>
                        <p><strong>Email :</strong> {{ $email }}</p>
                        <p><strong>Sujet :</strong> {{ $subject }}</p>
                        <p><strong>Message :</strong><br>{!! nl2br(e($userMessage)) !!}</p>
                        
                        <table role="presentation" align="center" style="margin: 20px auto;">
                            <tr>
                                <td style="border-radius: 4px; background: #007bff;">
                                    <a href="mailto:{{ $email }}" class="button">Répondre à {{ $name }}</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table role="presentation" width="100%">
                <tr>
                    <td style="padding: 20px; text-align: center; background-color: #f8f9fa; font-size: 14px;">
                        <p style="margin: 0;">&copy; 2025 Locadar. Tous droits réservés.</p>
                        <p style="margin: 10px 0 0;">
                            <a href="#" style="color: #007bff; text-decoration: none;">Confidentialité</a> |
                            <a href="#" style="color: #007bff; text-decoration: none;">Conditions</a> |
                            <a href="#" style="color: #007bff; text-decoration: none;">Désabonnement</a>
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
