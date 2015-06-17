<?php
$this->layout = false;

foreach ($classes as $class) {
    unset($class->generated_html);
}
echo json_encode(compact('classes'));
