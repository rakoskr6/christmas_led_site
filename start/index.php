<?php
// POST action=start|stop: start or stop the lights service.
require __DIR__ . '/../lib.php';
require_action();

$action = $_POST['action'] ?? '';
if (!in_array($action, ['start', 'stop'], true)) {
    http_response_code(400);
    exit;
}
// Allowed for www-data by /etc/sudoers.d/led-strips, and nothing else
finish(run_command(['sudo', '-n', '/usr/bin/systemctl', $action, 'led-strips.service']));
