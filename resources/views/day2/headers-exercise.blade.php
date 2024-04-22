<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Headers Exercise</title>
</head>

<body>
	<h1 id="exercise-applying-headers">Exercise: Applying headers</h1>
	<h2 id="part-1-create-your-middleware">Part 1: Create your middleware</h2>
	<ol>
		<li>
			<p>Create the middleware file:</p>
			<pre><code class="lang-bash"><span class="hljs-selector-tag">php</span> <span class="hljs-selector-tag">artisan</span> <span class="hljs-selector-tag">make</span><span class="hljs-selector-pseudo">:middleware</span> <span class="hljs-selector-tag">SecurityHeaders</span>
</code></pre>
		</li>
		<li>
			<p>Set an example middleware to check it works:</p>
			<pre><code class="lang-php"><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">handle</span><span class="hljs-params">($request, Closure $next)</span>
</span>{
 $response = $next($request);
 $response-&gt;headers-&gt;set(<span class="hljs-string">'x-test-header'</span>, <span class="hljs-string">"This is a test"</span>);
 <span class="hljs-keyword">return</span> $response;
}
</code></pre>
		</li>
		<li>
			<p>In <code>bootstrap/app.php</code> add the middleware in the <code>withMiddleware</code> section (make sure you include the file at the top):</p>
			<pre><code class="lang-php">-&gt;withMiddleware(<span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-params">(Middleware $middleware)</span> </span>{
 $middleware-&gt;append(\App\Http\Middleware\SecurityHeaders::class);
})
</code></pre>
		</li>
		<li>
			<p>Access a page on the site and confirm the test header appears in the response.</p>
		</li>
		<li>Go to <code>/day2/headers</code> - this is the page you’ll refresh as you add/remove different headers to explore the effects.</li>
	</ol>
	<h2 id="part-2-running-scenarios">Part 2: Running Scenarios</h2>
	<h3 id="scenario-1-content-security-policy-csp-">Scenario 1: Content Security Policy (CSP)</h3>
	<ol>
		<li>Add a strict CSP header in their Laravel middleware:
			<pre><code class="lang-php">$<span class="hljs-function"><span class="hljs-title">response</span>-&gt;</span><span class="hljs-function"><span class="hljs-title">headers</span>-&gt;</span>set(<span class="hljs-string">'Content-Security-Policy'</span>, <span class="hljs-string">"default-src 'self'; script-src 'self';"</span>);
</code></pre>
		</li>
		<li>Before you refresh the page, can you predict what will have happened? Refresh and check.</li>
		<li>What has changed? Why? How would you explain it?</li>
		<li>How could you update this CSP to allow for the different broken elements to work?</li>
	</ol>
	<h3 id="scenario-2-x-content-type-options-breaks-style-and-script-loading">Scenario 2: X-Content-Type-Options Breaks Style and Script Loading</h3>
	<p><strong>Objective</strong>: Illustrate how the <code>X-Content-Type-Options: nosniff</code> header can cause issues when the server mislabels or ambiguously labels content types.</p>
	<p>Most modern browsers now check for a mismatch between MIME type for CSS and JS files. But this header is worth setting for older browsers.</p>
	<p><strong>Exercise</strong>:</p>
	<ol>
		<li>Find the controller called <code>StaticFileController</code> and change the mime type to <code>text/plain</code>. </li>
		<li>Refresh the page - has it lost it’s styling? If it has that’s because of the browser.</li>
		<li>Add the following header to your page:
			<pre><code class="lang-php">$<span class="hljs-function"><span class="hljs-title">response</span>-&gt;</span><span class="hljs-function"><span class="hljs-title">headers</span>-&gt;</span>set(<span class="hljs-string">'X-Content-Type-Options'</span>, <span class="hljs-string">'nosniff'</span>);
