<?php
// POST: pattern (static) mode.
require __DIR__ . '/../lib.php';
require_action();
finish(run_command([LED_DIR . '/set_config.py', 'mode', 'static']));
