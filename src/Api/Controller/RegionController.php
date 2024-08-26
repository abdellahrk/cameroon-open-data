<?php

namespace App\Api\Controller;

use App\Api\AbstractApiController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
class RegionController extends AbstractApiController
{

    #[Route(['en' => '/regions', 'fr' => '/regions'], name: 'api_regions')]
    public function getRegions(Request $request): JsonResponse
    {
        $fileSystem = new Filesystem();

        if (false === $fileSystem->exists($this->getPublicDir() .'/'.$request->getLocale(). '/regions.yaml')) {
            return new JsonResponse(['error' => 'File does not exists', 'code' => 404], 404);
        }

        return $this->parseYamlFile('/regions.yaml');
    }
}
