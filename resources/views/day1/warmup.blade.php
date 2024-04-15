<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Warm up</title>
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

    <h1>Warmup Objectives</h1>
    <p>Using only basic Javascript, pop up an alert() box or write to the console.log().</p>
    <p>Check you can see the alert / console message before proceeding.</p>

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
