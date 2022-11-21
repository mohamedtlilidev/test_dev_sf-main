<?php


namespace App\Service;

use App\Enum\ExtensionsPictureEnum;

/**
 * Class FilterImageService
 * @package App\Service
 */
class FilterPictureService
{
    /**
     * @param array $items
     * @return array
     */
    public function applyfilter(array $items) :array
    {
        $images = array();
        $extensions = ExtensionsPictureEnum::EXTENSIONS;

        foreach ($items as $key => $item) {
            foreach ($extensions as $extension) {
                if (str_contains(strtolower($item), $extension) && !in_array($item, $images)) {
                    $images[] = $item;
                }
            }
        }

        return $images;
    }

}