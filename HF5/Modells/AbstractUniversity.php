<?php

abstract class AbstractUniversity
{
    public $subjects = [];

    abstract public function addSubject(string $code, string $name): Subject;

    abstract public function addStudentOnSubject(string $subjectCode, Student $student);

    abstract public function getStudentsForSubject(string $subjectCode);

    abstract public function getNumberOfStudents(): int;

    abstract public function print();
}

?>