<?php

namespace App\Controller;

use App\Dto\Person;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class IndexController extends AbstractController
{

    private SerializerInterface $serializer;

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    #[Route('/', name: 'app_index')]
    public function index(): JsonResponse
    {
        $person = new Person();
        $person->setFirstname('John');
        $person->setLastname('Doe');
        $person->setEmail('john.doe@example.com');

        $jsonContent = $this->serializer->serialize($person, 'json');
        /*
            {
                "1":"John",
                "2":"Doe",
                "3":"john.doe@example.com"
            }
         */

        $deserializePerson = $this->serializer->deserialize($jsonContent, Person::class, 'json');
        /*
            App\Dto\Person Object
            (
                [firstname:App\Dto\Person:private] => Doe
                [lastname:App\Dto\Person:private] => john.doe@example.com
            )
         */

        return new JsonResponse($jsonContent, Response::HTTP_OK, [], true);
    }
}
