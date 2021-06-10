<?php


namespace TP2M\Orderpricepermission\Setup;


use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        // TODO: Implement install() method.
        $installer = $setup;

        $installer->startSetup();

        /**
         * Create table
         */

        $table = $installer->getConnection()
            ->newTable($installer->getTable('tp2m_orderpricepermission_attribute'))
            ->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true]
            )
            ->addColumn(
                'role_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false]
            )
            ->addColumn(
                'order_attribute',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                []
            )
            ->addColumn(
                'invoice_attribute',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                []
            )
            ->addColumn(
                'shipment_attribute',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                []
            )
            ->addColumn(
                'creditmemo_attribute',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                []
            );

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
