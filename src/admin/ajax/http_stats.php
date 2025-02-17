<?php 
include "utils.php";

$stats_req = fopen("http://172.20.0.10/nginx_status", "r");
$stats_data = stream_get_contents($stats_req);

$stats_arr = explode(" ", $stats_data);

$active_conn = $stats_arr[2];
$accepted_conn = $stats_arr[7];
$handled_conn = $stats_arr[8];
$requests = $stats_arr[9];

$stats_conn = array(
   'active' => $active_conn,
   'accepted' => $active_conn,
   'handled' => $handled_conn,
   'requests' => $requests
);

if (check_privileges()) {
   echo json_encode($stats_conn);
}