</code></pre>
		</li>
		<li>If you had styling in step 2, when you refresh the page that should now be gone. Check the headers of the page and the css file to confirm the content-type and mime type are set.</li>
		<li>In the <code>StaticFileController</code> revert the file type and refresh the page - confirming our styling is back.</li>
	</ol>
	<h3 id="scenario-3-removing-telling-headers">Scenario 3: Removing “telling” headers</h3>
	<p>When frameworks are in their default mode, they occasionally tell too much information to the end user. It is a good practice to remove anything that might give a malicious user more information than they need.</p>
	<ol>
		<li>Look at the headers of a the page and identify any potentially compromising header.</li>
		<li>Use <code>$response-&gt;headers-&gt;remove()</code> to remove them.</li>
		<li>Refresh the page to ensure they are gone.</li>
	</ol>
	<h3 id="scenario-4-enhancing-privacy-and-security-for-a-user-account-management-page">Scenario 4: Enhancing Privacy and Security for a User Account Management Page</h3>
	<p><strong>Objective</strong>: Improve the privacy and security of a web application&#39;s user account management page, where sensitive information such as personal data and password changes occur.</p>
	<h4 id="situation-">Situation:</h4>
	<p>You are tasked with securing the user account management page of a web application. This page allows users to update their personal information, change their password, and review their activity logs. Given the sensitivity of the data handled on this page, it is crucial to implement stringent security measures to prevent data leakage and enhance user privacy.</p>
	<h4 id="tasks-">Tasks:</h4>
	<ol>
		<li><strong>Implement HTTPS Only</strong>: Ensure that all data transmitted between the client and server is encrypted and that HTTP traffic is redirected to HTTPS.</li>
		<li><strong>Prevent Clickjacking Attacks</strong>: Protect the page from being embedded in frames or iframes from different origins to prevent clickjacking.</li>
		<li><strong>Control Content Loading</strong>: Restrict the sources from which scripts, styles, and other resources can be loaded to reduce the risk of XSS attacks.</li>
		<li><strong>Restrict Information Leakage via Referrers</strong>: Configure the page to minimize the amount of referrer data sent when navigating to external links.</li>
	</ol>
	<h4 id="required-headers-">Required Headers:</h4>
	<ul>
		<li><strong>Strict-Transport-Security (HSTS)</strong>: Configure this header to enforce secure connections to the server.</li>
		<li><strong>X-Frame-Options</strong>: Use this header to prevent the page from being displayed in a frame from different origins.</li>
		<li><strong>Content-Security-Policy (CSP)</strong>: Define a strict policy that limits sources for scripts, styles, and other resources and perhaps disallows inline scripts and styles.</li>
		<li><strong>Referrer-Policy</strong>: Set this header to limit the amount of referrer information that can be passed on to other websites.</li>
	</ul>
	<details>
		<summary>Exercise Solution:</summary>
		1. <strong>Implement the Headers</strong>: Add the necessary headers to the middleware you created in earlier exercises. Example implementation for each header:
		<code>php
			$response-&gt;headers-&gt;set(&#39;Strict-Transport-Security&#39;, &#39;max-age=63072000; includeSubDomains; preload&#39;);
			$response-&gt;headers-&gt;set(&#39;X-Frame-Options&#39;, &#39;DENY&#39;);
			$response-&gt;headers-&gt;set(&#39;Content-Security-Policy&#39;, &quot;default-src &#39;self&#39;; img-src &#39;self&#39; https://trusted.cdn.com; script-src &#39;self&#39;; style-src &#39;self&#39;;&quot;);
			$response-&gt;headers-&gt;set(&#39;Referrer-Policy&#39;, &#39;no-referrer-when-downgrade&#39;);</code>
		2. <strong>Test Your Configuration</strong>: Access the page and use browser developer tools to inspect the headers. Ensure they are correctly set and assess any impact they have on the page functionality.
		3. <strong>Analyze and Reflect</strong>: Answer the following questions:
		- How do these headers improve the security and privacy of the user account management page?
		- Were there any challenges in implementing any of these headers? How did you resolve them?
		- What would be the potential consequences of not implementing these headers on this particular page?
	</details>
</body>

</html>