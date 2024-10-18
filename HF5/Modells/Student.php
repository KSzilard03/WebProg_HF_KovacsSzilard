<?php

class Student
{
    public String $name;
    public array $grades;
    public String $studentNumber;

    public function __construct(string $studentNumber, string $name)
    {
        $this->studentNumber = $studentNumber;
        $this->name = $name;
        $this->grades = [];
    }

    public function getStudentNumber(): string
    {
        return $this->studentNumber;
    }

    public function setStudentNumber(string $studentNumber): void
    {
        $this->studentNumber = $studentNumber;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function addGrade(Subject $subject, float $grade) : void
    {
        $this->grades[$subject->getCode()] = $grade;
        echo $this->getName() . " grade: " . $grade . " added to " . $subject->getName() . "<br>";
    }

    public function getAvgGrade()
    {
        if (count($this->grades) == 0) {
            throw new Exception("There are no grades assigned to any subject!");
        }
        return array_sum($this->grades) / count($this->grades);
    }

    public function printGrades()
    {
        if (empty($this->grades)) {
            echo "No grades assigned to this student! " . "<br>";
            return;
        }
        foreach ($this->grades as $subjectCode => $grade) {
            echo "{$subjectCode} - Grade: {$grade}<br>";
        }
    }

    public function __toString()
    {
        return $this->name . " - " . $this->studentNumber;
    }
}

?>