<?php

namespace AHT\Blog\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeData implements UpgradeDataInterface
{
    protected $_blogFactory;

    public function __construct(\AHT\Blog\Model\BlogFactory $blogFactory)
    {
        $this->_blogFactory = $blogFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $data = [
                'title' => "Test Blog",
                'content'      => "Day la noi dung rat dai rat dai cua bai viet",
                'images' => "test.jpg",
                'description'      => "Day la mo ta test cua bai viet"
            ];
            $blog = $this->_blogFactory->create();
            $blog->addData($data)->save();
        }
        $setup->startSetup();
    }
}
