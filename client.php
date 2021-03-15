<?php

$fp = fsockopen(IP, PORT, $errno, $errstr, 30);

if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "Message: test\r\n";

    fwrite($fp, $out);

    while (!feof($fp)) {
        echo fgets($fp, 128);
    }

    fclose($fp);
}
