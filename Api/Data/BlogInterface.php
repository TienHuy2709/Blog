<?php

namespace AHT\Blog\Api\Data;

interface BlogInterface
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
    public function getTitle();

    /**
     * Set comment title
     *
     * @param string $title
     * @return null
     */
    public function setTitle($title);

    /**
     * Get comment images
     *
     * @return string|null
     */
    public function getImages();

    /**
     * Set comment images
     *
     * @param string $images
     * @return null
     */
    public function setImages($images);

    /**
     * Get comment description
     *
     * @return string|null
     */
    public function getDescription();

    /**
     * Set comment description
     *
     * @param string $description
     * @return null
     */
    public function setDescription($description);

    /**
     * Get comment content
     *
     * @return string|null
     */
    public function getContent();

    /**
     * Set comment content
     *
     * @param string $content
     * @return null
     */
    public function setContent($content);
}
