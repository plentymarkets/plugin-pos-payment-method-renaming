<?php

namespace POSPaymentMethodRenaming\Assistants;

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
            'key' => 'posPaymentMethodRenaming-configuration-assistant',
            'translationNamespace' => 'POSPaymentMethodRenaming',
            'title' => 'Assistant.title',
            'settingsHandlerClass' => PaymentMethodRenamingSettingsHandler::class,
            'dataSource' => AssistantDataSource::class,
            'topics' => ['integration'],
            'keywords' => ['PaymentCard,Kartenzahlung','Cash','Barzahlung','POSPaymentMethodRenaming','POS','Payment method renaming','Zahlungsart','Zahlungsart umbenennen'],
            'shortDescription' => 'Assistant.shortDescription',
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
}