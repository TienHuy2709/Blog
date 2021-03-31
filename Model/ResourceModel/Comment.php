<?php
namespace AHT\Blog\Model\ResourceModel;

class Comment extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    protected function _construct()
    {
        $this->_init('aht_comment', 'id');
    }
}
