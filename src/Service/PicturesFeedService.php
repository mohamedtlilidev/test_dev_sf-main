<?php


namespace App\Service;


use App\Interfaces\ApiPictureInterface;
use App\Interfaces\ApiServiceInterface;

/**
 * Class ImagesFeedService
 * @package App\Service
 */
class PicturesFeedService implements ApiPictureInterface
{

    /**
     * @var FilterPictureService
     */
    private $filterPictureService;

    /**
     * @var FeedParserService
     */
    private $feedParserService;

    /**
     * @var string
     */
    private $feedXssApi;

    /**
     * ImagesFeedService function
     *
     * @param string $feedXssApi
     * @param FilterPictureService $filterPictureService
     * @param FeedParserService $feedParserService
     */
    public function __construct(
        string $feedXssApi,
        FilterPictureService $filterPictureService,
        FeedParserService $feedParserService
    ) {
        $this->feedXssApi = $feedXssApi;
        $this->filterPictureService = $filterPictureService;
        $this->feedParserService = $feedParserService;
    }

    /**
     * Get All images from urls function
     *
     * @return array
     */
    public function getPictures():array
    {
        $images =  $this->feedParserService->getPicturesFromXss($this->feedXssApi) ?: array();
        return $this->filterPictureService->applyfilter($images) ?: array();
    }

}