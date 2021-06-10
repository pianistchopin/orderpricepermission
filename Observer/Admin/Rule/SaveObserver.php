<?php


namespace TP2M\Orderpricepermission\Observer\Admin\Rule;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Registry;
use TP2M\Orderpricepermission\Model\RuleFactory;

class SaveObserver implements ObserverInterface
{
    /**
     * Core registry
     *
     * @var Registry
     */
    private $coreRegistry;

    /**
     * @var RuleFactory
     */
    private $ruleFactory;


    public function __construct(
        Registry $registry,
        RuleFactory $ruleFactory
    ){
        $this->coreRegistry = $registry;
        $this->ruleFactory = $ruleFactory;
    }


    public function execute(Observer $observer)
    {
        // TODO: Implement execute() method.
        $role = $this->coreRegistry->registry('current_role');

        if (!$role->getId()) {
            return;
        }
        $request = $observer->getRequest();

        /**
         * ---------------------------- my note---------------------------------
         * in TP2M\Orderpricepermission\Block\Adminhtml\Role\Tab\Attributes,
         *         $fieldset->addField('order_attribute', 'text', [
         *              'label' => __('Allow Access To'),
         *              'id'    => 'orderpricepermission[order_attribute]',
         *              'name'  => 'orderpricepermission[order_attribute]',
         *           ]);
         * orderpricepermission  ==> request param
         * [order_attribute] ==> table field of database
         */
        $data = $request->getParam('orderpricepermission');

        if (!$data) {
            return;
        }

        /** @var  \TP2M\Orderpricepermission\Model\Rule $rule */
        $rule = $this->ruleFactory->create();
        $rule = $rule->load($role->getId(), 'role_id');

        $rule->setScopeWebsites([])
            ->setScopeStoreviews([]);

        $data['role_id'] = $role->getId();

        $rule->addData($data);

        $rule->save();
    }
}
