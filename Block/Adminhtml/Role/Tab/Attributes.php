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

        /*
         * match elementId and table field
         * $model->getData(): table field data
         * $form->addValues($model->getData()) ===> match and fill data to admin html fields
         */
        $fieldset->addField('order_attribute', 'text', [
            'label' => __('Allow Access To'),
            'id'    => 'orderpricepermission[order_attribute]',
            'name'  => 'orderpricepermission[order_attribute]',
        ]);

        $form->addValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
