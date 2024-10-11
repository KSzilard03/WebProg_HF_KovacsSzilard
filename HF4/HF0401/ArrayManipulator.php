<?php

class ArrayManipulator
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function addElement($element) {
        if (in_array($element, $this->data)) {
            echo "Element [$element] is already in the array. <br>";
            return ;
        }

        $this->data[] = $element;
    }

    public function deleteElement($element) {
        $index = array_search($element, $this->data);
        if ($index !== false) {
            unset($this->data[$index]);
            $this->data = array_values($this->data);
        } else {
            throw new Exception("Element [$element] not found!");
        }

    }

    public function __call($name, $arguments)
    {
        if (method_exists($this, $name)) {
            return $this->$name(...$arguments);
        } else {
            throw new Exception("Method [$name] does not exist!");
        }
    }


    public function __get(String $property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        } else {
            throw new Exception("Property [$property] does not exists!");
        }
    }

    public function __set(String $property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        } else {
            throw new Exception("Property [$property] does not exists!");
        }
    }

    public function __isset(String $property)
    {
        if (property_exists($this, $property)) {
            return isset($this->$property);
        } else {
            throw new Exception("Property [$property] does not exists!");
        }
    }

    public function __unset($property)
    {
        if (property_exists($this, $property)) {
            unset($this->$property);
        } else {
            throw new Exception("Property [$property] does not exists!");
        }
    }

    public function __toString()
    {
        if (empty($this->data)) {
            return "Array is empty.";
        }

        $result = "Array contents: ";
        foreach ($this->data as $element) {
            $result .= $element . " ";
        }

        return trim($result);
    }

}

?>