<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

use App\Entity\Film;
use App\Entity\Category;

class ApiController extends AbstractController
{
    #[Route('/api/Film/{id}', name: 'app_api_film')]
    public function readFilm(Film $mov, SerializerInterface $serializer): Response
    {
        $data = $serializer->normalize($mov, null, ['groups' => 'json_film']);
        $response = new JsonResponse($data);
        return $response;
    }

    #[Route('/api/Category/{id}', name: 'app_api_category')]
    public function readCategory(Category $cat, SerializerInterface $serializer): Response
    {
        $data = $serializer->normalize($cat, null, ['groups' => 'json_category']);
        $response = new JsonResponse($data);
        return $response;
    }
}
