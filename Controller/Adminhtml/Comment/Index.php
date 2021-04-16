<?php

namespace AHT\Blog\Controller\Adminhtml\Comment;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('AHT_Blog:comment');
        $resultPage->addBreadcrumb(__('Comment'), __('Comment'));
        $resultPage->addBreadcrumb(__('Manage Comment'), __('Manage Comment'));
        $resultPage->getConfig()->getTitle()->prepend(__('Comment'));
        return $resultPage;
    }

}
