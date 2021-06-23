<?php


namespace TP2M\Orderpricepermission\Plugin\Sales\Ui\Component\Control;


class PdfAction
{

    protected $_helper;

    public function __construct(
        \TP2M\Orderpricepermission\Helper\Data $helper
    ){
        $this->_helper = $helper;
    }

    public function afterPrepare(\Magento\Sales\Ui\Component\Control\PdfAction $subject, $result){
        $excludeAttribute = $this->_helper->getExcludeColumns('order');
        if(count($excludeAttribute)){
            $action = $subject->getConfiguration();

            $config = [];
            if ('pdfinvoices_order' != $action['type']
                && 'pdfshipments_order' != $action['type']
                && 'pdfcreditmemos_order' != $action['type']
            )
            { //add action which you remove
                $config[] = $action;
            }
            $subject->setData('config', (array)$config);
        }
        return $result;
    }
}
