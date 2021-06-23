<?php


namespace TP2M\Orderpricepermission\Block\Adminhtml\Order\Creditmemo;


class View extends \Magento\Sales\Block\Adminhtml\Order\Creditmemo\View
{

    protected $_helper;

    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        \TP2M\Orderpricepermission\Helper\Data $helper,
        array $data = []
    ) {
        $this->_helper = $helper;
        parent::__construct($context, $registry, $data);
    }

    protected function _construct()
    {
        parent::_construct();
        $excludeAttribute = $this->_helper->getExcludeColumns('creditmemo');
        if(count($excludeAttribute)){
            $this->buttonList->remove('print');
        }
    }

}
