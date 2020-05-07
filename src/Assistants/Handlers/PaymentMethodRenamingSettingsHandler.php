<?php

namespace POSPaymentMethodRenaming\Assistants\Handlers;

use Plenty\Modules\Plugin\Contracts\ConfigurationRepositoryContract;
use Plenty\Modules\Plugin\Contracts\PluginRepositoryContract;
use Plenty\Modules\Plugin\Models\Plugin;
use Plenty\Modules\Plugin\Repositories\PluginRepository;
use Plenty\Modules\Wizard\Contracts\WizardSettingsHandler;


/**
 * Class PaymentMethodRenamingSettingsHandler
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
                $configuration[] = ['key' => 'cash.nameDE', 'value' => $data['cashNameDE']];
                $configuration[] = ['key' => 'cash.nameEN', 'value' => $data['cashNameEN']];
                $configuration[] = ['key' => 'paymentCard.nameDE', 'value' => $data['paymentCardNameDE']];
                $configuration[] = ['key' => 'paymentCard.nameEN', 'value' => $data['paymentCardNameEN']];

                $configRepo->saveConfiguration($paymentMethodRenamingPlugin->id, $configuration);
            }
        }catch(\Exception $x){
            return false;
        }
        return true;
    }
}