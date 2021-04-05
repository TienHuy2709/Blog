<?php
namespace AHT\Blog\Block\Frontend\Blog;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Registry;
use AHT\Blog\Model\ResourceModel\Blog\Grid\CollectionFactory;

class Detail extends Template
{
    protected $_pageFactory;
    protected $_coreRegistry;
    protected $_blogCollectionFactory;
    public $_storeManager;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Registry $coreRegistry,
        CollectionFactory $blogCollectionFactory,
        array $data = []
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_coreRegistry = $coreRegistry;
        $this->_blogCollectionFactory = $blogCollectionFactory;
        return parent::__construct($context,$data);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }

    public function getEditRecord()
    {
        $id = $this->_coreRegistry->registry('detailID');
        $data = $this->_blogCollectionFactory->create();
        $result = $data->addFieldToFilter('id',$id);
        $blog = $result->getData();
        return $blog[0];
    }
}
