<?php
namespace AHT\Blog\Model;

use \Magento\Framework\DataObject\IdentityInterface;

// class Blog extends AbstractModel implements IdentityInterface
class Blog extends \Magento\Framework\Model\AbstractModel {
    const CACHE_TAG = 'aht_blog_post';

    protected $_cacheTag = 'aht_blog_post';

    protected $_eventPrefix = 'aht_blog_post';

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource =
        null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection =
        null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource,$resourceCollection, $data);
    }
    public function _construct() {
        $this->_init('AHT\Blog\Model\ResourceModel\Blog');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }

    public function getId()
    {
        return $this->getData('id');
    }
    public function setId($id)
    {
        $this->setData('id', $id);
    }

    public function getTitle()
    {
        return $this->getData('title');
    }
    public function setTitle($title)
    {
        $this->setData('title', $title);
    }

    public function getImages()
    {
        return $this->getData('images');
    }
    public function setImages($images)
    {
        $this->setData('images', $images);
    }

    public function getDescription()
    {
        return $this->getData('description');
    }
    public function setDescription($description)
    {
        $this->setData('description', $description);
    }

    public function getContent()
    {
        return $this->getData('content');
    }
    public function setContent($content)
    {
        $this->setData('content', $content);
    }
}
