<?php

include "loader.php";

$student1 = new Student("123456789", "FirstStudent");
$student2 = new Student("987654321", "SecondStudent");
$student3 = new Student("246810121", "ThirdStudent");

echo "<strong>Two created students:</strong>" . "<br>";
echo $student1 . "<br>";
echo $student2 . "<br>";
echo $student3 . "<br>";

$webProg = new Subject("101", "Web programming");
$database = new Subject("102", "Database");

echo "<br>" . "<strong>Two created subjects:</strong>" . "<br>";
echo $webProg . "<br>";
echo $database . "<br>";

echo "<br>" . "<strong>Add students to subjects:</strong>" . "<br>";

try {
    echo $database->addStudent($student1->getName(), $student1->getStudentNumber()) . "<br>";
    echo $database->addStudent($student2->getName(), $student2->getStudentNumber()) . "<br>";
    echo $database->addStudent($student3->getName(), $student3->getStudentNumber()) . "<br>";
    echo $webProg->addStudent($student1->getName(), $student1->getStudentNumber()) . "<br>";
    echo $webProg->addStudent($student2->getName(), $student2->getStudentNumber()) . "<br>";
    echo $webProg->addStudent($student3->getName(), $student3->getStudentNumber()) . "<br>";
} catch (Exception $e) {
    echo $e->getMessage();
}

echo "<br>" . "<strong>Database subject:</strong>" . "<br>";

foreach ($database->students as $student) {
    echo $student->getName() . " (" . $student->getStudentNumber() . ")<br>";
}

echo "<br>" . "<strong>Web Programming subject:</strong>" . "<br>";

foreach ($webProg->students as $student) {
    echo $student->getName() . " (" . $student->getStudentNumber() . ")<br>";
}

echo "<br>" . "<strong>Add grades for the students:</strong>" . "<br>";

try {
    $student1->addGrade($database, 8.2);
    $student2->addGrade($database, 6.2);
    $student3->addGrade($database, 9.2);
    $student1->addGrade($webProg, 8.2);
    $student2->addGrade($webProg, 6.2);
    $student3->addGrade($webProg, 4.8);

} catch (Exception $e) {
    echo $e->getMessage();
}

echo "<br>" . "<strong>Print grades for the student1:</strong>" . "<br>";

try {
    $student1->printGrades();
} catch (Exception $e) {
    echo $e->getMessage();
}

echo "<br>" . "<strong>Get student2 average:</strong>" . "<br>";

try {
    echo $student2->getAvgGrade() . "<br>";
} catch (Exception $e) {
    echo $e->getMessage();
}

echo "<br>" . "<strong>Add student1 to Database again:</strong>" . "<br>";

try {
    echo $database->addStudent($student1, "123456789") . "<br>";
} catch (Exception $e) {
    echo $e->getMessage();
}

echo "<br>" . "<strong>Delete student1 from database:</strong>" . "<br>";

try {
    echo $database->deleteStudent($student1->getName(),$student1->getStudentNumber()) . "<br>";
} catch (Exception $e) {
    echo $e->getMessage();
}

echo "<br>" . "<strong>Database subject:</strong>" . "<br>";

foreach ($database->students as $student) {
    echo $student->getName() . " (" . $student->getStudentNumber() . ")<br>";
}

$university = new University();

echo "<br>" . "<strong>Add subjects to the university:</strong>" . "<br>";

try {
    echo $university->addSubject($database->getCode(), $database->getName()) . "was added to the university  " . "<br>";
    echo $university->addSubject($webProg->getCode(), $webProg->getName()) . " was added to the university  " . "<br>";
} catch (Exception $e) {
    echo $e->getMessage();
}

echo "<br>" . "<strong>Add students to the Web Programming subject in the university:</strong>" . "<br>";

try {
    echo $university->addStudentOnSubject($webProg->getCode(), $student1). "<br>";
    echo $university->addStudentOnSubject($webProg->getCode(), $student2). "<br>";
    echo $university->addStudentOnSubject($webProg->getCode(), $student3). "<br>";
} catch (Exception $e) {
    echo $e->getMessage();
}

echo "<br>" . "<strong>University with subjects:</strong>" . "<br>";
$university->print() . "<br>";

echo "<br>" . "<strong>Delete the Database subject from the university:</strong>" . "<br>";

try {
    echo $university->deleteSubject($database) . " was removed from the university  " . "<br>";
} catch (Exception $e) {
    echo $e->getMessage();
}

echo "<br>" . "<strong>University with subjects:</strong>" . "<br>";
echo $university->print();

echo "<br>" . "Trying to delete the Database subject from the university against: " . "<br>";

try {
    $university->deleteSubject($database);
} catch (Exception $e) {
    echo $e->getMessage();
}

echo "<br>" . "<strong>The university has:</strong>" . "<br>";

try {
    echo $university->getNumberOfStudents() . " students." ."<br>";
} catch (Exception $e) {
    echo $e->getMessage();
}

$students = [$student1, $student2, $student3];

usort($students, function($a, $b) {
    return $b->getAvgGrade() <=> $a->getAvgGrade();
});

echo "<br>" . "<strong>Students sorted by average grade:</strong>" . "<br>";
foreach ($students as $student) {
    echo "{$student->getName()} - Average Grade: {$student->getAvgGrade()}" . "<br>";
}

?>