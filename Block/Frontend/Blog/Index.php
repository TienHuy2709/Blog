<?php
namespace AHT\Blog\Block\Frontend\Blog;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use Magento\Framework\View\Element\Template\Context;
use AHT\Blog\Model\ResourceModel\Blog\Grid\CollectionFactory;

class Index extends Template implements BlockInterface
{
    protected $_collection;
    public $_storeManager;
    public $_customerSession;

    public $_helperData;

    public function __construct(
        CollectionFactory $blogCollectionFactory,
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        \AHT\Blog\Helper\Data $helperData,
        array $data = []

    )
    {
        parent::__construct($context, $data);
        $this->_customerSession = $customerSession;
        $this->_helperData = $helperData;
        $this->_collection =  $blogCollectionFactory->create();
    }

    public function getDataBlocks()
    {

        $blog = $this->_collection;
        $items = $blog->getItems();
        foreach($items as $item)
        {
            $itemData = $item->getData();
            $this->_loadedData[$item->getId()] = $itemData;
        }
        return $this->_loadedData;
    }

    public function getStoreManager(){
        return $this->_storeManager;
    }

    public function getSlideBlogManager(){
        return $this->_helperData->getSlideConfig('is_enabled');
    }

    public function getBlogInPage(){
        return $this->_helperData->getNumberBlog('number_in_page');
    }

    public function getBlogInSlide(){
        return $this->_helperData->getNumberBlog('number_in_slide');
    }
}
