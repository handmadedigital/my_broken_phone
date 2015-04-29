<?php namespace ThreeAccents\Orders\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Session\SessionManager;
use ThreeAccents\Core\Http\Controllers\Controller;
use ThreeAccents\Devices\Phones\Services\BuyPhoneService;
use ThreeAccents\Orders\Http\Requests\PaymentMethodRequest;
use ThreeAccents\Orders\Http\Requests\PaypalEmailRequest;
use ThreeAccents\Users\Commands\AddPaypalEmailCommand;

class PaymentController extends Controller
{
    /**
     * @var Guard
     */
    protected $auth;

    /**
     * @var SessionManager
     */
    protected $session;

    /**
     * @var BuyPhoneService
     */
    protected  $phoneService;

    function __construct(Guard $auth, SessionManager $session, BuyPhoneService $phoneService)
    {
        $this->auth = $auth;
        $this->session = $session;
        $this->phoneService = $phoneService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getPaymentOptions()
    {
        return view('orders.payments.payment-method');
    }

    public function postPaymentOptions(PaymentMethodRequest $request)
    {
        $input = $request->only('payment_method');
        $this->session->put('payment_method', $input['payment_method']);

        if($input['payment_method'] != 1) return redirect()->route('buy.confirmation');

        return redirect()->route('buy.paypal.payment');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getPaypalPayment()
    {
        if( $this->auth->user()->details->paypal_email != '') return redirect()->route('buy.confirmation');

        return view('orders.payments.paypal-payment');
    }

    /**
     * @param PaypalEmailRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postPaypalPayment(PaypalEmailRequest $request)
    {
        $this->dispatch(AddPaypalEmailCommand::class);

        flash()->message('Paypal email has been added. Thank you!');

        return redirect()->route('buy.confirmation');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getOrderConfirmation()
    {
        $phone = $this->phoneService->getPrice(
            $this->session->get('carrier'),
            $this->session->get('brand'),
            $this->session->get('model'),
            $this->session->get('capacity'),
            $this->session->get('condition')
        );

        $user = $this->auth->user();

        return view('orders.payments.order-confirmation', compact('user', 'phone'));
    }

    public function getThankYou()
    {
        return view('orders.payments.thank-you');
    }
}