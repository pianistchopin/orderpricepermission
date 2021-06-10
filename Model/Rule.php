<?php


namespace TP2M\Orderpricepermission\Model;

/**
 * @method array|null getRoles() allowed roles
 * @method array|null getProducts() allowed products
 * @method array|null getCategories() allowed categories
 * @method array|null getScopeWebsites() allowed websites
 * @method array|null getScopeStoreviews() allowed stores
 * @method array|null getAttributes() allowed attributes
 * @method $this setRoles(array $roles)
 * @method $this setProducts(array $products)
 * @method $this setCategories(array $categories)
 * @method $this setScopeWebsites(array $websites)
 * @method $this setScopeStoreviews(array $storeviews)
 * @method $this setAttributes(array $attributes)
 */

class Rule extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init('TP2M\Orderpricepermission\Model\ResourceModel\Rule');
        $this->setIdFieldName('id');
    }
}
