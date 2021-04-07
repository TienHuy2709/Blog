<?php
namespace AHT\Blog\Controller\Index;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Customer\Model\SessionFactory;
use AHT\Blog\Model\ResourceModel\Blog\Grid\CollectionFactory;

class Detail extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    protected $_coreRegistry;
    protected $_blogCollectionFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $coreRegistry,
        CollectionFactory $blogCollectionFactory
    ) {
        $this->_coreRegistry = $coreRegistry;
        $this->resultPageFactory = $resultPageFactory;
        $this->_blogCollectionFactory = $blogCollectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->_request->getParam('id');
        $this->_coreRegistry->register('detailID', $id);
/*        $data = $this->_blogCollectionFactory->create();
        $data->setBlogId($id);
        $data = $data->selectById();*/
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}
