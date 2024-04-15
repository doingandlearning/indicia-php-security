<x-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Day 1</h1>
        <h2 class="underline text-lg">Examples</h2>
        <h3>Input Validation</h3>
        <div class="border rounded shadow p-4 my-2">
            <p>Beware the user - valid the input!</p>
            <ul>
                <li><a href="/day1/input-validation" class="text-blue-500">Query parameters</a></li>
                <li><a href="/day1/buy" class="text-blue-500">Hidden form fields</a></li>
            </ul>
        </div>
        <div class="border rounded shadow p-4  my-2">

            <p>Is there any data?</p>
            <ul>
                <li>isset()</li>
                <li>?? operator</li>
                <li>is_*() - beware is_int(), leverage is_string()</li>
            </ul>
        </div>
        <div class="border rounded shadow p-4 my-2">
            <p>Searching strings</p>
            <ul>
                <li>strpos()</li>
                <li>stripos()</li>
                <li>strrpos()</li>
                <li>strripos()</li>
            </ul>
        </div>
        <div class="border rounded shadow p-4 my-2">
            <p>Searching patterns</p>
            <ul>
                <li>Regular expressions</li>
            </ul>
        </div>
        <div class="border rounded shadow p-4 my-2">

            <p>ctype extension</p>
            <ul>
                <li>ctype_alnum()</li>
                <li>ctype_alpha()</li>
                <li>ctype_digit()</li>
                <li>ctype_lower()</li>
                <li>ctype_upper()</li>
            </ul>
        </div>
        <div class="border rounded shadow p-4 my-2">
            <p>Filter</p>
            <ul>
                <li><a href="https://www.php.net/manual/en/book.filter.php" target="_blank">PHP manual page</a></li>
                <li>Activated by default since 5.2</li>
                <li>Validate or sanitize a variable</li>
                <li>Use options</li>
                <li>Check whether and input is set
                <li>

            </ul>
        </div>
        <div class="border rounded shadow p-4 my-2">
            <p>PHP 7+ Type Declarations</p>
            <ul>
                <li>Use strict_types where you can</li>
                <li>declare(strict_types=1);</li>
            </ul>
        </div>
        <hr />

        <h2 class="underline text-lg">Shop</h2>
        <ul>
            <li><a href="{{ route('shop.index') }}" class="text-blue-500">Shop</a></li>
        </ul>

        <h2 class="underline text-lg">Challenges</h2>

        <p>These challenges are all around Cross Site Scripting (XSS). As developers, we may have left some of our
            code
            vulnerable and for these challenges you are placing yourself in the position of the attacker.</p>
        <p>Work through the exercises. I've left some hints and some possible solutions. If you get stuck, feel free
            to
            reach out to me.</p>
        <p>When you're dealing with form submissions, refreshing the page isn't always helpful. Each page has a link
            to
            reset the form.</p>
        <ul>
            <li><a href="{{ route('day1.warmup') }}" class="text-blue-500">Warm Up</a></li>
            <li><a href="{{ route('day1.challenge1') }}" class="text-blue-500">Challenge 1</a></li>
            <li><a href="{{ route('day1.challenge2') }}" class="text-blue-500">Challenge 2</a></li>
            <li><a href="{{ route('day1.challenge3') }}" class="text-blue-500">Challenge 3</a></li>
            <li><a href="{{ route('day1.challenge4') }}" class="text-blue-500">Challenge 4</a></li>
            <li><a href="{{ route('day1.challenge5') }}" class="text-blue-500">Challenge 5</a></li>
            <li><a href="{{ route('day1.challenge6') }}" class="text-blue-500">Challenge 6</a></li>
        </ul>
    </div>
</x-layout>
