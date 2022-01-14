<?php

use Carbon\Carbon;

    require_once __DIR__ . '/vendor/autoload.php';

    $connector_id = "XXXX";
    $secret_key = "XXXX";

    // Instantiate the class
    $sl = new SalesLayer_Conn($connector_id, $secret_key);
    $sl->set_API_version('1.18');

    $params = [];
    //$sl->set_pagination(100);

    $date = '2021-11-25 22:26:36';
    $dt = Carbon::createFromFormat('Y-m-d H:i:s', $date);
    $last_update = $dt->timestamp;

    dump($last_update);
    $sl->get_info($last_update, $params);

    dump('Length: ' . $sl->get_page_length());
    dump('Count: ' . $sl->get_page_count());
    dump('Next?: '. $sl->have_next_page());
    dump('Next Info:');
    dump($sl->get_next_page_info());

    dump($sl->response_next_page);

    $tables = $sl->get_response_list_tables();
    dump($tables);

    $info = $sl->get_response_table_data();
    dump($info);

    file_put_contents(__DIR__ . '/info.json', json_encode($info));
