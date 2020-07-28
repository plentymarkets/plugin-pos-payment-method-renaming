<?php

namespace POSPaymentMethodRenaming\Methods;

use Plenty\Modules\Payment\Method\Services\PaymentMethodBaseService;
use Plenty\Plugin\ConfigRepository;

/**
 * Class CashPaymentMethod
 * @package POSPaymentMethodRenaming\Methods
 */
class CashPaymentMethod extends PaymentMethodBaseService
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
    public function isActive(): bool
    {
        try {
            $cashPlugin = pluginApp(\PayUponPickup\Methods\PayUponPickupPaymentMethod::class);
            return $cashPlugin->isActive();
        } catch (\Exception $e) {
        }
        return false;
    }

    /**
     * Get shown name
     *
     * @param string $lang
     * @return string
     */
    public function getName($lang = 'de'): string
    {
        $paymentMethodName = '';
        if ($lang == 'de') {
            $paymentMethodName = $this->config->get('POSPaymentMethodRenaming.cash.nameDE', '');
        } else {
            $paymentMethodName = $this->config->get('POSPaymentMethodRenaming.cash.nameEN', '');
        }

        try {
            /** @var PaymentMethodBaseService $cashPlugin */
            $cashPlugin = pluginApp(\PayUponPickup\Methods\PayUponPickupPaymentMethod::class);
            $paymentMethodName = $cashPlugin->getName();
        } catch (\Exception $e) {
        }
        return $paymentMethodName;
    }

    /**
     * Check if this payment method should be searchable in the backend
     *
     * @return bool
     */
    public function isBackendSearchable(): bool
    {
        return true;
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
    public function getBackendName(string $lang): string
    {
        return $this->getName($lang);
    }

    /**
     * @return bool
     */
    public function canHandleSubscriptions(): bool
    {
        $subscriptions = false;
        try {
            /** @var PaymentMethodBaseService $cashPlugin */
            $cashPlugin = pluginApp(\PayUponPickup\Methods\PayUponPickupPaymentMethod::class);
            $subscriptions = $cashPlugin->canHandleSubscriptions();
        } catch (\Exception $e) {
        }
        return $subscriptions;
    }

    /**
     * Get PayUponPickup Icon if active
     *
     * @param string $lang
     * @return string
     */
    public function getIcon(string $lang = 'de'): string
    {
        $icon = '';
        try {
            $cashPlugin = pluginApp(\PayUponPickup\Methods\PayUponPickupPaymentMethod::class);
            $icon = $cashPlugin->getIcon($lang);
        } catch (\Exception $e) {
        }
        return $icon;
    }

    /**
    * Get PayUponPickup description if active
    *
    * @param string $lang
    * @return string
    */
    public function getDescription(string $lang = 'de'): string
    {
        $description = '';
        try {
            /** @var PaymentMethodBaseService $cashPlugin */
            $cashPlugin = pluginApp(\PayUponPickup\Methods\PayUponPickupPaymentMethod::class);
            $description = $cashPlugin->getDescription($lang);
        } catch (\Exception $e) {
        }
        return $description;
    }

    public function isSwitchableTo(): bool
    {
        return true;
    }

    public function isSwitchableFrom(): bool
    {
        return true;
    }

    /**
     * Get PayUponPickup SourceUrl if active
     *
     * @param string $lang
     * @return string
     */
    public function getSourceUrl(string $lang = 'de'): string
    {
        $sourceUrl = '';
        try {
            /** @var PaymentMethodBaseService $cashPlugin */
            $cashPlugin = pluginApp(\PayUponPickup\Methods\PayUponPickupPaymentMethod::class);
            $sourceUrl = $cashPlugin->getSourceUrl($lang);
        } catch (\Exception $e) {
        }
        return $sourceUrl;
    }


    public function getBackendIcon(): string
    {
        $backendIcon = '';
        try {
            /** @var PaymentMethodBaseService $cashPlugin */
            $cashPlugin = pluginApp(\PayUponPickup\Methods\PayUponPickupPaymentMethod::class);
            $backendIcon = $cashPlugin->getBackendIcon();
        } catch (\Exception $e) {
        }
        return $backendIcon;
    }

}
