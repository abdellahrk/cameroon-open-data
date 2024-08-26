<?php

namespace App\Api\Controller;

use App\Api\AbstractApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
class MainController extends AbstractApiController
{
    #[Route(['en' => '/cameroon', 'fr' => '/cameroun'])]
    public function main(Request $request): JsonResponse
    {
        if (($request->getLocale() === 'fr') && false === $this->getFilesystem()->exists($this->getPublicDir() .'/'.$request->getLocale(). '/cameroun.yaml')) {
            return new JsonResponse(['error' => 'Fichier introuvable', 'code' => 404], 404);
        }

        if (($request->getLocale() === 'en') && false === $this->getFilesystem()->exists($this->getPublicDir().'/'.$request->getLocale(). '/cameroon.yaml')) {
            return new JsonResponse(['error' => 'File not found', 'code' => 404], 404);
        }

        return $this->parseYamlFile(explode('/',$request->getPathInfo())[2].'.yaml');
    }
}
