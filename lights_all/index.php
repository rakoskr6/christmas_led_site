<?php
// POST: music mode on every strip, including the Pixelblazes.
require __DIR__ . '/../lib.php';
require_action();
finish(run_command([LED_DIR . '/set_config.py', 'wireless_music', 'true'])
    && run_command([LED_DIR . '/set_config.py', 'mode', 'music']));
