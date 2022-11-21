<?php


namespace App\Service;


use App\Interfaces\ApiPictureInterface;
use App\Interfaces\ApiServiceInterface;

/**
 * Class PicturesFeedService
 * @package App\Service
 */
class PicturesFeedService implements ApiPictureInterface
{

    private FilterPictureService $filterPictureService;

    private FeedParserService $feedParserService;

    private string $feedXssApi;

    /**
     * PicturesFeedService constructor.
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
     * @return array
     */
    public function getPictures():array
    {
        $pictures =  $this->feedParserService->getPicturesFromXss($this->feedXssApi);
        return $this->filterPictureService->applyfilter($pictures);
    }

}