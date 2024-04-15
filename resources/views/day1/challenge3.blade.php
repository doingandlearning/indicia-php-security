<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Challenge 3</title>
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

    <h1>Strip Tags</h1>
    <p>Up until now we've had our payloads output directly onto the page without any escaping. However, it is quite
        common to come across incomplete escaping, where the dev has added something like strip_tags() and assumed
        that'll cover everything.</p>

    <ul>
        <li>Send the value of document.cookie to GET
            https://3e36-51-52-158-78.ngrok-free.app/xss/three?cookie=COOKIE_PAYLOAD&name=YOUR_NAME.</li>
    </ul>

    <details>
        <summary>Hint 1</summary>
        <p>Try to find a way to bypass the strip_tags() function. Attributes are the way</p>
    </details>
    <details>
        <summary>Hint 2</summary>
        <p>You should be able to use the previous payload in a supported attribute. Be careful of quotes.</p>
    </details>
    <details>
        <summary>Hint 3</summary>
        <p>Maybe onfocus?</p>
    </details>
    <form method="POST">
        @csrf
        <p>Search:</p>
        <div>
            <input type="text" name="search" id="search" style="width: 95%" placeholder="Search term"
                value="{!! strip_tags(request()->get('search')) !!}" />
        </div>
        <p><button type="submit">Search!</button></p>
    </form>

</body>

</html>
