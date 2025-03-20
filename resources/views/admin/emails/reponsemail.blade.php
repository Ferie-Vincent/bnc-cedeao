<!-- resources/views/emails/reply.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponse à un e-mail</title>
</head>
<body>
    <div style="background-color: #f0f0f0; padding: 20px;">
        <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
            <h1>Réponse à un e-mail</h1>
            <p><strong>Sujet :</strong> {{ $subject }}</p>
            <hr>
            <p><strong>Message :</strong></p>
            <p>{!! $contenue !!}</p>
            <hr>
            <p>Merci de nous avoir contactés.</p>
        </div>
    </div>
</body>
</html>
