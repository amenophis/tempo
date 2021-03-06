<?php

/*
* This file is part of the Tempo-project package http://tempo.ikimea.com/>.
*
* (c) Mlanawo Mbechezi  <mlanawo.mbechezi@ikimea.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Tempo\Bundle\CoreBundle\Imagine\Cache;

use Imagine\Image\ImagineInterface;
use Imagine\Filter\Basic\Resize;
use Imagine\Image\Box;

use Symfony\Component\Filesystem\Filesystem;

class CacheManager
{
    /**
     * @var string
     */
    protected $cachePath;

    /**
     * @var
     */
    protected $driver;

    /**
     * @var Filesystem
     */
    protected $filesystem;

    /**
     * @param ImagineInterface $driver
     */
    public function __construct(ImagineInterface $driver, Filesystem $file)
    {
        $this->driver = $driver;
        $this->filesystem = $file;
    }

    /**
     * @param $cachePath
     */
    public function setBasePath($cachePath)
    {
        if (!is_dir($cachePathTemp = $cachePath. 'media/cache')) {
            $this->filesystem->mkdir($cachePathTemp);
        }
        $this->cachePath = $cachePath;
    }

    /**
     * @param $path
     * @param $sizes
     * @return mixed
     */
    public function getBrowserPath($path,$sizes)
    {
        if(!is_array($sizes)) {
            $sizes = array($sizes, $sizes);
        }

        $path =  $this->getResolver($path);
        $pathinfo = pathinfo($path);
        $imagePath = $this->cachePath.'media/cache/'.md5($pathinfo['basename']).'.'.$pathinfo['extension'];

        if(!is_file($imagePath)) {
           $this->generateImage($path,$imagePath, $sizes);
        }

        if(strpos('web', $imagePath) === true) {
            $imagePath = explode('web', $imagePath);
            $imagePath = $imagePath[0];
        }
        return $imagePath;
    }

    /**
     * @param $path
     * @return string
     */
    protected function getResolver($path)
    {
        if (substr($path, 0, 7) == 'bundles') {
            $path = $this->cachePath .'../'.ltrim($path);
        }

        return $path;
    }

    /**
     * Generate Thumbnail
     * @param $imageOriginal
     * @param $newImage
     * @param $sizes
     */
    protected function generateImage($imageOriginal, $newImage, $sizes)
    {
        $filter = new Resize(new Box($sizes[0], $sizes[1]));
        $filter
            ->apply($this->driver->open($imageOriginal))
            ->save($newImage, array('quality' => 70));
    }
}