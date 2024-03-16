<?php
function block_frames() {
    header('X-FRAME-OPTIONS: SAMEORIGIN');
}
add_action('send_headers', 'block_frames', 10);
