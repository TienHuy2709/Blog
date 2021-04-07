<?php
namespace AHT\Blog\Ui\Component\Blog\Column;

use AHT\Blog\Model\ResourceModel\Blog\Grid\CollectionFactory;

class ListOptionForm implements \Magento\Framework\Option\ArrayInterface
{
    protected $_blogFactory;
    protected $_loadedData;

    public function __construct(
        CollectionFactory $blogCollectionFactory
    ){
        $this->_blogFactory = $blogCollectionFactory->create();
        // die;
    }

    public function toOptionArray()
    {
        $blogs = $this->_blogFactory->getItems();
        $optionArray = [];
        foreach($blogs as $blog){
            $blog = $blog->getData();
            array_push($optionArray,[
                'value'  => $blog['id'],
                'label'  => $blog['id'],
            ]);
        }
        return $optionArray;
    }
}
