<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace AHT\Blog\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Upgrade the Catalog module DB scheme
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.0.2', '<')) {
            $setup->getConnection()->addColumn(
                $setup->getTable('aht_comment'),
                'blogid',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    'nullable' => false,
                    'default' => 0,
                    'comment' => 'blog-id'
                ]
            );
        }

        if (version_compare($context->getVersion(), '1.0.3', '<')) {
            $setup->getConnection()->changeColumn(
                $setup->getTable('aht_comment'),
                'content',
                'contentcm',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    'nullable' => false,
                    'default' => 0,
                    'comment' => 'Comment Content'
                ]
            );
        }

        if (version_compare($context->getVersion(), '1.0.4', '<')) {
            $setup->getConnection()->modifyColumn(
                $setup->getTable('aht_comment'),
                'contentcm',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'nullable' => false,
                    'default' => ''
                ]
            );
        }

        if (version_compare($context->getVersion(), '1.0.5', '<')) {
            $setup->getConnection()->modifyColumn(
                $setup->getTable('aht_blog'),
                'content',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'size' => 100000,
                    'nullable' => false,
                    'default' => ''
                ]
            );
        }
        if (version_compare($context->getVersion(), '1.0.6', '<')) {
            $table1 = $setup->getTable('aht_blog');
            $table2 = $setup->getTable('aht_comment');
            $setup->getConnection()
                ->addIndex(
                    $table1,
                    $setup->getIdxName(
                        $table1,
                        ['title', 'content', 'description'],
                        \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                    ),
                    ['title', 'content', 'description'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                );

            $setup->getConnection()
                ->addIndex(
                    $table2,
                    $setup->getIdxName(
                        $table2,
                        ['email', 'contentcm'],
                        \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                    ),
                    ['email', 'contentcm'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                );
        }
        $setup->endSetup();
    }

}
