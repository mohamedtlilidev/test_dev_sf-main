<?php


namespace App\Service;


use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class ImagesService
 * @package App\Service
 */
class PicturesService
{
    /**
     * @var PicturesApiService
     */
    private $picturesApiService;

    /**
     * @var PicturesFeedService
     */
    private $picturesFeedService;

    /**
     * ImagesService constructor
     *
     * @param PicturesApiService $picturesApiService
     * @param PicturesFeedService $picturesFeedService
     */
    public function __construct(
        PicturesApiService $picturesApiService,
        PicturesFeedService $picturesFeedService
    ) {
        $this->picturesApiService = $picturesApiService;
        $this->picturesFeedService = $picturesFeedService;
    }

    /**
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getAllPictures():array
    {
        $picturesFromXss = $this->picturesFeedService->getPictures();
        $picturesFromApi = $this->picturesApiService->getPictures();

        return array_unique(array_merge($picturesFromXss, $picturesFromApi)) ?: array();
    }

}