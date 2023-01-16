<?php
// namespace model;

abstract class Person
{

    protected int $id;
    protected string $first_name;
    protected string $last_name;

  
    public function __construct(int $id, string $first_name, string $last_name)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

   
    public function getId(): int
    {
        return $this->id;
    }

  
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    
    public function getFirstName(): string
    {
        return $this->first_name;
    }

   
    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    
    public function getLastName(): string
    {
        return $this->last_name;
    }

    
    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }




}
