<?php
namespace AHT\Blog\Plugin;
use Magento\Framework\Interception;
class Blog1
{
    public function afterGetTitle(\AHT\Blog\Model\Blog $subject, $title)
    {
        return $title . 'DA TEST XONG PLUGIN';
    }
}
