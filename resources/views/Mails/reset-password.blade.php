<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Email</title>
</head>
<body style="font-family: Arial, Helvetica,Sans-serif; font-size:16px;">
<p>Hello, {{ $formData['user']->name}}</p>
<h1>you have requested to change password</h1>
<p> Please click the link given below to reset password</p>

<a href="{{ route('Mails.resetPassword',$formData['token'])}}">Click Here</a>
    <p>Thanks</p>
</body>
</html>