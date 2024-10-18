<?php

class University extends AbstractUniversity
{
    public $subjects = [];
    public function addSubject(string $code, string $name): Subject
    {
        if ($this->isSubjectExists($code, $name)) {
            throw new Exception("{$name} already exists in the university!" . "<br>");
        }
        $subject = new Subject($code, $name);
        $this->subjects[] = $subject;
        return $subject;
    }

    public function deleteSubject(Subject $subject): Subject
    {
        if (!$this->isSubjectExists($subject->getCode(), $subject->getName())) {
            throw new Exception("Subject does not exist in the university!" . "<br>");
        }
        foreach ($this->subjects as $key => $subjectVariable) {
            if ($subjectVariable->getCode() === $subject->getCode() && $subjectVariable->getName() === $subject->getName()) {
                unset($this->subjects[$key]);
                return $subjectVariable;
            }
        }
        throw new Exception("Error during subject deletion!");
    }

    public function addStudentOnSubject(string $subjectCode, Student $student)
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $subjectCode) {
                return $subject->addStudent($student->getName(), $student->getStudentNumber());
            }
        }
    }

    public function getStudentsForSubject(string $subjectCode)
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $subjectCode) {
                return $subject->getStudents();
            }
        }
        return [];
    }

    public function getNumberOfStudents(): int
    {
        $studentNumbers = 0;
        foreach ($this->subjects as $subject) {
            foreach ($subject->getStudents() as $student) {
                $studentNumbers += 1;
            }
        }
        return $studentNumbers;
    }

    public function print()
    {
        foreach ($this->subjects as $subject) {
            echo $subject . "<br>";
            echo '--------------------------' . "<br>";

            foreach ($subject->getStudents() as $student) {
                echo $student->getName() . $student->getStudentNumber() . "<br>";
            }

        }
    }

    public function isSubjectExists(string $code, string $name)
    {
        if (count($this->subjects) == 0) return false;
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $code && $subject->getName() == $name) {
                return true;
            }
        }
        return false;
    }

}

?>