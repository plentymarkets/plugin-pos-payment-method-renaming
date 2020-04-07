<?php //strict

namespace PaymentCard\Providers;

use PaymentCard\Methods\PaymentCardPaymentMethod;
use Plenty\Modules\Payment\Method\Contracts\PaymentMethodContainer;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ServiceProvider;


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
    }
}
