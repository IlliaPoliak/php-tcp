<?php 

$fp = fsockopen("10.36.26.167", 82, $errno, $errstr);


if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $msg = 1;
    fwrite($fp, $msg);
    echo "msg: $msg";

    sleep(1);
    $msg = 2;
    fwrite($fp, $msg);
    echo "msg: $msg";

    sleep(1);
    $msg = 3;
    fwrite($fp, $msg);
    echo "msg: $msg";

    sleep(1);
    $msg = 4;
    fwrite($fp, $msg);
    echo "msg: $msg";

    fclose($fp);
}
