<?php

namespace PaymentCard\Assistants\Handlers;

use Plenty\Modules\Plugin\Contracts\ConfigurationRepositoryContract;
use Plenty\Modules\Plugin\Contracts\PluginRepositoryContract;
use Plenty\Modules\Plugin\Models\Configuration;
use Plenty\Modules\Plugin\Models\Plugin;
use Plenty\Modules\Plugin\Repositories\PluginRepository;
use Plenty\Modules\Wizard\Contracts\WizardSettingsHandler;


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
        try{
            $data = $data['data'];
            if(isset($data)){
                /** @var ConfigurationRepositoryContract $configRepo */
                $configRepo = pluginApp(ConfigurationRepositoryContract::class);
                /** @var PluginRepository $pluginRepo */
                $pluginRepo = pluginApp(PluginRepositoryContract::class);
                /** @var Plugin $paymentCardPlugin */
                $paymentCardPlugin = $pluginRepo->getPluginByName('PaymentCard');

                $configuration = [];

                /** @var Configuration $deNameConfig */
                $deNameConfig = $paymentCardPlugin->configurations->where('key','paymentCard.nameDE')->first();
                $configuration[] = ['key' => $deNameConfig->key, 'value' => $data['paymentMethodNameDE']];

                /** @var Configuration $enNameConfig */
                $enNameConfig = $paymentCardPlugin->configurations->where('key','paymentCard.nameEN')->first();
                $configuration[] = ['key' => $enNameConfig->key, 'value' => $data['paymentMethodNameEN']];

                $configRepo->saveConfiguration($paymentCardPlugin->id, $configuration);
            }
        }catch(\Exception $x){
            return false;
        }
        return true;
    }
}