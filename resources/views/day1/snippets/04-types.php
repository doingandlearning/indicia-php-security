<?php

declare(strict_types=1);
function add(int $a, int $b): int
{
	return $a + $b;
}

$three = add('1', 2);

echo $three;