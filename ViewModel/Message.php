<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 31.08.2020
 * Time: 20:51
 */

namespace Luxinten\TechnicalTaskUnit\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface,
    Magento\Framework\App\Config\ScopeConfigInterface,
    Magento\Store\Model\ScopeInterface;


class Message implements ArgumentInterface
{
    const LUXINTEN_TEST_MESSAGE_PATH = 'luxinten_test/footer/message';

    protected $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function getValue()
    {
        return $this->scopeConfig->getValue(
            self::LUXINTEN_TEST_MESSAGE_PATH,
            ScopeInterface::SCOPE_STORE
        );
    }
}