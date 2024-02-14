<?php
declare(strict_types=1);

namespace Admin\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Psr\Http\Message\UploadedFileInterface;

/**
 * Image component
 */
class ImageComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [];
    private string $uploadDir = WWW_ROOT . 'uploads/';

    public function create(UploadedFileInterface $image, string $imgName)
    {
        $imgResized = imagescale($this->GDimageCreate($image->getClientMediaType(),  $image->getStream()->getMetadata('uri')), 150);

        $image->moveTo($this->uploadDir . $imgName);
        imagejpeg($imgResized, $this->uploadDir . 'thumb/' . $imgName);
    }

    public function delete(string $imgName)
    {
        $this->removeImg($this->uploadDir . $imgName);
        $this->removeImg($this->uploadDir . 'thumb/' . $imgName);
    }

    private function GDimageCreate($type, $file)
    {
        switch ($type) {
            case 'image/jpeg':
                return imagecreatefromjpeg($file);
                break;
            case 'image/png':
                return imagecreatefrompng($file);
                break;
            case 'image/gif':
                return imagecreatefromgif($file);
                break;
            default:
                return false;
        }
    }

    private static function removeImg(string $imgLink): void
    {
        if (file_exists($imgLink)) {
            unlink($imgLink);
        }
    }
}
