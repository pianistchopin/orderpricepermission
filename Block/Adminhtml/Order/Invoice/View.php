<?php


namespace TP2M\Orderpricepermission\Block\Adminhtml\Order\Invoice;


class View extends \Magento\Sales\Block\Adminhtml\Order\Invoice\View
{

    protected $_helper;

    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Backend\Model\Auth\Session $backendSession,
        \Magento\Framework\Registry $registry,
        \TP2M\Orderpricepermission\Helper\Data $helper,
        array $data = []
    ) {
        $this->_helper = $helper;
        parent::__construct($context, $backendSession, $registry, $data);
    }

    protected function _construct()
    {
        parent::_construct();
        $excludeAttribute = $this->_helper->getExcludeColumns('invoice');
        if(count($excludeAttribute)){
            $this->buttonList->remove('print');
        }
    }
}
