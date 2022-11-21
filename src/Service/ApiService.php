<?php


namespace App\Service;


use App\Interfaces\ApiServiceInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Class ApiService
 * @package App\Service
 */
class ApiService implements ApiServiceInterface
{
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * ApiInterface constructor.
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }


    /**
     * @param string $url
     * @param string $method
     * @param array $options
     * @return array
     * @throws TransportExceptionInterface
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws DecodingExceptionInterface
     */
    public function fetchData(string $url, string $method, array $options = []): array
    {
        $response = $this->httpClient->request(
            $method,
            $url,
            $options
        );
        return $response->toArray();
    }

}