<?php


namespace App\Enum;

/**
 * Class ExtensionsImageEnum
 * @package App\Enum
 */
abstract class ExtensionsPictureEnum
{
    private const JPEG_EXTENSION = 'jpeg';
    private const PNG_EXTENSION = 'png';
    private const JPG_EXTENSION = 'jpg';
    private const GIF_EXTENSION = 'git';
    private const HTTP_EXTENSION = 'http';
    private const ICO_EXTENSION = 'ico';
    private const ICOX_EXTENSION = 'icox';


    public const EXTENSIONS =
        [
            self::JPEG_EXTENSION,
            self::PNG_EXTENSION,
            self::JPG_EXTENSION,
            self::GIF_EXTENSION,
            self::HTTP_EXTENSION,
            self::ICO_EXTENSION,
            self::ICOX_EXTENSION
        ];

}