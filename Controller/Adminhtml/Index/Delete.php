<?php

namespace AHT\Blog\Controller\Adminhtml\Index;

use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Result\PageFactory;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    /**
     * Delete Banner
     *
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        // check if we know what should be deleted
        $blogId = (int)$this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->_objectManager->create('AHT\Blog\Model\ResourceModel\Comment\Grid\Collection');
        $data->setBlogId($blogId);
        if ($blogId && (int)$blogId > 0) {
            try {
                $model = $this->_objectManager->create('AHT\Blog\Model\Blog');
                $model->load($blogId);
                $data->deleteByBlogId();
                $model->delete();
                $this->messageManager->addSuccess(__('The Blog has been deleted successfully.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to the question grid
                return $resultRedirect->setPath('*/*/index');
            }
        }
        // display error message
        $this->messageManager->addError(__('Blog doesn\'t exist any longer.'));
        // go to the question grid
        return $resultRedirect->setPath('*/*/index');
    }
}
