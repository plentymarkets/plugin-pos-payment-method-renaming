<?php

namespace PaymentCard\Migrations;

use Plenty\Modules\Payment\Method\Contracts\PaymentMethodRepositoryContract;
use PaymentCard\Helper\PaymentHelper;

/**
 * Migration to create PaymentCard payment method
 *
 * Class CreatePaymentCardPaymentMethod
 * @package PaymentCard\Migrations
 */
class CreatePaymentCardPaymentMethod
{
    /**
     * @var PaymentMethodRepositoryContract
     */
    private $paymentMethodRepositoryContract;

    /**
     * @var PaymentHelper
     */
    private $paymentHelper;

    /**
     * CreatePaymentMethod constructor.
     *
     * @param PaymentMethodRepositoryContract $paymentMethodRepositoryContract
     * @param PaymentHelper $paymentHelper
     */
    public function __construct(
        PaymentMethodRepositoryContract $paymentMethodRepositoryContract,
        PaymentHelper $paymentHelper
    ) {
        $this->paymentMethodRepositoryContract = $paymentMethodRepositoryContract;
        $this->paymentHelper = $paymentHelper;
    }

    /**
     * Run on plugin build
     *
     * Create Method of Payment ID for PaymentCard if it doesn't exist
     */
    public function run()
    {
        if ($this->paymentHelper->getPaymentCardMopId() == 'no_paymentmethod_found') {
            $paymentMethodData = array(
                'pluginKey' => 'plentyPaymentCard',
                'paymentKey' => 'PAYMENTCARD',
                'name' => 'Payment card'
            );

            $this->paymentMethodRepositoryContract->createPaymentMethod($paymentMethodData);
        }
    }
}