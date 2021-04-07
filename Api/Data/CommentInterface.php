<?php

namespace AHT\Blog\Api\Data;

interface CommentInterface
{
    const ID = 'id';

    /**
     * Get comment id
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set comment id
     *
     * @param int $id
     * @return @this
     */
    public function setId($id);

    /**
     * Get comment title
     *
     * @return string|null
     */
    public function getEmail();

    /**
     * Set comment title
     *
     * @param string $email
     * @return null
     */
    public function setEmail($email);

    /**
     * Get comment $content
     *
     * @return string|null
     */
    public function getContentcm();

    /**
     * Set comment content
     *
     * @param string $contentcm
     * @return null
     */
    public function setContentcm($contentcm);

    /**
     * Get comment description
     *
     * @return string|null
     */
    public function getBlogid();

    /**
     * Set comment description
     *
     * @param string $blogid
     * @return null
     */
    public function setBlogid($blogid);
}
