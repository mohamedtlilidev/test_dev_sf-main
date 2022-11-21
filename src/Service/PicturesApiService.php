<?php


namespace App\Service;


use App\Interfaces\ApiPictureInterface;
use App\Interfaces\ApiServiceInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class ImagesApiService
 * @package App\Service
 */
class PicturesApiService implements ApiPictureInterface
{

    /**
     * ApiService variable
     *
     * @var ApiService
     */
    private $apiService;

    /**
     * @var FilterPictureService
     */
    private $filterPictureService;

    /**
     * @var string
     */
    private $apiNewsUrl;

    /**
     * @var string
     */
    private $apiNewsCountry;

    /**
     * @var string
     */
    private $apiNewsKey;

    /**
     * ImagesApiService constructor
     *
     * @param ApiServiceInterface $apiService
     * @param FilterPictureService $filterPictureService
     * @param string $apiNewsUrl
     * @param string $apiNewsCountry
     * @param string $apiNewsKey
     */
    public function __construct(
        ApiServiceInterface $apiService,
        FilterPictureService $filterPictureService,
        string $apiNewsUrl,
        string $apiNewsCountry,
        string $apiNewsKey
    ) {
        $this->apiService = $apiService;
        $this->filterPictureService = $filterPictureService;
        $this->apiNewsUrl = $apiNewsUrl;
        $this->apiNewsCountry = $apiNewsCountry;
        $this->apiNewsKey = $apiNewsKey;
    }

    /**
     * Get All images from urls function
     *
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getPictures():array
    {
        $url = $this->apiNewsUrl.
            '?country='.$this->apiNewsCountry.
            '&apiKey='.$this->apiNewsKey;

        $pictures =  $this->getPicturesFromApi($url) ?: array();
        return $this->filterPictureService->applyfilter($pictures);
    }

    /**
     * Get images from Api
     *
     * @param string $apiUrl
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    private function getPicturesFromApi(string $apiUrl) :array
    {
        $data = $this->apiService->fetchData($apiUrl, 'GET') ?: '';
        $picturesApi = array();

        if ($data) {
            foreach ($data['articles'] as $key => $article) {
                $picturesApi[] = $article['urlToImage'];
            }
        }

        return $picturesApi;
    }

}