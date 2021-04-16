<?php

namespace AHT\Blog\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{

    const XML_PATH_BLOG = 'blog/';

    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $field, ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    public function getBlogConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_BLOG . 'blog/' . $code, $storeId);
    }

    public function getSlideConfig($code, $storeId = null)
    {
        return $this->scopeConfig->getValue('blog/slide/' . $code, ScopeInterface::SCOPE_STORE);
    }

    public function getNumberBlog($code, $storeId = null)
    {
        return $this->scopeConfig->getValue('blog/number_blog/' . $code, ScopeInterface::SCOPE_STORE);
    }

}
