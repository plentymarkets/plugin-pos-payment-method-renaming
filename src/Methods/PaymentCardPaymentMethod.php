<?php

namespace PaymentCard\Methods;

use Plenty\Modules\Payment\Method\Contracts\PaymentMethodService;
use Plenty\Plugin\Translation\Translator;

/**
 * Class PaymentCardPaymentMethod
 * @package PaymentCard\Methods
 */
class PaymentCardPaymentMethod extends PaymentMethodService
{

    public function __construct()
    {
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
        /** @var Translator $translator */
        $translator = pluginApp(Translator::class);
        return $translator->trans('PaymentCard::PaymentMethod.paymentMethodName',[],$lang);
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
        return true;
    }
}
