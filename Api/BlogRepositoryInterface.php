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
    public function getById(string $id);

    /**
     * Get All
     *
     * @return \AHT\Blog\Api\Data\BlogInterface
     */
    public function getList();

    /**
     * Create post.
     *
     * @param \AHT\Blog\Api\Data\BlogInterface $post
     *
     * @return \AHT\Blog\Api\Data\BlogInterface
     */
    public function createPost(\AHT\Blog\Api\Data\BlogInterface $post);

    /**
     * Update post
     *
     * @param String $id
     * @param \AHT\Blog\Api\Data\BlogInterface $post
     *
     * @return null
     */
    public function updatePost(string $id, \AHT\Blog\Api\Data\BlogInterface $post);

    /**
     * Delete Post by ID.
     *
     * @param string $postId
     * @return \AHT\Blog\Api\Data\BlogInterface
     */
    public function deleteById($postId);
}
