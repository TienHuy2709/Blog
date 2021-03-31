<?php
namespace AHT\Blog\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface BlogRepositoryInterface
{
    /**
     * Save Post.
     *
     * @param \AHT\Blog\Api\Data\BlogInterface $post
     *
     * @return \AHT\Blog\Api\Data\BlogInterface
     */
    public function save(\AHT\Blog\Api\Data\BlogInterface $post);

    /**
     * Get object by id
     *
     * @return \AHT\Blog\Api\Data\BlogInterface
     */
    public function getById(String $id);

}
