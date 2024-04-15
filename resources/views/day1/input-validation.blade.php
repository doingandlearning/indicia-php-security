<!DOCTYPE html>
<html>

<head>
    <title>Email Form</title>
    <style>
        /* Add your custom styles here */
    </style>
</head>

<body>
    <h1>Send Email</h1>
    <p>Send email to: {{ request()->query('email') }}</p>

    <form action="/send-email" method="post">
        @csrf
        <textarea name="message" rows="5" cols="50"></textarea>
        <br>
        <button type="submit">Send Mail</button>
    </form>
</body>

</html>
