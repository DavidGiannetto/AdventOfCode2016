<?php

$location = ['x' => 0, 'y' => 2];

$buttons = [
	[null,null,'1',null,null],
	[null,'2','3','4',null],
	['5','6','7','8','9'],
	[null,'A','B','C',null],
	[null,null,'D',null,null],
];

$code = '';
$inputFile = fopen('input.txt', 'r');

while ($line = fgets($inputFile)) {
	$line = str_split($line);
	foreach ($line as $direction) {
		switch ($direction) {
			case 'U':
				if (!is_null($buttons[max(($location['y'] - 1), 0)][$location['x']])) {
					$location['y'] = max(($location['y'] - 1), 0);
				}
				break;
			case 'D':
				if (!is_null($buttons[min(($location['y'] + 1), 4)][$location['x']])) {
					$location['y'] = min(($location['y'] + 1), 4);
				}
				break;
			case 'L':
				if (!is_null($buttons[$location['y']][max(($location['x'] - 1), 0)])) {
					$location['x'] = max(($location['x'] - 1), 0);
				}
				break;
			case 'R':
				if (!is_null($buttons[$location['y']][min(($location['x'] + 1), 4)])) {
					$location['x'] = min(($location['x'] + 1), 4);
				}
				break;
			default:
				break;
		}
	}

	$code .= $buttons[$location['y']][$location['x']];
	var_dump($location);
}

echo "The Bathroom Code is: " . $code;