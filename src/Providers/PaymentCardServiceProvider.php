<?php //strict

namespace PaymentCard\Providers;

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
    public function boot(Dispatcher $eventDispatcher)
    {

    }
}
