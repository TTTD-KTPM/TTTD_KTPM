<?php

namespace Webkul\Shop\Http\Controllers\API;

use Webkul\Core\Repositories\CountryRepository;
use Webkul\Core\Repositories\CountryStateRepository;

class CoreController extends APIController
{
    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected CountryRepository $countryRepository,
        protected CountryStateRepository $countryStateRepository
    ) {}

    /**
     * Get countries.
     */
    public function getCountries()
    {
        $countries = $this->countryRepository->all();

        return response()->json([
            'data' => $countries,
        ]);
    }

    /**
     * Get states grouped by country code.
     */
    public function getStates()
    {
        $states = $this->countryStateRepository->all()->groupBy('country_code');

        return response()->json([
            'data' => $states,
        ]);
    }
}
