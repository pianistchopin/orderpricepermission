<?php


namespace TP2M\Orderpricepermission\Block\Adminhtml\Role\Tab;


class Attributes extends \Magento\Backend\Block\Widget\Form\Generic
{
    protected function _prepareForm()
    {
        /** @var \TP2M\Orderpricepermission\Model\Rule $model */
        $model = $this->_coreRegistry->registry('tp2mpermission_current_rule');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('rule_');

        $fieldset = $form->addFieldset('tp2morderpricepermission_attributes_fieldset', ['legend' => __('Attributes Access')]);

        /**
         * ---------------------------- my note---------------------------------
         * match elementId and table field
         * $model->getData(): table field data
         * $form->addValues($model->getData()) ===> match and fill data to admin html fields
         *
         *
         * in TP2M\Orderpricepermission\Observer\Admin\Rule\SaveObserver
         * $data = $request->getParam('orderpricepermission');
         * orderpricepermission  ==> param
         *
         */
        $fieldset->addField('order_attribute', 'text', [
            'label' => __('Order Attribute'),
            'id'    => 'orderpricepermission[order_attribute]',
            'name'  => 'orderpricepermission[order_attribute]',
        ]);

        $fieldset->addField('invoice_attribute', 'text', [
            'label' => __('Invoice Attribute'),
            'id'    => 'orderpricepermission[invoice_attribute]',
            'name'  => 'orderpricepermission[invoice_attribute]',
        ]);

        $fieldset->addField('shipment_attribute', 'text', [
            'label' => __('Shipment Attribute'),
            'id'    => 'orderpricepermission[shipment_attribute]',
            'name'  => 'orderpricepermission[shipment_attribute]',
        ]);

        $fieldset->addField('creditmemo_attribute', 'text', [
            'label' => __('Credit memo Attribute'),
            'id'    => 'orderpricepermission[creditmemo_attribute]',
            'name'  => 'orderpricepermission[creditmemo_attribute]',
        ]);

        $form->addValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
