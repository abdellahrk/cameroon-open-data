<?php

namespace App\Service;

interface YamlParserServiceInterface
{
    public function parse(string $content): array;
}