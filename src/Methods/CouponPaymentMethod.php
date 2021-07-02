<?php

namespace POSPaymentMethodRenaming\Methods;

use Plenty\Modules\Payment\Method\Services\PaymentMethodBaseService;
use Plenty\Plugin\ConfigRepository;

/**
 * Class CouponPaymentMethod
 * @package POSPaymentMethodRenaming\Methods
 */
class CouponPaymentMethod extends PaymentMethodBaseService
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
     * Get shown name
     *
     * @param $lang
     * @return string
     */
    public function getName(string $lang = 'de'): string
    {
        $paymentMethodName = '';
        if ($lang == 'de') {
            $paymentMethodName = $this->config->get('POSPaymentMethodRenaming.coupon.nameDE', '');
        } else {
            $paymentMethodName = $this->config->get('POSPaymentMethodRenaming.coupon.nameEN', '');
        }
        return $paymentMethodName;
    }

    /**
     * Check if this payment method should be active in the backend
     *
     * @return bool
     */
    public function isBackendActive(): bool
    {
        return true;
    }

    /**
     * Get the name for the backend
     *
     * @param string $lang
     * @return string
     */
    public function getBackendName(string $lang= 'de'): string
    {
        return $this->getName($lang);
    }

}
