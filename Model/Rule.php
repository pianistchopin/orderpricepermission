<?php


namespace TP2M\Orderpricepermission\Model;


class Rule extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init('TP2M\Orderpricepermission\Model\ResourceModel\Rule');
        $this->setIdFieldName('id');
    }
}
