<?php


namespace TP2M\Orderpricepermission\Controller\Adminhtml\Order;

use Magento\Backend\App\Action;

class Attributes extends Action
{

    /**
     * @var \Magento\Framework\View\Result\LayoutFactory
     */
    protected $resultLayoutFactory;

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /** @var \TP2M\Orderpricepermission\Model\Rule $rule */
    protected $rule;

    /**
     * Attributes constructor.
     * @param Action\Context $context
     * @param \Magento\Framework\View\Result\LayoutFactory $resultLayoutFactory
     */
    public function __construct(
        Action\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\View\Result\LayoutFactory $resultLayoutFactory,
        \TP2M\Orderpricepermission\Model\Rule $rule
    ) {
        parent::__construct($context);
        $this->_coreRegistry = $registry;
        $this->resultLayoutFactory = $resultLayoutFactory;
        $this->rule = $rule;
    }

    public function execute()
    {
        if ($rid = (int) $this->_request->getParam('rid')) {
            $this->rule->load($rid, 'role_id');
        }

        $this->_coreRegistry->register('tp2mpermission_current_rule', $this->rule);
        return $this->resultLayoutFactory->create();
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magento_User::acl_roles');
    }
}
