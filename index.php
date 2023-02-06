<?php

/**
 * @param string $datStart
 * @param string $dateEnd
 * @return int
 * @throws Exception
 */
function getCountOfTuesdays (string $datStart,string $dateEnd): int {
    $period = getEveryDay($datStart, $dateEnd);
    $count = 0;

    foreach ($period as $value) {
        if ($value->format('D') == 'Tue') {
            $count++;
        }
    }

    return $count;
}

/**
 * @param string $datStart
 * @param string $dateEnd
 * @return DatePeriod
 * @throws Exception
 */
function getEveryDay (string $datStart,string $dateEnd): DatePeriod {
    $period = new DatePeriod(
        new DateTime($datStart),
        new DateInterval('P1D'),
        new DateTime($dateEnd)
    );

    return $period;
}

try {
    getCountOfTuesdays('2023-01-01', '2023-02-06');
} catch (Exception $e) {
    die($e->getMessage());
}