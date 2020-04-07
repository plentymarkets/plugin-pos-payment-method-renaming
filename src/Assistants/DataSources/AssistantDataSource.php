<?php

namespace PaymentCard\Assistants\DataSources;

use Plenty\Modules\Wizard\Models\WizardData;
use Plenty\Modules\Wizard\Services\DataSources\BaseWizardDataSource;
use Plenty\Plugin\ConfigRepository;

/**
 * @package PayPal\Assistants\DataSources
 */
class AssistantDataSource extends BaseWizardDataSource
{
    /**
     * @var SettingsService
     */
    protected $settingsService;

    protected $activePayPalExpressContainers = [];

    protected $activePayPalInstallmentBannerContainers = [];

    /**
     * Source constructor.
     */
    public function __construct(
        SettingsService $settingsService
    ) {
        $this->settingsService = $settingsService;
    }

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
        $config->set('PaymentCard.paymentCard.nameDE', 'Kartenzahlung');
        $config->set('PaymentCard.paymentCard.nameEN', 'Payment Card');
    }
}
