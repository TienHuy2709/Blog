<?php

namespace AHT\Blog\Controller\Index;

use Magento\Framework\App\Action\Context;
use  Magento\Framework\App\Filesystem\DirectoryList;


class Save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \AHT\Blog\Model\Comment
     */
    protected $_commentFactory;

    /**
     * @var \AHT\Blog\Model\ResourceModel\Comment
     */
    protected $_resource;

    protected $_pageFactory;

    protected $resultRedirect;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;
    protected $adapterFactory;

    private $_cacheTypeList;
    private $_cacheFrontendPool;

    /**
     * Save constructor.
     * @param Context $context
     * @param \AHT\Blog\Model\CommnetFactory $commentFactory
     * @param \AHT\Blog\Model\ResourceModel\Comment $resource
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\Controller\ResultFactory $result
     * @param \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList
     * @param \Magento\Framework\Filesystem $filesystem
     * @param \Magento\Framework\App\Cache\Frontend\Pool $cacheFrontendPool
     */
    public function __construct(
        Context $context,
        \AHT\Blog\Model\CommentFactory $commentFactory,
        \AHT\Blog\Model\ResourceModel\Comment $resource,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Controller\ResultFactory $result,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
        \Magento\Framework\Filesystem $filesystem,
        \Magento\Framework\App\Cache\Frontend\Pool $cacheFrontendPool,
        \Magento\MediaStorage\Model\File\UploaderFactory $uploaderFactory,
        \Magento\Framework\Image\AdapterFactory $adapterFactory
    )
    {
        $this->_commentFactory = $commentFactory;
        $this->_storeManager = $storeManager;
        $this->_resource = $resource;
        $this->resultRedirect = $result;
        $this->_filesystem = $filesystem;
        $this->_cacheTypeList = $cacheTypeList;
        $this->_cacheFrontendPool = $cacheFrontendPool;
        $this->uploaderFactory = $uploaderFactory;
        $this->adapterFactory = $adapterFactory;

        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $data = $this->getRequest()->getPostValue();
        $comment = $this->_commentFactory->create();
        if ($data) {
            $data = [
                'email' => $data['email'],
                'contentcm' => $data['contentcm'],
                'blogid' => $id
            ];
            $comment->setData($data);
        }
        $comment->save($data);
        $types = array('config','layout','block_html','collections','reflection','db_ddl','compiled_config','eav','config_integration','config_integration_api','full_page','translate','config_webservice','vertex');
        foreach ($types as $type) {
            $this->_cacheTypeList->cleanType($type);
        }
        foreach ($this->_cacheFrontendPool as $cacheFrontend) {
            $cacheFrontend->getBackend()->clean();
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('blog/index/detail/id/'.$id);
        return $resultRedirect;
    }
}
