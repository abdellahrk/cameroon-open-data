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
        $data = $this->yamlParserService->parse(file_get_contents($this->publicDir.'/'.$locale.'/regions.yaml'));
        return new JsonResponse($data);
    }
}