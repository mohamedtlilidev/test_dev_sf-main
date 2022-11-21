<?php


namespace App\Service;

use App\Enum\ExtensionsPictureEnum;

/**
 * Class FilterPictureService
 * @package App\Service
 */
class FilterPictureService
{
    /**
     * @param array $items
     * @return array
     */
    public function applyFilter(array $items) :array
    {
        $pictures = array();
        $extensions = ExtensionsPictureEnum::EXTENSIONS;

        foreach ($items as $key => $item) {
            foreach ($extensions as $extension) {
                if (str_contains(strtolower($item), $extension) && !in_array($item, $pictures)) {
                    $pictures[] = $item;
                }
            }
        }

        return $pictures;
    }

}