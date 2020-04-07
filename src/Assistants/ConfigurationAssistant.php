<?php

namespace PaymentCard\Assistants;

use PaymentCard\Assistants\DataSources\AssistantDataSource;
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
            'createOptionIdTitle' => 'Assistant.createOptionIdTitle',
            'dataSource' => AssistantDataSource::class,
            'topics' => ['payment'],
            'keywords' => ['PaymentCard,Kartenzahlung'],
            'shortDescription' => 'Assistant.shortDescription',
            'steps' => [
                'step0' => [
                    'title' => 'Assistant.titleStep0',
                    'sections' => [
                        [
                            'form' => [
                                'paymentMethodNameDE' => [
                                    'type' => 'text',
                                    'options' => [
                                        'name' => 'Assistant.input.paymentMethodNameDE',
                                    ]
                                ]
                            ],
                        ]
                    ]
                ]
            ]
        ];
    }
}