<?php

namespace PaymentCard\Assistants\Handlers;

use Plenty\Modules\Wizard\Contracts\WizardSettingsHandler;
use Plenty\Plugin\ConfigRepository;


/**
 * Class CategoryHandler
 *
 * @package PaymentCard\Assistants\Handlers
 */
class PaymentCardSettingsHandler implements WizardSettingsHandler
{
    /**
     * @param array $data
     * @return bool
     */
    public function handle(array $data)
    {
        /** @var ConfigRepository $configRepo */
        $configRepo = pluginApp(ConfigRepository::class);
        $configRepo->set('PaymentCard.paymentCard.nameDE', $data['paymentMethodNameDE']);
        $configRepo->set('PaymentCard.paymentCard.nameEN', $data['paymentMethodNameEN']);
        return true;
    }
}