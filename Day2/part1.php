<?php

$location = ['x' => 1, 'y' => 1];

$buttons = [
	[1,2,3],
	[4,5,6],
	[7,8,9],
];

$code = '';
$inputFile = fopen('input.txt', 'r');

while ($line = fgets($inputFile)) {
	$line = str_split($line);
	foreach ($line as $direction) {
		switch ($direction) {
			case 'U':
				$location['y'] = max(($location['y'] - 1), 0);
				break;
			case 'D':
				$location['y'] = min(($location['y'] + 1), 2);
				break;
			case 'L':
				$location['x'] = max(($location['x'] - 1), 0);
				break;
			case 'R':
				$location['x'] = min(($location['x'] + 1), 2);
				break;
			default:
				break;
		}
	}

	$code .= $buttons[$location['y']][$location['x']];
}

echo "The Bathroom Code is: " . $code;