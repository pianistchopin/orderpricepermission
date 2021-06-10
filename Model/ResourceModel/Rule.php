<?php


namespace TP2M\Orderpricepermission\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Rule extends AbstractDb
{

    protected function _construct()
    {
        // TODO: Implement _construct() method.
        $this->_init('tp2m_orderpricepermission_attribute', 'id');
    }
}
