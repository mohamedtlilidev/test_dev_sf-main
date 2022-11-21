<?php


namespace App\Interfaces;

/**
 * Interface ApiServiceInterface
 * @package App\Interfaces
 */
interface ApiServiceInterface
{
    public function fetchData(string $url, string $method, array $options = []) : array;
}