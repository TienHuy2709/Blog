<?php
namespace AHT\Blog\Model;

use \Magento\Framework\DataObject\IdentityInterface;

// class Portfolio extends AbstractModel implements IdentityInterface
class Comment extends \Magento\Framework\Model\AbstractModel {
    const CACHE_TAG = 'aht_comment_post';

    protected $_cacheTag = 'aht_comment_post';

    protected $_eventPrefix = 'aht_comment_post';

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
        $this->_init('AHT\Blog\Model\ResourceModel\Comment');
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

    public function getEmail()
    {
        return $this->getData('email');
    }
    public function setEmail($email)
    {
        $this->setData('email', $email);
    }

    public function getContent()
    {
        return $this->getData('content');
    }
    public function setImages($content)
    {
        $this->setData('content', $content);
    }

    public function getDescription()
    {
        return $this->getData('blogid');
    }
    public function setDescription($blogid)
    {
        $this->setData('blogid', $blogid);
    }
}
