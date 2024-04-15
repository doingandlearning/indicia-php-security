<?php
function is_url($s)
{
	if (!strpos($s, 'http://')) { //strpos($s, 'http://') === false
		return "Not a URL";
	} else {
		return "Is a URL";
	}
}

// Test the function
echo is_url('http://www.google.com') . "\n"; // true 

function better_is_url($s)
{
	if (strpos($s, 'http://') === false) { //strpos($s, 'http://') === false
		return "Not a URL";
	} else {
		return "Is a URL";
	}
}

// Test the function
echo better_is_url('http://www.google.com') . "\n"; // true 

