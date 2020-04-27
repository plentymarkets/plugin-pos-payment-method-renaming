<?php

namespace POSPaymentMethodRenaming\Assistants;

use Plenty\Plugin\Application;
use POSPaymentMethodRenaming\Assistants\DataSources\AssistantDataSource;
use POSPaymentMethodRenaming\Assistants\Handlers\PaymentMethodRenamingSettingsHandler;
use Plenty\Modules\Wizard\Services\WizardProvider as AssistantProvider;

class ConfigurationAssistant extends AssistantProvider
{
    /**
     * @var string
     */
    private $language;

    public function __construct(){}

    /**
     * @return array
     */
    protected function structure(): array
    {
        return [
            'key' => 'pos-payment-method-renaming-assistant',
            'translationNamespace' => 'POSPaymentMethodRenaming',
            'title' => 'Assistant.title',
            'settingsHandlerClass' => PaymentMethodRenamingSettingsHandler::class,
            'dataSource' => AssistantDataSource::class,
            'topics' => ['integration'],
            'keywords' => ['PaymentCard,Kartenzahlung','Cash','Barzahlung','POSPaymentMethodRenaming','POS','Payment method renaming','Zahlungsart','Zahlungsart umbenennen'],
            'shortDescription' => 'Assistant.shortDescription',
            "iconPath" => $this->getIcon(),
            'steps' => [
                'step1' => [
                    'title' => 'Assistant.titleStep1',
                    'description' => 'Assistant.descriptionStep1',
                    'showFullDescription' => true,
                    'sections' => [
                        [
                            'form' => [
                                'cashNameDE' => [
                                    'type' => 'text',
                                    'options' => [
                                        'name' => 'Assistant.input.cashNameDE',
                                    ]
                                ],
                                'cashNameEN' => [
                                    'type' => 'text',
                                    'options' => [
                                        'name' => 'Assistant.input.cashNameEN',
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
                'step2' => [
                    'title' => 'Assistant.titleStep2',
                    'description' => 'Assistant.descriptionStep2',
                    'showFullDescription' => true,
                    'sections' => [
                        [
                            'form' => [
                                'paymentCardNameDE' => [
                                    'type' => 'text',
                                    'options' => [
                                        'name' => 'Assistant.input.paymentCardNameDE',
                                    ]
                                ],
                                'paymentCardNameEN' => [
                                    'type' => 'text',
                                    'options' => [
                                        'name' => 'Assistant.input.paymentCardNameEN',
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }

    /**
     * @return string
     */
    private function getIcon()
    {
        $app = pluginApp(Application::class);
        $icon = $app->getUrlPath('pospaymentmethodrenaming').'/images/rename_MOP_POS_Assi.png';

        return $icon;
    }
}