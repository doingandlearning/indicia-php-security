<x-layout>
	<div class="m-8 border border-3 border-black p-4">

		<h1 class="my-3">A cliche login page - <a href="/day2/login" target="_blank">/day2/login</a></h1>
		<section>
			<h2>Part 1: Exploiting the SQL Injection</h2>
			<p>This exercise demonstrates how to exploit a SQL Injection vulnerability in a Laravel application's login form.</p>
			<h3>Instructions for Exploitation:</h3>
			<ol>
				<li>Go to the login page at <a href="/day2/login" target="_blank">/day2/login</a>.</li>
				<li>In the username field, enter: <code>' OR '1'='1</code></li>
				<li>The password field should match the first user in the DB (password).</li>
				<li>Submit the form.</li>
			</ol>
			<p><strong>What this does:</strong> The SQL query constructed by the controller will become: </p>
			<pre>SELECT * FROM users WHERE email = '' OR '1'='1'</pre>
			<p>This query will always return true, thus bypassing authentication and potentially returning the first user in the database if multiple records are fetched.</p>
		</section>
		<section>
			<h2>Part 2: Defending Against SQL Injection</h2>
			<p>Now we'll learn how to secure our application against SQL injections.</p>
			<h3>Security Best Practices:</h3>
			<ol>
				<li><strong>Use Prepared Statements:</strong> Instead of directly inserting user inputs into SQL queries.</li>
				<li><strong>Escaping Inputs:</strong> While Laravel automatically escapes outputs when using Eloquent or the Query Builder, always ensure inputs are escaped if using raw SQL.</li>
				<li><strong>Limit Database Permissions:</strong> Ensure that the database user connected to your application has minimal necessary permissions.</li>
			</ol>
			<h3>Example of a Secure Implementation:</h3>
			<p>Modify the existing controller method to use parameterized queries:</p>
			<pre>
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Secure SQL Query using Query Builder
        $user = DB::table('users')->where('email', '=', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }

        return "Invalid credentials!";
    }
}
        </pre>
			<p>This modification uses Laravel's Query Builder, which automatically uses prepared statements, thereby preventing SQL injection.</p>
		</section>

	</div>
	<div class="m-8 border border-3 border-black p-4">

		<h1 class="my-3">Route: <a href="/day2/search" target="_blank">/day2/search</a></h1>
		<h2>Setup</h2>
		<ul>
			<li>Make sure you've run:
				<pre>php artisan migrate</pre> and
				<pre>php artisan db:seed</pre>
			</li>
			<li>Have a look at the controller (MembersControlle) and view (day2/search.blade.php) in question and see if you can see the problem before you start</li>
		</ul>
		<h2>Part 1: Red Team (Exploitation)</h2>
		<p class="font-bold">Task: Exploit the SQL injection vulnerability in the search form to access all members&#39; data, bypassing the tenant and public filters.</p>
		<h3>Instructions:</h3>
		<ul>
			<li>Access the search form at /day2/search.</li>
			<li>Experiment by injecting SQL code into the search input to modify the query. Try inputs that can end the current query and append a condition that is always true. For example, using
				<pre>%' OR '1'='1</pre>
			</li>
			<li>Observe how the application responds. Your goal is to display records that should not be accessible according to the original query constraints (public = 1 and specific tenant_id).</li>
		</ul>
		<h2>Part 2: Green Team (Defense)</h2>
		<p class="font-bold">Task: Secure the search functionality to prevent SQL injection.</p>
		<h3>Instructions:</h3>
		<ul>
			<li>Modify the controller&#39;s query in the MembersController to use prepared statements or parameterized queries.</li>
			<li>Implement input validation to reject suspicious or malformed inputs.</li>
			<li>Test the security of the updated search form by repeating the Red Team&#39;s exploitation attempt.</li>
			<li>Ensure that the modified code does not allow unauthorized data access and handles malicious inputs gracefully.</li>
		</ul>
		<h3>Example Code Correction</h3>
		Replace the vulnerable SQL query in your controller with:</p>
		<pre>
