<?php


namespace TP2M\Orderpricepermission\Block\Adminhtml\Role\Tab;


class Attributes extends \Magento\Backend\Block\Widget\Form\Generic
{
    protected function _prepareForm()
    {
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('rule_');

        $fieldset = $form->addFieldset('tp2morderpricepermission_attributes_fieldset', ['legend' => __('Attributes Access')]);

        $mode = $fieldset->addField('attribute_access_mode', 'text', [
            'label' => __('Allow Access To'),
            'id'    => 'aaaaa',
            'name'  => 'aaaaa',
        ]);

        $this->setForm($form);

        return parent::_prepareForm();
    }
}
