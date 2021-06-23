<?php


namespace TP2M\Orderpricepermission\Ui;


use Magento\Framework\View\Element\UiComponent\ContextInterface;

class MassAction extends \Magento\Ui\Component\MassAction
{
    protected $_helper;

    public function __construct(
        ContextInterface $context,
        array $components = [],
        \TP2M\Orderpricepermission\Helper\Data $helper,
        array $data = [])
    {
        $this->_helper = $helper;
        parent::__construct($context, $components, $data);
    }

    public function prepare()
    {
        parent::prepare();
        $excludeAttribute = $this->_helper->getExcludeColumns('order');
        if(count($excludeAttribute)){
            $config = $this->getConfiguration();
            //if (!$this->authorization->isAllowed('Magento_Catalog::the_acl_youd_like_to_use')) {
            $allowedActions = [];
            foreach ($config['actions'] as $action) {
                if ('fooman_order_pdfinvoices' != $action['type']
                    && 'fooman_order_pdfshipments' != $action['type']
                    && 'fooman_order_pdfcreditmemos' != $action['type']
                    &&'fooman_order_pdfdocs' != $action['type']
                    && 'print_shipping_label' != $action['type']
                    && 'fooman_pdforders' != $action['type']
                )
                { //add action which you remove
                    $allowedActions[] = $action;
                }
            }
            $config['actions'] = $allowedActions;
            //}
            $this->setData('config', (array)$config);
        }
    }
}
