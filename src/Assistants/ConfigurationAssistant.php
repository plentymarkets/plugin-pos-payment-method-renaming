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
            'keywords' => ['PaymentCard','Kartenzahlung','Cash','Barzahlung','coupon','Gutschein','POSPaymentMethodRenaming','POS','Payment method renaming','Zahlungsart','Zahlungsart umbenennen'],
            'shortDescription' => 'Assistant.shortDescription',
            "iconPath" => $this->getIcon(),
            'steps' => [
                'step1' => [
                    'title' => 'Assistant.titleStep1',
                    'sections' => [
                        [
                            'title' => 'Assistant.descriptionStep1',
                            'form' => [
                                'cashNameDE' => [
                                    'type' => 'text',
                                    'options' => [
                                        'name' => 'Assistant.input.cashNameDE',
                                        'required' => true
                                    ]
                                ],
                                'cashNameEN' => [
                                    'type' => 'text',
                                    'options' => [
                                        'name' => 'Assistant.input.cashNameEN',
                                        'required' => true
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
                'step2' => [
                    'title' => 'Assistant.titleStep2',
                    'sections' => [
                        [
                            'title' => 'Assistant.descriptionStep2',
                            'form' => [
                                'paymentCardNameDE' => [
                                    'type' => 'text',
                                    'options' => [
                                        'name' => 'Assistant.input.paymentCardNameDE',
                                        'required' => true
                                    ]
                                ],
                                'paymentCardNameEN' => [
                                    'type' => 'text',
                                    'options' => [
                                        'name' => 'Assistant.input.paymentCardNameEN',
                                        'required' => true
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
                'step3' => [
                    'title' => 'Assistant.titleStep3',
                    'sections' => [
                        [
                            'title' => 'Assistant.descriptionStep3',
                            'form' => [
                                'couponNameDE' => [
                                    'type' => 'text',
                                    'options' => [
                                        'name' => 'Assistant.input.couponNameDE',
                                        'required' => true
                                    ]
                                ],
                                'couponNameEN' => [
                                    'type' => 'text',
                                    'options' => [
                                        'name' => 'Assistant.input.couponNameEN',
                                        'required' => true
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