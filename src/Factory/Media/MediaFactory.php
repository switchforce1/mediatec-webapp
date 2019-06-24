<?php
/**
 * Created by PhpStorm.
 * User: Dadja
 * Date: 12/05/2019
 * Time: 05:21
 */

namespace App\Factory\Media;

use App\Entity\Media\Image;
use App\Entity\Media\Video;

/**
 * Class MediaFactory
 * @package App\Factory\Media
 */
class MediaFactory
{
    /**
     * @return Image
     */
    public function createImage()
    {
        return new Image();
    }

    /**
     * @return Video
     */
    public function createVideo()
    {
        return new Video();
    }
}
