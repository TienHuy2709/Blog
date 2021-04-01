<?php

namespace AHT\Blog\Api\Data;

interface BlogInterface
{
    const ID = 'id';

    /**
     * Get portfolio id
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set portfolio id
     *
     * @param int $id
     * @return @this
     */
    public function setId($id);

    /**
     * Get portfolio title
     *
     * @return string|null
     */
    public function getTitle();

    /**
     * Set portfolio title
     *
     * @param string $title
     * @return null
     */
    public function setTitle($title);

    /**
     * Get portfolio images
     *
     * @return string|null
     */
    public function getImages();

    /**
     * Set portfolio images
     *
     * @param string $images
     * @return null
     */
    public function setImages($images);

    /**
     * Get portfolio description
     *
     * @return string|null
     */
    public function getDescription();

    /**
     * Set portfolio description
     *
     * @param string $description
     * @return null
     */
    public function setDescription($description);

    /**
     * Get portfolio content
     *
     * @return string|null
     */
    public function getContent();

    /**
     * Set portfolio content
     *
     * @param string $content
     * @return null
     */
    public function setContent($content);
}
