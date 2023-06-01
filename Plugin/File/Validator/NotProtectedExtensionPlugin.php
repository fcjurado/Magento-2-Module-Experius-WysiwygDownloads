<?php
namespace Experius\WysiwygDownloads\Plugin\File\Validator;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class NotProtectedExtensionPlugin extends Action
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    /**
     * Remove svg from Not Protected Extensions
     * It is described in magento/app/code/Fluidra/Uploader/etc/config.xml,
     * but sometimes Magento stills trolling me and says SVG is inside this config ¯\_(ツ)_/¯
     * 
     * @param \Magento\MediaStorage\Model\File\Validator\NotProtectedExtension $extension
     * @param array $result
     * @return array
     */
    public function afterGetProtectedFileExtensions(
        \Magento\MediaStorage\Model\File\Validator\NotProtectedExtension $extension,
        $result
    ) {
        if (in_array('svg', $result)) {
            unset($result['svg']);
        }
        return $result;
    }

    public function execute()
    {
    }
}
