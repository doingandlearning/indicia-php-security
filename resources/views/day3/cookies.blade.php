<x-layout>
	<div class="prose p-8">
		<h3 id="exercise-cookie-security-scenario-analysis">Exercise: Cookie Security Scenario Analysis</h3>
		<h4 id="objective-">Objective:</h4>
		<p>Assess and enhance your understanding of cookie attributes and their security implications.</p>
		<h4 id="instructions-">Instructions:</h4>
		<p>Given the following scenarios, decide whether the cookie configuration is secure or insecure. Explain your reasoning based on the attributes used. Use your knowledge from the segment above to justify your answers.</p>
		<ol>
			<li>
				<p><strong>Scenario A</strong>: A web application sets a session cookie with the following attributes: <code>Secure; HttpOnly; SameSite=Strict</code>. The application is accessible only via HTTPS.</p>
			</li>
			<li>
				<p><strong>Scenario B</strong>: An application on <code>example.com</code> sets a cookie with <code>Domain=example.com; Secure; HttpOnly</code>. The application includes subdomains that are partially managed by external vendors.</p>
			</li>
			<li>
				<p><strong>Scenario C</strong>: A website sets a cookie with <code>HttpOnly; Path=/admin; Secure</code> but does not specify the <code>SameSite</code> attribute, and the site is served over HTTPS.</p>
			</li>
			<li>
				<p><strong>Scenario D</strong>: An e-commerce site sets a session cookie without the <code>Secure</code> or <code>HttpOnly</code> attributes because it needs to support mixed content (HTTP and HTTPS).</p>
			</li>
			<li>
				<p><strong>Scenario E</strong>: A new web application uses a cookie with <code>Secure; HttpOnly; SameSite=Lax</code> and also includes the <code>__Host-</code> prefix in the cookie name.</p>
			</li>
		</ol>
		<h4 id="task-" class="font-bold">Task:</h4>
		<p>For each scenario:</p>
		<ul>
			<li>State if the configuration is secure or insecure.</li>
			<li>Explain why the configuration is adequate or what could be improved.</li>
			<li>Suggest any changes necessary to enhance security based on best practices mentioned in the cookie security guide.</li>
		</ul>


</x-layout>