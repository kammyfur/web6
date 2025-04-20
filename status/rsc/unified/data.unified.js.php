<?php
header("Content-Type: application/javascript");
$data = json_decode(file_get_contents("../../output.json"));
$main = false;
foreach ($data->sites as $element) {
	if ($element->main) {
		global $mainel;
		$mainel = $element;
		$main = true;
	}
}
if (!$main) {
	die("var uptimeData={'0':{'days':[]}};");
}
function parseOutages(int $day) {
	global $mainel;
	if (isset($mainel->history[$day])) {
		if ($mainel->history[$day] == 0) {
			return;
		} else if ($mainel->history[$day] == 1 || $mainel->history[$day] == 2) {
			$duration = 1;
			$num = 30;
			$counteds = [$day];
			for($i = 0; $i < $num; $i++){
				if ($i > 0) {
					if (!array_search($day+$i, $counteds)) {
						if (isset($mainel->history[$day+$i])) {
							if ($mainel->history[$day+$i] == 1 || $mainel->history[$day+$i] == 2) {
								$duration = $duration + 1;
								array_push($counteds, $day+$i);
							} else {
								break;
							}
						}
					}
				}
			}
			for($i = 0; $i < $num; $i++){
				if ($i > 0) {
					if (!array_search($day-$i, $counteds)) {
						if ($day - $i > -1) {
							if (isset($mainel->history[$day-$i])) {
								// var_dump($day-$i);
								// var_dump($mainel->history[$day-$i]);
								if ($mainel->history[$day-$i] == 1 || $mainel->history[$day-$i] == 2) {
									$duration = $duration + 1;
									array_push($counteds, $day-$i);
								} else {
									break;
								}
							}
						}
					}
				}
			}
			return "\"p\":" . $duration;
		} else {
			$duration = 1;
			$num = 30;
			$counteds = [$day];
			for($i = 0; $i < $num; $i++){
				if ($i > 0) {
					if (!array_search($day+$i, $counteds)) {
						if (isset($mainel->history[$day+$i])) {
							if ($mainel->history[$day+$i] == 3) {
								$duration = $duration + 1;
								array_push($counteds, $day+$i);
							} else {
								break;
							}
						}
					}
				}
			}
			for($i = 0; $i < $num; $i++){
				if ($i > 0) {
					if (!array_search($day-$i, $counteds)) {
						if ($day - $i > -1) {
							if (isset($mainel->history[$day-$i])) {
								if ($mainel->history[$day-$i] == 3) {
									$duration = $duration + 1;
									array_push($counteds, $day-$i);
								} else {
									break;
								}
							}
						}
					}
				}
			}
			return "\"m\":" . $duration;
		}
	} else {
		return;
	}
}
function parseRelatedInfo(int $day) {
	// global $mainel;
	// if (isset($mainel->history[$day])) {
		// if ($mainel->history[$day] == 0) {
			// return;
		// } else if ($mainel->history[$day] == 1 || $mainel->history[$day] == 2) {
			// $duration = 1;
			// $num = 30;
			// $counteds = [$day];
			// for($i = 0; $i < $num; $i++){
				// if ($i > 0) {
					// if (!array_search($day+$i, $counteds)) {
						// if (isset($mainel->history[$day+$i])) {
							// if ($mainel->history[$day+$i] == 1 || $mainel->history[$day+$i] == 2) {
								// $duration = $duration + 1;
								// array_push($counteds, $day+$i);
							// } else {
								// break;
							// }
						// }
					// }
				// }
			// }
			// for($i = 0; $i < $num; $i++){
				// if ($i > 0) {
					// if (!array_search($day-$i, $counteds)) {
						// if ($day - $i > -1) {
							// if (isset($mainel->history[$day-$i])) {
								// var_dump($day-$i);
								// var_dump($mainel->history[$day-$i]);
								// if ($mainel->history[$day-$i] == 1 || $mainel->history[$day-$i] == 2) {
									// $duration = $duration + 1;
									// array_push($counteds, $day-$i);
								// } else {
									// break;
								// }
							// }
						// }
					// }
				// }
			// }
			// if ($mainel->history[$day] == 1) {
				// if ($duration > 1) {
					// return "\"{$duration} minutes long minor problem\"";
				// } else {
					// return "\"{$duration} minute long minor problem\"";
				// }
			// }
			// if ($mainel->history[$day] == 2) {
				// if ($duration > 1) {
					// return "\"{$duration} minutes long major problem\"";
				// } else {
					// return "\"{$duration} minute long major problem\"";
				// }
			// }
			// if ($mainel->history[$day] == 3) {
				// if ($duration > 1) {
					// return "\"{$duration} minutes long service outage\"";
				// } else {
					// return "\"{$duration} minute long service outage\"";
				// }
			// }
		// } else {
			// $duration = 1;
			// $num = 30;
			// $counteds = [$day];
			// for($i = 0; $i < $num; $i++){
				// if ($i > 0) {
					// if (!array_search($day+$i, $counteds)) {
						// if (isset($mainel->history[$day+$i])) {
							// if ($mainel->history[$day+$i] == 3) {
								// $duration = $duration + 1;
								// array_push($counteds, $day+$i);
							// } else {
								// break;
							// }
						// }
					// }
				// }
			// }
			// for($i = 0; $i < $num; $i++){
				// if ($i > 0) {
					// if (!array_search($day-$i, $counteds)) {
						// if ($day - $i > -1) {
							// if (isset($mainel->history[$day-$i])) {
								// if ($mainel->history[$day-$i] == 3) {
									// $duration = $duration + 1;
									// array_push($counteds, $day-$i);
								// } else {
									// break;
								// }
							// }
						// }
					// }
				// }
			// }
			// if ($mainel->history[$day] == 1) {
				// if ($duration > 1) {
					// return "\"{$duration} minutes long minor problem\"";
				// } else {
					// return "\"{$duration} minute long minor problem\"";
				// }
			// }
			// if ($mainel->history[$day] == 2) {
				// if ($duration > 1) {
					// return "\"{$duration} minutes long major problem\"";
				// } else {
					// return "\"{$duration} minute long major problem\"";
				// }
			// }
			// if ($mainel->history[$day] == 3) {
				// if ($duration > 1) {
					// return "\"{$duration} minutes long service outage\"";
				// } else {
					// return "\"{$duration} minute long service outage\"";
				// }
			// }
		// }
	// } else {
		// return;
	// }
	return;
}
?>
var uptimeData = {
"0": {
"days": [
{
"date": "30",
"outages": {<?= parseOutages(29) ?>},
"related_events": [<?= parseRelatedInfo(29) ?>]
},
{
"date": "29",
"outages": {<?= parseOutages(28) ?>},
"related_events": [<?= parseRelatedInfo(28) ?>]
},
{
"date": "28",
"outages": {<?= parseOutages(27) ?>},
"related_events": [<?= parseRelatedInfo(27) ?>]
},
{
"date": "27",
"outages": {<?= parseOutages(26) ?>},
"related_events": [<?= parseRelatedInfo(26) ?>]
},
{
"date": "26",
"outages": {<?= parseOutages(25) ?>},
"related_events": [<?= parseRelatedInfo(25) ?>]
},
{
"date": "25",
"outages": {<?= parseOutages(24) ?>},
"related_events": [<?= parseRelatedInfo(24) ?>]
},
{
"date": "24",
"outages": {<?= parseOutages(23) ?>},
"related_events": [<?= parseRelatedInfo(23) ?>]
},
{
"date": "23",
"outages": {<?= parseOutages(22) ?>},
"related_events": [<?= parseRelatedInfo(22) ?>]
},
{
"date": "22",
"outages": {<?= parseOutages(21) ?>},
"related_events": [<?= parseRelatedInfo(21) ?>]
},
{
"date": "21",
"outages": {<?= parseOutages(20) ?>},
"related_events": [<?= parseRelatedInfo(20) ?>]
},
{
"date": "20",
"outages": {<?= parseOutages(19) ?>},
"related_events": [<?= parseRelatedInfo(19) ?>]
},
{
"date": "19",
"outages": {<?= parseOutages(18) ?>},
"related_events": [<?= parseRelatedInfo(18) ?>]
},
{
"date": "18",
"outages": {<?= parseOutages(17) ?>},
"related_events": [<?= parseRelatedInfo(17) ?>]
},
{
"date": "17",
"outages": {<?= parseOutages(16) ?>},
"related_events": [<?= parseRelatedInfo(16) ?>]
},
{
"date": "16",
"outages": {<?= parseOutages(15) ?>},
"related_events": [<?= parseRelatedInfo(15) ?>]
},
{
"date": "15",
"outages": {<?= parseOutages(14) ?>},
"related_events": [<?= parseRelatedInfo(14) ?>]
},
{
"date": "14",
"outages": {<?= parseOutages(13) ?>},
"related_events": [<?= parseRelatedInfo(13) ?>]
},
{
"date": "13",
"outages": {<?= parseOutages(12) ?>},
"related_events": [<?= parseRelatedInfo(12) ?>]
},
{
"date": "12",
"outages": {<?= parseOutages(11) ?>},
"related_events": [<?= parseRelatedInfo(11) ?>]
},
{
"date": "11",
"outages": {<?= parseOutages(10) ?>},
"related_events": [<?= parseRelatedInfo(10) ?>]
},
{
"date": "10",
"outages": {<?= parseOutages(9) ?>},
"related_events": [<?= parseRelatedInfo(9) ?>]
},
{
"date": "9",
"outages": {<?= parseOutages(8) ?>},
"related_events": [<?= parseRelatedInfo(8) ?>]
},
{
"date": "8",
"outages": {<?= parseOutages(7) ?>},
"related_events": [<?= parseRelatedInfo(7) ?>]
},
{
"date": "7",
"outages": {<?= parseOutages(6) ?>},
"related_events": [<?= parseRelatedInfo(6) ?>]
},
{
"date": "6",
"outages": {<?= parseOutages(5) ?>},
"related_events": [<?= parseRelatedInfo(5) ?>]
},
{
"date": "5",
"outages": {<?= parseOutages(4) ?>},
"related_events": [<?= parseRelatedInfo(4) ?>]
},
{
"date": "4",
"outages": {<?= parseOutages(3) ?>},
"related_events": [<?= parseRelatedInfo(3) ?>]
},
{
"date": "3",
"outages": {<?= parseOutages(2) ?>},
"related_events": [<?= parseRelatedInfo(2) ?>]
},
{
"date": "2",
"outages": {<?= parseOutages(1) ?>},
"related_events": [<?= parseRelatedInfo(1) ?>]
},
{
"date": "1",
"outages": {<?= parseOutages(0) ?>},
"related_events": [<?= parseRelatedInfo(0) ?>]
},
]
}
}