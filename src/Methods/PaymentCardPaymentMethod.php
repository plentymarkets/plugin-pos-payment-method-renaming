<?php

namespace POSPaymentMethodRenaming\Methods;

use Plenty\Modules\Payment\Method\Contracts\PaymentMethodService;
use Plenty\Plugin\ConfigRepository;

/**
 * Class PaymentCardPaymentMethod
 * @package POSPaymentMethodRenaming\Methods
 */
class PaymentCardPaymentMethod extends PaymentMethodService
{
    /**
     * @var ConfigRepository
     */
    private $config;

    public function __construct(ConfigRepository $configRepository)
    {
        $this->config = $configRepository;
    }


    /**
     * @return bool
     */
    public function isActive():bool
    {
        return false;
    }

    /**
     * Get shown name
     *
     * @param $lang
     * @return string
     */
    public function getName($lang = 'de')
    {
        $paymentMethodName = '';
        if($lang == 'de'){
            $paymentMethodName = $this->config->get('POSPaymentMethodRenaming.paymentCard.nameDE', 'Kartenzahlung');
        } else {
            $paymentMethodName = $this->config->get('POSPaymentMethodRenaming.paymentCard.nameEN', 'Payment card');
        }
        return $paymentMethodName;
    }

    /**
     * Check if this payment method should be searchable in the backend
     *
     * @return bool
     */
    public function isBackendSearchable():bool
    {
        return true;
    }

    /**
     * Check if this payment method should be active in the backend
     *
     * @return bool
     */
    public function isBackendActive():bool
    {
        return true;
    }

    /**
     * Get the name for the backend
     *
     * @param string $lang
     * @return string
     */
    public function getBackendName(string $lang):string
    {
        return $this->getName($lang);
    }

    /**
     * Check if this payment method can handle subscriptions
     *
     * @return bool
     */
    public function canHandleSubscriptions():bool
    {
        return false;
    }
}
