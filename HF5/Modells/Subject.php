<?php

class Subject
{
    public String $code;
    public String $name;
    public array $students;

    public function __construct(string $code, string $name)
    {
        $this->code = $code;
        $this->name = $name;
        $this->students = [];
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getStudents(): array
    {
        return $this->students;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function addStudent(string $name, string $studentNumber)
    {
        if ($this->isStudentExists($studentNumber)) {
            throw new Exception("{$name} already exists in the students!" . "<br>");
        }
        $student = new Student($studentNumber, $name);
        $this->students[] = $student;
        return "{$name} with number: {$studentNumber} was added to the " . $this->getName();
    }

    public function deleteStudent(string $name, string $studentNumber)
    {
        if (!$this->isStudentExists($studentNumber)) {
            throw new Exception("{$name} does not exist in the students!");
        }
        foreach ($this->students as $key => $student) {
            if ($student->getStudentNumber() == $studentNumber) {
                unset($this->students[$key]);
                return "{$name} with number '{$studentNumber}' was deleted from the " . $this->getName();
            }
        }
        throw new Exception("Error deleting student: {$name} with number '{$studentNumber}' not found.");
    }

    private function isStudentExists(string $studentNumber): bool
    {
        if (count($this->students) == 0) return false;
        foreach ($this->students as $student) {
            if ($student->getStudentNumber() == $studentNumber) {
                return true;
            }
        }
        return false;
    }

    public function __toString()
    {
        return $this->getCode() . ' - ' . $this->getName() . "\n";
    }

}

?>