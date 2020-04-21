<?php

namespace POSPaymentMethodRenaming\Assistants\Handlers;

use Plenty\Modules\Plugin\Contracts\ConfigurationRepositoryContract;
use Plenty\Modules\Plugin\Contracts\PluginRepositoryContract;
use Plenty\Modules\Plugin\Models\Configuration;
use Plenty\Modules\Plugin\Models\Plugin;
use Plenty\Modules\Plugin\Repositories\PluginRepository;
use Plenty\Modules\Wizard\Contracts\WizardSettingsHandler;


/**
 * Class CategoryHandler
 *
 * @package POSPaymentMethodRenaming\Assistants\Handlers
 */
class PaymentMethodRenamingSettingsHandler implements WizardSettingsHandler
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
                /** @var Plugin $paymentMethodRenamingPlugin */
                $paymentMethodRenamingPlugin = $pluginRepo->getPluginByName('POSPaymentMethodRenaming');

                $configuration = [];

                /** @var Configuration $deNameConfig */
                $deCashNameConfig = $paymentMethodRenamingPlugin->configurations->where('key','cash.nameDE')->first();
                $configuration[] = ['key' => $deCashNameConfig->key, 'value' => $data['cashNameDE']];

                /** @var Configuration $enNameConfig */
                $enCashNameConfig = $paymentMethodRenamingPlugin->configurations->where('key','cash.nameEN')->first();
                $configuration[] = ['key' => $enCashNameConfig->key, 'value' => $data['cashNameEN']];

                /** @var Configuration $deNameConfig */
                $dePaymentCardNameConfig = $paymentMethodRenamingPlugin->configurations->where('key','paymentCard.nameDE')->first();
                $configuration[] = ['key' => $dePaymentCardNameConfig->key, 'value' => $data['paymentCardNameDE']];

                /** @var Configuration $enNameConfig */
                $enPaymentCardNameConfig = $paymentMethodRenamingPlugin->configurations->where('key','paymentCard.nameEN')->first();
                $configuration[] = ['key' => $enPaymentCardNameConfig->key, 'value' => $data['paymentCardNameEN']];

                $configRepo->saveConfiguration($paymentMethodRenamingPlugin->id, $configuration);
            }
        }catch(\Exception $x){
            return false;
        }
        return true;
    }
}