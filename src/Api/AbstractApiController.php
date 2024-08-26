<?php

/*
 * This file is part of the Cameroon Open Data project.
 *
 * (c) Abdellah (Abdel) Ramadan
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Api;

use App\Service\YamlParserServiceInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;

class AbstractApiController
{
    public function __construct(
        #[Autowire('%kernel.project_dir%/data')] private readonly string $publicDir,
        private readonly YamlParserServiceInterface $yamlParserService,
        private readonly RequestStack $requestStack,
    ) {}

    public function parseYamlFile(string $filePath): JsonResponse
    {
        $locale = $this->requestStack->getCurrentRequest()?->getLocale();
        try {
            $data = $this->yamlParserService->parseFile($this->publicDir . '/' . $locale . '/'.$filePath);
            return new JsonResponse($data);
        } catch (\Exception $exception) {
            return new JsonResponse(['error' => $exception->getMessage()], 500);
        }
    }

    public function parseYaml(string $yamlContent): JsonResponse
    {
        try {
            $data = $this->yamlParserService->parse($yamlContent);
            return new JsonResponse($data);
        } catch (\Exception $exception) {
            return new JsonResponse(['error' => $exception->getMessage()], 500);
        }
    }

    public function getPublicDir(): string
    {
        return $this->publicDir;
    }

    public function getFilesystem(): Filesystem
    {
        return new Filesystem();
    }
}
