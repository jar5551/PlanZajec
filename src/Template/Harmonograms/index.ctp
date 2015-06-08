<?php
foreach ($harmonograms as $harmonogram) {
    unset($harmonogram->generated_html);
}
echo json_encode(compact('harmonogram'));