$query = "SELECT tenant_id, name, public FROM members WHERE name LIKE ? AND public = 1";
$members = DB::select($query, ["%$search%"]);
</pre>

		<p>This example uses parameterized queries to prevent SQL injection by separating data (user input) from the code (SQL query).</p>
	</div>

	<div class="m-8 border border-3 border-black p-4">
		<h1 class="my-3">Route: <a href="/day2/search" target="_blank">/day2/search</a></h1>
		<p>Note: if you've already fixed the "MemberController", you might want to revert it to handle this
		</p>
		<h2>Part 1: Union-Based SQL Injection Attack</h2>
		<p class="font-bold">Task: Exploit the SQL injection vulnerability to perform a UNION attack that retrieves sensitive information from an unrelated table (payments).</p>

		<h3>Instructions:</h3>
		<ul>
			<li><strong>Initial Test:</strong> Access the endpoint normally by searching for a member name to confirm the form’s functionality, e.g., use "Alice".</li>
			<li><strong>Union Attack:</strong> Craft a malicious SQL injection that uses a UNION statement to append data from the 'payments' table. For example, modify the search input to:
				<code>' UNION SELECT NULL, card_number, NULL FROM payments -- </code>
				This payload assumes 'payments' table has columns 'card_number', which match the types expected in the original query.
			</li>
			<li><strong>Observe:</strong> Check if the response includes payment data. This indicates that the database is processing the UNION query, merging member and payment information.</li>
		</ul>

		<h2>Part 2: Mitigating the Attack</h2>
		<p class="font-bold">Task: Implement security measures to prevent UNION-based SQL injection attacks.</p>

		<h3>Instructions:</h3>
		<ul>
			<li><strong>Parameterize Queries:</strong> Update the vulnerable SQL query to use parameterized queries, which safely separate data from the command. For example:
				<pre>DB::select('SELECT tenant_id, name, public FROM members WHERE name LIKE ? AND public = 1', ["%{$search}%"]);</pre>
			</li>
			<li><strong>Validate Input:</strong> Add input validation to reject SQL control characters and keywords that could alter the query’s structure.</li>
		</ul>
	</div>


	<div class="m-8 border border-3 border-black p-4">
		<h1 class="my-3">Route: <a href="/day2/error-sql" target="_blank">/day2/error-sql</a></h1>
		<h2>Part 1: Validate Normal Functionality</h2>
		<p class="font-bold">Task: Verify that the application returns expected results for valid and invalid inputs without SQL manipulation.</p>

		<h3>Instructions:</h3>

		<ul>
			<li>Valid Input Test: Access the endpoint by appending a known valid code to the URL: /day2/error-sql?code=123456.</li>
			<li>Expect the application to return a JSON response with data from the codes table where enabled = 1 and the code matches 123456.</li>
			<li>Invalid Input Test: Access the endpoint with a non-active: /day2/error-sql?code=abcdef.</li>
			<li>Since no record matches this code with enabled = 1, expect a JSON response indicating no results, such as an empty array or null.</li>
		</ul>
		<h2>Part 2: Trigger and Analyze SQL Error</h2>
		<p class="font-bold">Task: Manipulate the input to break the SQL query and cause the application to return an error message, which will be used to gather information about the database schema or SQL query structure.</p>

		<h3>Instructions:</h3>

		<ul>
			<li>Trigger Error: Enter a malformed SQL query by inserting an SQL control character or statement. Example: /day2/error-sql?code=' AND (SELECT 1 FROM (SELECT COUNT(*),CONCAT((SELECT (SELECT CONCAT(CAST(COUNT(*) AS CHAR),0x7e,(SELECT DISTINCT(CONCAT(CAST(schema_name AS CHAR),0x7e,CAST(table_name AS CHAR))) FROM information_schema.tables WHERE table_schema=database() LIMIT 1)) FROM information_schema.tables LIMIT 1),FLOOR(RAND(0)*2))x FROM information_schema.tables GROUP BY x)a) AND '1'='1.</li>
			<li>This input aims to modify the SQL query logic. However, due to incorrect syntax or unexpected SQL structure, it may cause the database to throw an error.</li>
			<li>Analyze Error Messages: Examine the error message returned by the application. Look for details that indicate what went wrong with the SQL query. Common information might include:</li>
			<ul>
				<li>References to parts of the SQL syntax near where the error occurred.</li>
				<li>Mentions of specific database fields or tables, revealing details about the database structure.</li>
				<li>Data types or SQL command errors that provide clues about the correct syntax or expected inputs.</li>
			</ul>

			<h2>Part 3: Security Discussion (Green Team)</h2>
			<p class="font-bold">Task: Discuss and plan improvements to handle errors gracefully and prevent revealing sensitive information through error messages.</p>

			<h3>Instructions:</h3>

			<ul>
				<li>Update Error Handling: Modify the controller to catch exceptions and return a generic error message, preventing detailed SQL errors from being exposed:
					<pre>
} catch (\Exception $e) {
// Change to a generic error message
return response()->json(['error' => 'An error occurred. Please try again.'], 500);
}
			</pre>
				<li> Enhance Input Validation: Implement robust input validation to check for SQL meta-characters and other potentially harmful input patterns.</li>
			</ul>
	</div>
</x-layout>