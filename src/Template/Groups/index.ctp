<?php
foreach ($groups as $group) {
    unset($group->generated_html);
}
echo json_encode(compact('group'));
