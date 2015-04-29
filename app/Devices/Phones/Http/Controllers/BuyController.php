<?php namespace ThreeAccents\Devices\Phones\Http\Controllers;

use Illuminate\Session\SessionManager;
use ThreeAccents\Core\Http\Controllers\Controller;
use ThreeAccents\Devices\Phones\Http\Requests\PhoneBrandRequest;
use ThreeAccents\Devices\Phones\Http\Requests\PhoneCapacityRequest;
use ThreeAccents\Devices\Phones\Http\Requests\PhoneCarrierRequest;
use ThreeAccents\Devices\Phones\Http\Requests\PhoneConditionRequest;
use ThreeAccents\Devices\Phones\Http\Requests\PhoneModelRequest;
use ThreeAccents\Devices\Phones\Http\Requests\PhoneProblemRequest;
use ThreeAccents\Devices\Phones\Services\BuyPhoneService;
use ThreeAccents\Devices\Phones\Services\FixPhoneService;

class BuyController extends Controller
{
    /**
     * @var BuyPhoneService
     */
    protected $phoneService;

    /**
     * @var SessionManager
     */
    protected $session;
    /**
     * @var FixPhoneService
     */
    private $fixPhoneService;

    /**
     * @param BuyPhoneService $phoneService
     * @param SessionManager $session
     */
    function __construct(BuyPhoneService $phoneService, SessionManager $session, FixPhoneService $fixPhoneService)
    {
        $this->phoneService = $phoneService;
        $this->session = $session;
        $this->fixPhoneService = $fixPhoneService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getCarriers()
    {
        $carriers = $this->phoneService->getCarriers();

        return view('devices.phones.buy.carriers', compact('carriers'));
    }

    /**
     * @param PhoneCarrierRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCarrier(PhoneCarrierRequest $request)
    {
        $input = $request->only('carrier_slug');

        $this->session->put('carrier', $input['carrier_slug']);

        return redirect()->route('buy.phone.brands', $attributes = ['carrier_slug' => $input['carrier_slug']]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getBrands()
    {
        $brands = $this->phoneService->getBrands($this->session->get('carrier'));

        return view('devices.phones.buy.brands', compact('brands'));
    }

    /**
     * @param PhoneBrandRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postBrand(PhoneBrandRequest $request)
    {
        $input = $request->only('brand_slug');

        $this->session->put('brand', $input['brand_slug']);

        return redirect()->route('buy.phones.models', $attributes = [
            'carrier_slug' => $this->session->get('carrier'),
            'brand_slug' => $input['brand_slug']
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getModels()
    {
        $models = $this->phoneService->getModels(
            $this->session->get('carrier'),
            $this->session->get('brand')
        );

        return view('devices.phones.buy.models', compact('models'));
    }

    /**
     * @param PhoneModelRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postModel(PhoneModelRequest $request)
    {
        $input = $request->only('model_slug');

        $this->session->put('model', $input['model_slug']);

        return redirect()->route('buy.phones.capacities', $attributes = [
            'carrier_slug' => $this->session->get('carrier'),
            'brand_slug' => $this->session->get('brand'),
            'model_slug' => $input['model_slug']
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getCapacities()
    {
        $capacity_ids = $this->phoneService->getCapacityIds(
            $this->session->get('carrier'),
            $this->session->get('brand'),
            $this->session->get('model')

        );

        if(is_null($capacity_ids))
        {
            $this->session->put('capacity', '0');

            return redirect()->route('buy.phones.conditions', $attributes = [
                'carrier_slug' => $this->session->get('carrier'),
                'brand_slug' => $this->session->get('brand'),
                'model_slug' => $this->session->get('model'),
                'capacity_slug' => $this->session->get('capacity'),
            ]);
        }

        return view('devices.phones.buy.capacities', compact('capacity_ids'));
    }

    /**
     * @param PhoneCapacityRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCapacity(PhoneCapacityRequest $request)
    {
        $input = $request->only('capacity_slug');

        $this->session->put('capacity', $input['capacity_slug']);

        return redirect()->route('buy.phones.conditions', $attributes = [
            'carrier_slug' => $this->session->get('carrier'),
            'brand_slug' => $this->session->get('brand'),
            'model_slug' => $this->session->get('model'),
            'capacity_slug' => $this->session->get('capacity'),
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getConditions()
    {
        $conditions = $this->phoneService->getConditions(
            $this->session->get('carrier'),
            $this->session->get('brand'),
            $this->session->get('model'),
            $this->session->get('capacity')

        );

        return view('devices.phones.buy.conditions', compact('conditions'));
    }

    /**
     * @param PhoneConditionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCondition(PhoneConditionRequest $request)
    {
        $input = $request->only('condition_slug');

        $this->session->put('condition', $input['condition_slug']);

        return redirect()->route('buy.phones.price', $attributes = [
            'carrier_slug' => $this->session->get('carrier'),
            'brand_slug' => $this->session->get('brand'),
            'model_slug' => $this->session->get('model'),
            'capacity_slug' => $this->session->get('capacity'),
            'condition_slug' => $this->session->get('condition'),
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getPrice()
    {
        $phone = $this->phoneService->getPrice(
            $this->session->get('carrier'),
            $this->session->get('brand'),
            $this->session->get('model'),
            $this->session->get('capacity'),
            $this->session->get('condition')

        );

        return view('devices.phones.buy.price', compact('phone'));
    }

    /*************************************/
    /* FIX PHONES */
    /***********************************/

    public function getPhoneProblems()
    {
        $phone = $this->phoneService->getPrice(
            $this->session->get('carrier'),
            $this->session->get('brand'),
            $this->session->get('model'),
            $this->session->get('capacity'),
            $this->session->get('condition')

        );

        $problem_ids = $this->fixPhoneService->getProblemIds($this->session->get('model'));

        return view('devices.phones.buy.fix-problems', compact('phone', 'problem_ids'));
    }

    public function postPhoneProblems(PhoneProblemRequest $request)
    {
        $input = $request->only('problem_slug');

        $this->session->put('problem', [$input['problem_slug']]);

        return redirect()->route('buy.phones.price.wt.fix');
    }

    public function getPhoneWithFixPrice()
    {
        $phone = $this->phoneService->getPrice(
            $this->session->get('carrier'),
            $this->session->get('brand'),
            $this->session->get('model'),
            $this->session->get('capacity'),
            $this->session->get('condition')

        );

        $problems = $this->fixPhoneService->getPrice(
            $this->session->get('model'),
            $this->session->get('problem')
        );

        $model = $this->fixPhoneService->getModel($this->session->get('model'));

        return view('devices.phones.buy.price-with-fix-price', compact('problems', 'model', 'phone'));
    }
}