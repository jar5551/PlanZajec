<?php
foreach ($class as &$class_each) {
    unset($class_each->generated_html);
}
echo json_encode(compact('class'));