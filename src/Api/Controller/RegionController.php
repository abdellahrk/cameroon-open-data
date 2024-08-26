<?php

namespace App\Api\Controller;

use App\Service\YamlParserServiceInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Yaml\Yaml;

#[AsController]
class RegionController
{
    public function __construct(
        #[Autowire('%kernel.project_dir%/data')] private $publicDir,
        private YamlParserServiceInterface $yamlParserService,
        private RequestStack $requestStack,
    ) {}
    #[Route(['en' => '/api/regions', 'fr' => '/api/regions'], name: 'api_regions')]
    public function getRegions(): JsonResponse
    {
        $locale = $this->requestStack->getCurrentRequest()?->getLocale();
        try {
            $data = $this->yamlParserService->parseFile($this->publicDir . '/' . $locale . '/regions.yaml');
            return new JsonResponse($data);
        } catch (\Exception $exception) {
            return new JsonResponse(['error' => $exception->getMessage()], 500);
        }
    }
}
