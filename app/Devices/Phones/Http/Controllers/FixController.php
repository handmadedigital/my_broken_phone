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

class FixController extends Controller
{
    /**
     * @var FixPhoneService
     */
    protected $phoneService;

    /**
     * @var SessionManager
     */
    protected  $session;

    /**
     * @var BuyPhoneService
     */
    protected $buyPhoneService;

    /**
     * @param FixPhoneService $phoneService
     * @param SessionManager $session
     * @param BuyPhoneService $buyPhoneService
     */
    function __construct(FixPhoneService $phoneService,  SessionManager $session, BuyPhoneService $buyPhoneService)
    {
        $this->phoneService = $phoneService;
        $this->session = $session;
        $this->buyPhoneService = $buyPhoneService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getBrands()
    {
        $brands = $this->phoneService->getBrands();

        return view('devices.phones.fix.brands', compact('brands'));
    }

    /**
     * @param PhoneBrandRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postBrand(PhoneBrandRequest $request)
    {
        $input = $request->only('brand_slug');

        $this->session->put('brand', $input['brand_slug']);

        return redirect()->route('fix.phone.models', $attributes = ['brand_slug' => $input['brand_slug']]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getModels()
    {
        $models = $this->phoneService->getModels($this->session->get('brand'));

        return view('devices.phones.fix.models', compact('models'));
    }

    /**
     * @param PhoneModelRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postModel(PhoneModelRequest $request)
    {
        $input = $request->only('model_slug');

        $this->session->put('model', $input['model_slug']);

        return redirect()->route('fix.phone.problems', $attributes = [
            'brand_slug' => $this->session->get('brand'),
            'model_slug' => $this->session->get('model'),
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getProblems()
    {
        $problem_ids = $this->phoneService->getProblemIds($this->session->get('model'));

        return view('devices.phones.fix.problems', compact('problem_ids'));
    }

    /**
     * @param PhoneProblemRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postProblem(PhoneProblemRequest $request)
    {
        $input = $request->only('problem_slug');

        $this->session->put('problem', [$input['problem_slug']]);

        return redirect()->route('fix.phone.price', $attributes = [
            'brand_slug' => $this->session->get('brand'),
            'model_slug' => $this->session->get('model')
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getPrice()
    {
        $problems = $this->phoneService->getPrice(
            $this->session->get('model'),
            $this->session->get('problem')
        );

        $model = $this->phoneService->getModel($this->session->get('model'));

        return view('devices.phones.fix.price', compact('problems', 'model'));
    }

    /************************************/

    /**
     * @return \Illuminate\View\View
     */
    public function getCarriers()
    {
        $problems = $this->phoneService->getPrice(
            $this->session->get('model'),
            $this->session->get('problem')
        );

        $model = $this->phoneService->getModel($this->session->get('model'));

        $carriers = $this->buyPhoneService->getCarriers();

        return view('devices.phones.fix.carriers', compact('carriers', 'model', 'problems'));
    }

    /**
     * @param PhoneCarrierRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCarrier(PhoneCarrierRequest $request)
    {
        $input = $request->only('carrier_slug');

        $this->session->put('carrier', $input['carrier_slug']);

        return redirect()->route('fix.phone.capacities', $attributes = ['carrier_slug' => $input['carrier_slug']]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getCapacities()
    {
        $capacity_ids = $this->buyPhoneService->getCapacityIds(
            $this->session->get('carrier'),
            $this->session->get('brand'),
            $this->session->get('model')

        );

        $problems = $this->phoneService->getPrice(
            $this->session->get('model'),
            $this->session->get('problem')
        );

        $model = $this->phoneService->getModel($this->session->get('model'));


        if(is_null($capacity_ids))
        {
            $this->session->put('capacity', '0');

            return redirect()->route('buy.phone.conditions', $attributes = [
                'carrier_slug' => $this->session->get('carrier'),
                'brand_slug' => $this->session->get('brand'),
                'model_slug' => $this->session->get('model'),
                'capacity_slug' => $this->session->get('capacity'),
            ]);
        }

        return view('devices.phones.fix.capacities', compact('capacity_ids', 'model', 'problems'));
    }

    /**
     * @param PhoneCapacityRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCapacity(PhoneCapacityRequest $request)
    {
        $input = $request->only('capacity_slug');

        $this->session->put('capacity', $input['capacity_slug']);

        return redirect()->route('fix.phone.conditions', $attributes = [
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
        $conditions = $this->buyPhoneService->getConditions(
            $this->session->get('carrier'),
            $this->session->get('brand'),
            $this->session->get('model'),
            $this->session->get('capacity')

        );

        $problems = $this->phoneService->getPrice(
            $this->session->get('model'),
            $this->session->get('problem')
        );

        $model = $this->phoneService->getModel($this->session->get('model'));

        return view('devices.phones.fix.conditions', compact('conditions', 'problems', 'model'));
    }

    /**
     * @param PhoneConditionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCondition(PhoneConditionRequest $request)
    {
        $input = $request->only('condition_slug');

        $this->session->put('condition', $input['condition_slug']);

        return redirect()->route('fix.phone.price.wt.buy.price', $attributes = [
            'carrier_slug' => $this->session->get('carrier'),
            'capacity_slug' => $this->session->get('capacity'),
            'condition_slug' => $this->session->get('condition'),
        ]);
    }

    public function getPriceWithBuyPrice()
    {
        $problems = $this->phoneService->getPrice(
            $this->session->get('model'),
            $this->session->get('problem')
        );

        $phone = $this->buyPhoneService->getPrice(
            $this->session->get('carrier'),
            $this->session->get('brand'),
            $this->session->get('model'),
            $this->session->get('capacity'),
            $this->session->get('condition')

        );

        $model = $this->phoneService->getModel($this->session->get('model'));

        return view('devices.phones.fix.price-wt-buy-price', compact('phone', 'problems', 'model'));
    }
}