<?php
namespace AHT\Blog\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CommentRepositoryInterface
{
    /**
     * Save Post.
     *
     * @param \AHT\Blog\Api\Data\CommentInterface $post
     *
     * @return \AHT\Blog\Api\Data\CommentInterface
     */
    public function save(\AHT\Blog\Api\Data\CommentInterface $post);

    /**
     * Get object by id
     *
     * @return \AHT\Blog\Api\Data\CommentInterface
     */
    public function getById(String $id);
    /**
     * Get All
     *
     * @return \AHT\Blog\Api\Data\CommentInterface
     */
    public function getList();

    /**
     * Create post.
     *
     * @param \AHT\Blog\Api\Data\CommentInterface $post
     *
     * @return \AHT\Blog\Api\Data\CommentInterface
     */
    public function createPost(\AHT\Blog\Api\Data\CommentInterface $post);

    /**
     * Update post
     *
     * @param String $id
     * @param \AHT\Blog\Api\Data\CommentInterface $post
     *
     * @return null
     */
    public function updatePost(String $id, \AHT\Blog\Api\Data\CommentInterface $post);

    /**
     * Delete Post by ID.
     *
     * @param string $postId
     * @return \AHT\Blog\Api\Data\CommentInterface
     */
    public function deleteById($postId);
}
