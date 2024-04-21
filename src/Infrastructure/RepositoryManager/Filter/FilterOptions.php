<?php

namespace App\Infrastructure\RepositoryManager\Filter;

class FilterOptions
{
    public string $columnName = '';
    public string $operator = '>';
    public string $value;


    public function __construct($columnName, $operator, $value)
    {
        $this->columnName = $columnName;
        $this->operator = $operator;
        $this->value = $value;
    }

    public function isValid(): bool
    {
        if ($this->operator === FilterOperator::EQUALS ||
            $this->operator === FilterOperator::GREAT_THAN ||
            $this->operator === FilterOperator::LESS_THAN ||
            $this->operator === FilterOperator::LIKE) {
            return true;
        }

        return false;
    }

    // SELECT $columName FROM table Where $columnName $operator $value;
    // SELECT $columName FROM table Where $columnName > $value;
    // SELECT $columName FROM table Where $columnName < $value;
    // SELECT $columName FROM table Where $columnName = $value;
    // SELECT $columName FROM table Where $columnName LIKE '%value%';
}
