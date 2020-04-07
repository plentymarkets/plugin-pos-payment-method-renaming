<?php //strict

namespace PaymentCard\Providers;

use PaymentCard\Assistants\ConfigurationAssistant;
use PaymentCard\Methods\PaymentCardPaymentMethod;
use Plenty\Modules\Payment\Method\Contracts\PaymentMethodContainer;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ServiceProvider;
use Plenty\Modules\Wizard\Contracts\WizardContainerContract as AssistantContainerContract;


/**
 * Class PaymentCardServiceProvider
 * @package PaymentCard\Providers
 */
class PaymentCardServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    /**
     * Boot additional services for the payment method
     *
     * @param Dispatcher $eventDispatcher
     */
    public function boot(Dispatcher $eventDispatcher, PaymentMethodContainer $payContainer)
    {
        $payContainer->register('plenty::EC', PaymentCardPaymentMethod::class,[]);

        // Register the assistant
        /** @var AssistantContainerContract $assistantContainer */
        $assistantContainer = pluginApp(AssistantContainerContract::class);
        $assistantContainer->register('paymentCard-configuration-assistant', ConfigurationAssistant::class);
    }
}
