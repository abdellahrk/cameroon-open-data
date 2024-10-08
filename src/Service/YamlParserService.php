<?php

namespace App\Service;

use App\Service\YamlParserServiceInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

readonly class YamlParserService implements YamlParserServiceInterface
{
    public function __construct(
        private LoggerInterface $logger,
    ) {}

    public function parse(string $content): array
    {
        try {
            return Yaml::parse($content);
        } catch (ParseException $e) {
            $this->logger->error("Cannot parse Yaml: ".$e->getMessage());
            throw new ParseException('Cannot parse Yaml: '.$e->getMessage());
        }
    }

    public function parseFile(string $filePath): array
    {
        try {
            return Yaml::parseFile($filePath);
        } catch (ParseException $e) {
            $this->logger->error("Cannot parse Yaml: ".$e->getMessage());
            throw new ParseException('Cannot parse Yaml: '.$e->getMessage());
        }
    }
}
