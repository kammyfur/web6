</body>
</html>

<?php

// TELEMETRY

require_once $_SERVER['DOCUMENT_ROOT'] . "/telemetry/telemetry.php"; // Include client
$url = $_SERVER['REQUEST_URI']; // Fetch URL

// var_dump($_SERVER); // In case it's needed, dump the server meta variable

// PART 1: Regular Polymer 3 telemetry trackers
Telemetry::increment("global", 1);

// PART 2: Site-specific telemetry trackers
// Insert here (instead of this text) site-specific trackers

?>