<?php //strict

namespace POSPaymentMethodRenaming\Providers;

use POSPaymentMethodRenaming\Assistants\ConfigurationAssistant;
use POSPaymentMethodRenaming\Methods\PaymentCardPaymentMethod;
use POSPaymentMethodRenaming\Methods\CashPaymentMethod;
use Plenty\Modules\Payment\Method\Contracts\PaymentMethodContainer;
use Plenty\Plugin\ServiceProvider;
use Plenty\Modules\Wizard\Contracts\WizardContainerContract as AssistantContainerContract;


/**
 * Class PaymentMethodRenamingServiceProvider
 * @package POSPaymentMethodRenaming\Providers
 */
class PaymentMethodRenamingServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    /**
     * Boot additional services for the payment method
     *
     * @param PaymentMethodContainer $payContainer
     */
    public function boot(PaymentMethodContainer $payContainer)
    {
        $payContainer->register('plenty::CASH', CashPaymentMethod::class,[]);
        $payContainer->register('plenty::EC', PaymentCardPaymentMethod::class,[]);

        // Register the assistant
        /** @var AssistantContainerContract $assistantContainer */
        $assistantContainer = pluginApp(AssistantContainerContract::class);
        $assistantContainer->register('pos-payment-method-renaming-assistant', ConfigurationAssistant::class);
    }
}
