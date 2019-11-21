<?php

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_track';
    }
}  

if ($action == 'show_track') {

    include('show_track.php');
} 
?>