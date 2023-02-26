<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Person
{
    #[SerializedName('1')]
    private string $firstname;

    #[SerializedName('2')]
    private string $lastname;

    #[SerializedName('3')]
    private string $email;


    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}
