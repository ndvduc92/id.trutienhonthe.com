<?php
while (true) {
    file_put_contents("logs.log", "Log from game" . PHP_EOL, FILE_APPEND);
    sleep(2);
}


?>