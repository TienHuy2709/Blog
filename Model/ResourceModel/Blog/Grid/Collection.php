<?php
namespace AHT\Blog\Model\ResourceModel\Blog\Grid;

use AHT\Blog\Model\Blog;
use Magento\Framework\Api;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface as FetchStrategy;
use Magento\Framework\Data\Collection\EntityFactoryInterface as EntityFactory;
use Psr\Log\LoggerInterface as Logger;

// use Magento\Framework\Api\Search\SearchResultInterface;

class Collection extends \Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult
{
    /**
     * Value of seconds in one minute
     */
    const SECONDS_IN_MINUTE = 60;

    /**
     * @var \Magento\Framework\Stdlib\DateTime\DateTime
     */
    protected $date;

    /**
     * @var Visitor
     */
    protected $visitorModel;
    private $id;

    /**
     * @param EntityFactory $entityFactory
     * @param Logger $logger
     * @param FetchStrategy $fetchStrategy
     * @param EventManager $eventManager
     * @param string $mainTable
     * @param string $resourceModel
     * @param Visitor $visitorModel
     * @param \Magento\Framework\Stdlib\DateTime\DateTime $date
     */
    public function __construct(
        EntityFactory $entityFactory,
        Logger $logger,
        FetchStrategy $fetchStrategy,
        EventManager $eventManager,
        $mainTable,
        $resourceModel,
        Blog $blogModel,
        \Magento\Framework\Stdlib\DateTime\DateTime $date
    ) {
        $this->date = $date;
        $this->blogModel = $blogModel;
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $mainTable, $resourceModel);
    }
    public function setBlogId($id){
        $this->id = $id;
    }

    public function getBlogId(){
        return $this->id;
    }
    public function selectById()
    {
        $select = $this->getConnection()

            ->select()

            ->from($this->getMainTable())

            ->where( 'aht_comment.blogid'. '=?', $this->id)

            ->join('aht_comment',

                'aht_blog.id = aht_comment.blogid',

                [
                    'aht_comment.email', 'aht_comment.contentcm', 'aht_comment.blogid'
                ]);
        return $this->getConnection()->fetchAll($select);

    }

}
