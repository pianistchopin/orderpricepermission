<?php


namespace TP2M\Orderpricepermission\Block\Adminhtml;


class PrintOrderButton extends \Fooman\PrintOrderPdf\Block\Adminhtml\PrintOrderButton
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
        $excludeAttribute = $this->_helper->getExcludeColumns('order');
        if(count($excludeAttribute)){
            $this->removeButton('fooman_print');
        }
    }
}
