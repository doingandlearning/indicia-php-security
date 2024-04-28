<x-layout>
	<div class="prose mx-auto p-8">
		<a href="https://gist.github.com/doingandlearning/58a2a3cdc4acd6fac7804f7dd1b94c57">View on GitHub</a>
		<p>You are starting with /day3/users - a basic CRUD application, and making it more GDPR compliant.</p>
		<h2 id="setup">Setup</h2>
		<ul>
			<li>Make sure you’ve run <code>php artisan migrate</code> before you start</li>
		</ul>
		<h2 id="relevant-files-">Relevant files:</h2>
		<ul>
			<li>Models/ProfileUser</li>
			<li>Controllers/ProfileUserController</li>
			<li>views/users/*</li>
			<li>routes/web.php</li>
		</ul>
		<h3 id="1-implement-data-encryption-">1. <strong>Implement Data Encryption</strong></h3>
		<p><strong>Objective:</strong> Encrypt sensitive user data before storing it in the database.</p>
		<p><strong>Instructions:</strong></p>
		<ol>
			<li>Modify the <code>ProfileUser</code> model to automatically encrypt and decrypt sensitive fields such as the <code>email</code> and <code>dob</code> (date of birth).</li>
		</ol>
		<pre><code class="lang-php"><span class="hljs-keyword">namespace</span> <span class="hljs-title">App</span>\<span class="hljs-title">Models</span>;

<span class="hljs-keyword">use</span> <span class="hljs-title">Illuminate</span>\<span class="hljs-title">Database</span>\<span class="hljs-title">Eloquent</span>\<span class="hljs-title">Model</span>;
<span class="hljs-keyword">use</span> <span class="hljs-title">Illuminate</span>\<span class="hljs-title">Support</span>\<span class="hljs-title">Facades</span>\<span class="hljs-title">Crypt</span>;

<span class="hljs-class"><span class="hljs-keyword">class</span> <span class="hljs-title">ProfileUser</span> <span class="hljs-keyword">extends</span> <span class="hljs-title">Model</span>
</span>{
<span class="hljs-keyword">protected</span> $fillable = [<span class="hljs-string">'name'</span>, <span class="hljs-string">'email'</span>, <span class="hljs-string">'dob'</span>, <span class="hljs-string">'password'</span>, <span class="hljs-string">'consent_given'</span>];

<span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">getEmailAttribute</span><span class="hljs-params">($value)</span>
</span>{
<span class="hljs-keyword">return</span> Crypt::decryptString($value);
}

<span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">setEmailAttribute</span><span class="hljs-params">($value)</span>
</span>{
<span class="hljs-keyword">$this</span>-&gt;attributes[<span class="hljs-string">'email'</span>] = Crypt::encryptString($value);
}

<span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">getDobAttribute</span><span class="hljs-params">($value)</span>
</span>{
<span class="hljs-keyword">return</span> $value ? Crypt::decryptString($value) : <span class="hljs-keyword">null</span>;
}

<span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">setDobAttribute</span><span class="hljs-params">($value)</span>
</span>{
<span class="hljs-keyword">$this</span>-&gt;attributes[<span class="hljs-string">'dob'</span>] = $value ? Crypt::encryptString($value) : <span class="hljs-keyword">null</span>;
}
}
</code></pre>
		<h3 id="2-consent-management-">2. <strong>Consent Management</strong></h3>
		<p><strong>Objective:</strong> Implement functionality to record explicit user consent.</p>
		<p><strong>Instructions:</strong></p>
		<ol>
			<li>Update the user creation and edit forms to include a consent checkbox.</li>
		</ol>
		<pre><code class="lang-blade"><span class="xml"><span class="hljs-comment">&lt;!-- Add to create.blade.php and edit.blade.php --&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"form-group"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">label</span> <span class="hljs-attr">for</span>=<span class="hljs-string">"consent_given"</span>&gt;</span>Consent to Data Processing:<span class="hljs-tag">&lt;/<span class="hljs-name">label</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">input</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"checkbox"</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"consent_given"</span> <span class="hljs-attr">name</span>=<span class="hljs-string">"consent_given"</span> </span></span><span class="hljs-template-variable">{`{ $user-&gt;consent_given ? 'checked' : '' }}</span><span class="xml"><span class="hljs-tag">&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span></span>
</code></pre>
		<ol>
			<li>Update the <code>ProfileUser</code> model to handle the consent status.</li>
		</ol>
		<pre><code class="lang-php"><span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">setConsentGivenAttribute</span><span class="hljs-params">($value)</span>
</span>{
<span class="hljs-keyword">$this</span>-&gt;attributes[<span class="hljs-string">'consent_given'</span>] = $value ? <span class="hljs-keyword">true</span> : <span class="hljs-keyword">false</span>;
}
</code></pre>
		<h3 id="3-access-to-personal-data-">3. <strong>Access to Personal Data</strong></h3>
		<p><strong>Objective:</strong> Enable users to view all their data.</p>
		<p><strong>Instructions:</strong></p>
		<ol>
			<li>Add a route and controller method to generate a user data report.</li>
		</ol>
		<pre><code class="lang-php"><span class="hljs-comment">// routes/web.php</span>
Route::get(<span class="hljs-string">'users/{user}/data'</span>, [ProfileUserController::class, <span class="hljs-string">'userData'</span>])-&gt;name(<span class="hljs-string">'users.data'</span>);

<span class="hljs-comment">// ProfileUserController</span>
<span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">userData</span><span class="hljs-params">(ProfileUser $user)</span>
</span>{
<span class="hljs-keyword">return</span> response()-&gt;json($user);
}
</code></pre>
		<h3 id="4-data-correction-and-update-">4. <strong>Data Correction and Update</strong></h3>
		<p><strong>Objective:</strong> Provide users with the ability to update all their data.</p>
		<p><strong>Instructions:</strong></p>
		<ol>
			<li>Ensure all personal data fields are included in the edit form and properly handled in the update method of your controller.</li>
		</ol>
		<pre><code class="lang-php"><span class="hljs-comment">// Ensure 'dob' and 'consent_given' are included in the form and update handling.</span>
<span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">update</span><span class="hljs-params">(Request $request, ProfileUser $user)</span>
</span>{
$validated = $request-&gt;validate([
<span class="hljs-string">'name'</span> =&gt; <span class="hljs-string">'required|string|max:255'</span>,
<span class="hljs-string">'email'</span> =&gt; <span class="hljs-string">'required|string|email|max:255|unique:users,email,'</span> . $user-&gt;id,
<span class="hljs-string">'dob'</span> =&gt; <span class="hljs-string">'nullable|date'</span>,
<span class="hljs-string">'consent_given'</span> =&gt; <span class="hljs-string">'sometimes|accepted'</span>
]);

$user-&gt;update($validated);
<span class="hljs-keyword">return</span> redirect()-&gt;route(<span class="hljs-string">'users.show'</span>, $user);
}
</code></pre>
		<h3 id="5-right-to-be-forgotten-">5. <strong>Right to Be Forgotten</strong></h3>
		<p><strong>Objective:</strong> Allow users to delete their account and data.</p>
		<p><strong>Instructions:</strong></p>
		<ol>
			<li>Add a delete button in the user profile view.</li>
		</ol>
		<pre><code class="lang-blade"><span class="xml"><span class="hljs-comment">&lt;!-- Add to show.blade.php --&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">form</span> <span class="hljs-attr">action</span>=<span class="hljs-string">"</span></span></span><span class="hljs-template-variable">{`{ route('users.destroy', $user) }}</span><span class="xml"><span class="hljs-tag"><span class="hljs-string">"</span> <span class="hljs-attr">method</span>=<span class="hljs-string">"POST"</span>&gt;</span>
    @csrf
    @method('DELETE')
    <span class="hljs-tag">&lt;<span class="hljs-name">button</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"submit"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"btn btn-danger"</span>&gt;</span>Delete My Account<span class="hljs-tag">&lt;/<span class="hljs-name">button</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">form</span>&gt;</span></span>
</code></pre>
		<h3 id="6-data-portability-">6. <strong>Data Portability</strong></h3>
		<p><strong>Objective:</strong> Allow users to download their data in a structured format.</p>
		<p><strong>Instructions:</strong></p>
		<ol>
			<li>Add a controller method and route to export user data.</li>
		</ol>
		<pre><code class="lang-php"><span class="hljs-comment">// routes/web.php</span>
Route::get(<span class="hljs-string">'users/{user}/export'</span>, [ProfileUserController::class, <span class="hljs-string">'export'</span>])-&gt;name(<span class="hljs-string">'users.export'</span>);

<span class="hljs-comment">// ProfileUserController</span>
<span class="hljs-keyword">public</span> <span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">export</span><span class="hljs-params">(ProfileUser $user)</span>
</span>{
$jsonData = $user-&gt;toJson();
<span class="hljs-keyword">return</span> response($jsonData, <span class="hljs-number">200</span>, [
<span class="hljs-string">'Content-Type'</span> =&gt; <span class="hljs-string">'application/json'</span>,
<span class="hljs-string">'Content-Disposition'</span> =&gt; <span class="hljs-string">'attachment; filename="user_'</span> . $user-&gt;id . <span class="hljs-string">'_data.json"'</span>,
]);
}
</code></pre>
		<h3 id="7-logging-and-monitoring-">7. <strong>Logging and Monitoring</strong></h3>
		<p><strong>Objective:</strong> Log any access to or modification of user data.</p>
		<p><strong>Instructions:</strong></p>
		<ol>
			<li>Implement event-based logging in your controller methods.</li>
		</ol>
		<p>```php
			use Illuminate\Support\Facades\Log;</p>
		<p>public function update(Request $request, ProfileUser $user)
			{
			Log::info(&#39;User data updated&#39;, [&#39;user_id&#39; =&gt; $user-&gt;id]);
			// Update handling
			}</p>
		<p>public function destroy</p>

	</div>
</x-layout>