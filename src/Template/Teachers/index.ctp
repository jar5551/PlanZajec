<?php
$this->layout = false;

foreach ($teachers as $teacher) {
    unset($teacher->generated_html);
}
echo json_encode(compact('teachers'));
