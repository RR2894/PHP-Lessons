<?php

// Asoociative array
$student_grades = array(
    'Alice' => 85,
    'Bob' => 90,
    'Charlie' => 75,
    'David' => 80
);

foreach ($student_grades as $student => $grade) {
    print $student . ' has a grade of ' . $grade . "\n";
}
;