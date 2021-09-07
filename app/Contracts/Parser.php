<?php

namespace App\Contracts;

interface Parser
{
    public function getData(string $url): array;
    public function saveData(string $url): void;
}
