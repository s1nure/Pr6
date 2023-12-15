<?php

class CounterController {
    public function showCounter() {
        $file = 'counter.txt';
        $counter = file_exists($file) ? intval(file_get_contents($file)) : 0;
        $counter++;
        file_put_contents($file, $counter);

        echo "Кількість відвідувань сайту: $counter";
    }
}

?>
