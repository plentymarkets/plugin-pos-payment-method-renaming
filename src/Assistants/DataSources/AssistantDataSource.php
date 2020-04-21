<?php

namespace POSPaymentMethodRenaming\Assistants\DataSources;

use Plenty\Modules\Wizard\Models\WizardData;
use Plenty\Modules\Wizard\Services\DataSources\BaseWizardDataSource;
use Plenty\Plugin\ConfigRepository;

/**
 * @package POSPaymentMethodRenaming\Assistants\DataSources
 */
class AssistantDataSource extends BaseWizardDataSource
{
    /**
     * Source constructor.
     */
    public function __construct() {}

    /**
     * @return WizardData WizardData
     */
    public function findData()
    {
        //for WizardContainer ($wizardArray['isCompleted'] = $dataSource->findData()->data->default ? true : false;)
        /** @var WizardData $wizardData */
        $wizardData = pluginApp(WizardData::class);
        $wizardData->data = ['default' => false];

        return $wizardData;
    }

    /**
     * @param string $optionId
     *
     * @throws \Exception
     */
    public function deleteDataOption(string $optionId)
    {
        /** @var ConfigRepository $config */
        $config = pluginApp(ConfigRepository::class);
        $config->set('POSPaymentMethodRenaming.cash.nameDE', 'Barzahlung');
        $config->set('POSPaymentMethodRenaming.cash.nameEN', 'Cash');
        $config->set('POSPaymentMethodRenaming.paymentCard.nameDE', 'Kartenzahlung');
        $config->set('POSPaymentMethodRenaming.paymentCard.nameEN', 'Payment Card');
    }

    /**
     * @return array
     */
    public function get()
    {
        $wizardData = $this->dataStructure;
        /** @var ConfigRepository $config */
        $config = pluginApp(ConfigRepository::class);
        $mopNames = [];
        $mopNames['cashNameDE'] = $config->get('POSPaymentMethodRenaming.cash.nameDE');
        $mopNames['cashNameEN'] = $config->get('POSPaymentMethodRenaming.cash.nameEN');
        $mopNames['paymentCardNameDE'] = $config->get('POSPaymentMethodRenaming.paymentCard.nameDE');
        $mopNames['paymentCardNameEN'] = $config->get('POSPaymentMethodRenaming.paymentCard.nameEN');
        $wizardData['data'] = $mopNames;

        return $wizardData;
    }

    /**
     * @param string $optionId
     *
     * @return array|void
     * @throws \Exception
     */
    public function getByOptionId(string $optionId = 'default')
    {
        $data = $this->get();
        return $data;
    }

}
