<?php


namespace TP2M\Orderpricepermission\Plugin\Sales\Ui\Component\Listing\Column;


use Magento\Directory\Model\Currency;
use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use TP2M\Orderpricepermission\Helper\Data;

class PurchasedPrice extends \Magento\Sales\Ui\Component\Listing\Column\PurchasedPrice
{
    /**
     * @var PriceCurrencyInterface
     */
    protected $priceFormatter;

    /**
     * @var Currency
     */
    private $currency;

    /**
     * @var Data
     */
    protected $helper;
    /**
     * Constructor
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param PriceCurrencyInterface $priceFormatter
     * @param array $components
     * @param array $data
     * @param Currency $currency
     * @param Data $helper
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        PriceCurrencyInterface $priceFormatter,
        array $components = [],
        array $data = [],
        Currency $currency = null,
        Data $helper
    ) {

        $this->priceFormatter = $priceFormatter;
        $this->currency = $currency ?: \Magento\Framework\App\ObjectManager::getInstance()
            ->create(Currency::class);
        $this->helper = $helper;
        parent::__construct($context, $uiComponentFactory, $priceFormatter, $components, $data, $currency);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        $excludeAttribute = $this->helper->getExcludeColumns('order');
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $currencyCode = isset($item['order_currency_code']) ? $item['order_currency_code'] : null;
                $purchaseCurrency = $this->currency->load($currencyCode);
                if(in_array($this->getData('name'), $excludeAttribute)){
                    $item[$this->getData('name')] = '';
                }else{
                    $item[$this->getData('name')] = $purchaseCurrency
                        ->format($item[$this->getData('name')], [], false);
                }
            }
        }

        return $dataSource;
    }
}
