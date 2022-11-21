<?php


namespace App\Service;


use App\Interfaces\ApiServiceInterface;

/**
 * Class FeedParserService
 * @package App\Service
 */
class FeedParserService
{
    /**
     * @param string $feed
     * @return array
     */
    public function getPicturesFromXss(string $feed) :array
    {
        $picturesFeed = array();
        if ($feed) {
            $content = file_get_contents($feed);
            try {
                $rss = new \SimpleXmlElement($content);

                foreach ($rss->channel->item as $item) {
                    $media = $item->children('media', true)->content->attributes();
                    $picturesFeed[] = $media;
                }
            }
            catch(\Exception $e){
                return $picturesFeed;
            }
        }

        return $picturesFeed;
    }

}