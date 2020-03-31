<?php //strict

namespace PaymentCard\Helper;

use Plenty\Modules\Payment\Method\Contracts\PaymentMethodRepositoryContract;
use Plenty\Plugin\Log\Loggable;

/**
 * Class PaymentHelper
 * @package PaymentCard\Helper
 */
class PaymentHelper
{
    use Loggable;

    /**
     * @var PaymentMethodRepositoryContract
     */
    private $paymentMethodRepository;

    public function __construct(PaymentMethodRepositoryContract $paymentMethodRepository) {
        $this->paymentMethodRepository = $paymentMethodRepository;
    }

    /**
     * Find MOP ID of given payment key
     *
     * @param string $paymentKey
     *
     * @return int|string
     */
    public function getPaymentCardMopId()
    {
        $paymentMethods = $this->paymentMethodRepository->allForPlugin('plentyPaymentCard');

        if (!is_null($paymentMethods)) {
            foreach ($paymentMethods as $paymentMethod) {
                if ($paymentMethod->paymentKey == 'PAYMENTCARD') {
                    return $paymentMethod->id;
                }
            }
        }
        return 'no_paymentmethod_found';
    }
}