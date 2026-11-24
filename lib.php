<?php
// Shared by every page (through header.php) and every action endpoint.
// Must be included before any HTML is sent, because it starts the session.

const LED_DIR = '/opt/led_strips';
// led_interface.py rewrites status.log once a second; allow a few seconds of slack
const HEARTBEAT_SLACK = 5;

session_start();
if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

// The token each page embeds; actions must send it back (see require_action()).
function csrf_token(): string {
    return $_SESSION['csrf'];
}

// 'Alive' if led_interface.py wrote its heartbeat recently, 'Dead' if not,
// 'Unknown' if there's no readable status.log.
function led_status(): string {
    $lines = @file(LED_DIR . '/status.log', FILE_IGNORE_NEW_LINES);
    if ($lines === false || count($lines) < 2) {
        return 'Unknown';
    }
    return (time() - intval($lines[1]) <= HEARTBEAT_SLACK) ? 'Alive' : 'Dead';
}

// Call at the top of an endpoint that changes something. Only a POST that carries
// this session's token gets through; anything else is refused with 405 or 403.
// This stops other websites (and stray links) from working the lights.
function require_action(): void {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Allow: POST');
        http_response_code(405);
        exit;
    }
    $sent = $_SERVER['HTTP_X_CSRF_TOKEN'] ?? ($_POST['csrf'] ?? '');
    if (!is_string($sent) || !hash_equals(csrf_token(), $sent)) {
        http_response_code(403);
        exit;
    }
    session_write_close();
}

// Run a command without a shell (each argument quoted). Logs failures to Apache's error log.
function run_command(array $argv): bool {
    exec(implode(' ', array_map('escapeshellarg', $argv)) . ' 2>&1', $output, $code);
    if ($code !== 0) {
        error_log('led site: ' . implode(' ', $argv) . " failed ($code): " . implode(' | ', $output));
    }
    return $code === 0;
}

// End an action endpoint: 204 (done, nothing to show) or 500.
function finish(bool $ok): void {
    http_response_code($ok ? 204 : 500);
    exit;
}
