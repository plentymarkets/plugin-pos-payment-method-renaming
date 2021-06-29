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
        /** @var WizardData $wizardData */
        $wizardData = pluginApp(WizardData::class);

        return $wizardData;
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
        $mopNames['couponNameDE'] = $config->get('POSPaymentMethodRenaming.coupon.nameDE');
        $mopNames['couponNameEN'] = $config->get('POSPaymentMethodRenaming.coupon.nameEN');
        $wizardData['default']['data'] = $mopNames;
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
        $dataStructure = $this->dataStructure;
        $entities = $this->get()[$optionId];
        $dataStructure['data'] = $entities['data'];
        return $dataStructure;
    }

    /**
     * @return array
     */
    public function getIdentifiers()
    {
        $identifiers = [];
        $options = $this->get();
        if($this->checkSettings($options)){
            $identifiers = array_keys($options);
        }
        return $identifiers;
    }

    private function checkSettings($options){
        if(isset($options['default']) && isset($options['default']['data'])){
            $mopNames = $options['default']['data'];
            if (isset($mopNames['cashNameDE']) && isset($mopNames['cashNameEN'])
                && isset($mopNames['paymentCardNameDE'])  && isset($mopNames['paymentCardNameEN'])
                && isset($mopNames['couponNameDE'])  && isset($mopNames['couponNameEN']) ) {
                return true;
            }
        }
        return false;
    }

}
