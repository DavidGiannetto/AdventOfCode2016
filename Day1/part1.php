<?php

$heading = 'N';
$location = ['x' => 0, 'y' => 0];

$input = file_get_contents('input.txt');
$directions = explode(",", $input);

foreach ($directions as $direction) {
	$bearing = substr(trim($direction), 0, 1);
	$speed = substr(trim($direction), 1);

	switch ($heading) {
		case 'N':
			if ($bearing == "R") {
				$location['x'] += $speed;
				$heading = 'E';
			} elseif ($bearing == "L") {
				$location['x'] -= $speed;
				$heading = 'W';
			}
			break;
		case 'S':
			if ($bearing == "R") {
				$location['x'] -= $speed;
				$heading = 'W';
			} elseif ($bearing == "L") {
				$location['x'] += $speed;
				$heading = 'E';
			}
			break;
		case 'E':
			if ($bearing == "R") {
				$location['y'] -= $speed;
				$heading = 'S';
			} elseif ($bearing == "L") {
				$location['y'] += $speed;
				$heading = 'N';
			}
			break;
		case 'W':
			if ($bearing == "R") {
				$location['y'] += $speed;
				$heading = 'N';
			} elseif ($bearing == "L") {
				$location['y'] -= $speed;
				$heading = 'S';
			}
			break;
		default:
			break;
	}
}

echo "Easter Bunny HQ is " . (abs($location['y']) + abs($location['x'])) . " blocks away from the starting point.";

?>