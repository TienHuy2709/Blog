<?php
namespace AHT\Blog\Model\ResourceModel\Blog;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'aht_blog_collection';
    protected $_eventObject = 'Blog_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('AHT\Blog\Model\Blog', 'AHT\Blog\Model\ResourceModel\Blog');
    }

}
