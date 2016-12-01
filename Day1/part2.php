<?php

$heading = 'N';
$location = ['x' => 0, 'y' => 0];
$visitedLocations = [];
$found = false;

$input = file_get_contents('input.txt');
$directions = explode(",", $input);

foreach ($directions as $direction) {
	$newLocation = $location;
	$newlyVisitedLocations = [];
	$bearing = substr(trim($direction), 0, 1);
	$speed = substr(trim($direction), 1);

	switch ($heading) {
		case 'N':
			if ($bearing == "R") {
				$newLocation['x'] += $speed;
				$heading = 'E';
			} elseif ($bearing == "L") {
				$newLocation['x'] -= $speed;
				$heading = 'W';
			}
			break;
		case 'S':
			if ($bearing == "R") {
				$newLocation['x'] -= $speed;
				$heading = 'W';
			} elseif ($bearing == "L") {
				$newLocation['x'] += $speed;
				$heading = 'E';
			}
			break;
		case 'E':
			if ($bearing == "R") {
				$newLocation['y'] -= $speed;
				$heading = 'S';
			} elseif ($bearing == "L") {
				$newLocation['y'] += $speed;
				$heading = 'N';
			}
			break;
		case 'W':
			if ($bearing == "R") {
				$newLocation['y'] += $speed;
				$heading = 'N';
			} elseif ($bearing == "L") {
				$newLocation['y'] -= $speed;
				$heading = 'S';
			}
			break;
		default:
			break;
	}

	if ($heading == 'N') {
		for ($i = ($location['y'] + 1); $i <= $newLocation['y']; $i++) {
			$newlyVisitedLocations[] = ['x' => $newLocation['x'], 'y' => $i];
		}
	} elseif ($heading == 'S') {
		for ($i = $newLocation['y']; $i < $location['y']; $i++) {
			$newlyVisitedLocations[] = ['x' => $newLocation['x'], 'y' => $i];
		}
	} elseif ($heading == 'E') {
		for ($i = ($location['x'] + 1); $i <= $newLocation['x']; $i++) {
			$newlyVisitedLocations[] = ['x' => $i, 'y' => $newLocation['y']];
		}
	} elseif ($heading == 'W') {
		for ($i = $newLocation['x']; $i < $location['x']; $i++) {
			$newlyVisitedLocations[] = ['x' => $i, 'y' => $newLocation['y']];
		}
	}

	$location = $newLocation;

	foreach ($visitedLocations as $vl) {
		foreach ($newlyVisitedLocations as $nvl) {
			if ($vl['x'] == $nvl['x'] && $vl['y'] == $nvl['y']) {
				$found = true;
				$revisitedLocation = $vl;
			}
		}
	}
	
	$visitedLocations = array_merge($visitedLocations, $newlyVisitedLocations);
	if ($found) {
		break;
	}
}
var_dump($visitedLocations);
echo "Easter Bunny HQ is " . (abs($revisitedLocation['y']) + abs($revisitedLocation['x'])) . " blocks away from the starting point.";

?>