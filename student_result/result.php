<?php

function calculateResult($marks) {
    $totalMarks = 0;
    $numSubjects = count($marks);
    $isFail = false;

    // Validate marks range and check for fail condition
    foreach ($marks as $mark) {
        if ($mark < 0 || $mark > 100) {
            echo "Mark range is invalid for one or more subjects.<br>";
            return;
        }
        if ($mark < 33) {
            $isFail = true;
        }
        $totalMarks += $mark;
    }

    // If the student has failed in any subject
    if ($isFail) {
        echo "The student has failed.<br>";
        return;
    }

    // Calculate total and average marks
    $averageMarks = $totalMarks / $numSubjects;

    // Determine the grade using a switch-case
    $grade = '';
    switch (true) {
        case ($averageMarks >= 80 && $averageMarks <= 100):
            $grade = 'A+';
            break;
        case ($averageMarks >= 70 && $averageMarks <= 79):
            $grade = 'A';
            break;
        case ($averageMarks >= 60 && $averageMarks <= 69):
            $grade = 'A-';
            break;
        case ($averageMarks >= 50 && $averageMarks <= 59):
            $grade = 'B';
            break;
        case ($averageMarks >= 40 && $averageMarks <= 49):
            $grade = 'C';
            break;
        case ($averageMarks >= 33 && $averageMarks <= 39):
            $grade = 'D';
            break;
        default:
            $grade = 'F';
            break;
    }

    // Output the results
    echo "Total Marks: $totalMarks<br>";
    echo "Average Marks: " . number_format($averageMarks, 2) . "<br>";
    echo "Grade: $grade<br>";
}

// Example input: marks obtained in 5 subjects
$marks = [56, 45, 78, 65, 88];  // You can replace this array with your own inputs

// Call the function to calculate the result
calculateResult($marks);

?>
