<?php
// POST: music mode on the tree only (the Pixelblazes don't follow the music).
require __DIR__ . '/../lib.php';
require_action();
finish(run_command([LED_DIR . '/set_config.py', 'wireless_music', 'false'])
    && run_command([LED_DIR . '/set_config.py', 'mode', 'music']));
