<?php


namespace TP2M\Orderpricepermission\Helper;


use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Registry;
use TP2M\Orderpricepermission\Model\RuleFactory;
use Magento\Backend\Model\Auth\Session;

class Data extends AbstractHelper
{

    /**
     * @var Registry
     */
    protected $coreRegistry;

    /**
     * @var RuleFactory
     */
    protected $ruleFactory;

    /**
     * @var Session
     */
    protected $authSession;

    public function __construct(
        Context $context,
        Registry $registry,
        RuleFactory $ruleFactory,
        Session $authSession
    ){
        $this->coreRegistry = $registry;
        $this->ruleFactory = $ruleFactory;
        $this->authSession = $authSession;
        parent::__construct($context);
    }

    /**
     * @param $orderType
     * orderType: order, invoice, shipment, creditmemo
     */
    public function getExcludeColumns($orderType){

        $roleId = $this->authSession->getUser()->getRole()->getId();

        /** @var  \TP2M\Orderpricepermission\Model\Rule $rule */
        $rule = $this->ruleFactory->create();
        $rule = $rule->load($roleId, 'role_id');

        $excludeColumnStr = '';

        if($orderType == 'order'){
            $excludeColumnStr = $rule->getOrderAttribute();
        }
        else if($orderType == 'invoice'){
            $excludeColumnStr = $rule->getInvoiceAttribute();
        }
        else if($orderType == 'shipment'){
            $excludeColumnStr = $rule->getShipmentAttribute();
        }
        else if($orderType == 'creditmemo'){
            $excludeColumnStr = $rule->getCreditmemoAttribute();
        }

        if($excludeColumnStr == ''){
            $excludeColumnArr = [];
        }else{
            $excludeColumnArr = explode(",", str_replace(' ', '',$excludeColumnStr));
        }

        return $excludeColumnArr;
    }
}
