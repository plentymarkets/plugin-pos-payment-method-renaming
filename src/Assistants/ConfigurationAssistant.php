<?php

namespace PaymentCard\Assistants;

use PaymentCard\Assistants\DataSources\AssistantDataSource;
use PaymentCard\Assistants\Handlers\PaymentCardSettingsHandler;
use Plenty\Modules\Otto\Item\Assistants\Categories\CategoryHandler;
use Plenty\Modules\Wizard\Services\WizardProvider as AssistantProvider;
use Plenty\Plugin\Translation\Translator;

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
            'key' => 'paymentCard-configuration-assistant',
            'translationNamespace' => 'PaymentCard',
            'title' => 'Assistant.title',
            'settingsHandlerClass' => PaymentCardSettingsHandler::class,
            'dataSource' => AssistantDataSource::class,
            'topics' => ['payment'],
            'keywords' => ['PaymentCard,Kartenzahlung'],
            'shortDescription' => 'Assistant.shortDescription',
            'steps' => [
                'step1' => [
                    'title' => 'Assistant.titleStep1',
                    'description' => 'Assistant.descriptionStep1',
                    'showFullDescription' => true,
                    'sections' => [
                        [
                            'form' => [
                                'paymentMethodNameDE' => [
                                    'type' => 'text',
                                    'options' => [
                                        'name' => 'Assistant.input.paymentMethodNameDE',
                                    ]
                                ],
                                'paymentMethodNameEN' => [
                                    'type' => 'text',
                                    'options' => [
                                        'name' => 'Assistant.input.paymentMethodNameEN',
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