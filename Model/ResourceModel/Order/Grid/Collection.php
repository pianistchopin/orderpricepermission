<?php


namespace TP2M\Orderpricepermission\Model\ResourceModel\Order\Grid;


class Collection extends \Magento\Sales\Model\ResourceModel\Order\Grid\Collection
{
    protected function _renderFiltersBefore()
    {
        $sourceColumns = $this->getConnection()->describeTable($this->getMainTable());
        unset($sourceColumns['status']);
        $sourceColumns = array_keys($sourceColumns);

        /**
         * $collection->addFieldToSelect()
         * select main_table.sourceColumns from main_table
         */
        $this->addFieldToSelect($sourceColumns);

        /**
         * ->from();
         * ->columns();
         * these functions are to get like form
         * select main_table.*, main_table.fields ... from main_table
         *
         */
//        $this->getSelect()->from($this->getMainTable(),$sourceColumns);
//        $this->getSelect()->columns($sourceColumns);
//
//        $aa = $this->getSelect()->__toString();

        parent::_renderFiltersBefore();
    }
}
