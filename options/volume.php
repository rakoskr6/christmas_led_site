<?php
// POST volume=0..100: set the line-in capture volume.
require __DIR__ . '/../lib.php';
require_action();

$volume = filter_var($_POST['volume'] ?? null, FILTER_VALIDATE_INT,
                     ['options' => ['min_range' => 0, 'max_range' => 100]]);
if ($volume === false) {
    http_response_code(400);
    exit;
}
finish(run_command([LED_DIR . '/website_set_volume.sh', (string)$volume]));
