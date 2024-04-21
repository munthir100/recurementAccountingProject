<?php

namespace App\Http\Controllers\User\Dashboard\Settings;

use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Dashboard\Settings\CreateCountryRequest;
use App\Http\Requests\User\Dashboard\Settings\UpdateCountryRequest;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::with('media')->dynamicPaginate();

        return view('dashboard.settings.countries.index', compact('countries'));
    }

    public function store(CreateCountryRequest $request)
    {
        $country = Country::create($request->only(['name', 'status_id']));
        $country->addMediaFromRequest('image')->toMediaCollection('countries');

        return back()->with('success', 'Country created successfully.');
    }

    public function edit(Country $country)
    {
        return view('dashboard.settings.countries.edit', compact('country'));
    }

    public function update(UpdateCountryRequest $request, Country $country)
    {
        $country->update($request->only(['name', 'status_id']));

        if ($request->hasFile('image')) {
            $country->clearMediaCollection('countries');
            $country->addMediaFromRequest('image')->toMediaCollection('countries');
        }

        return to_route('user.dashboard.settings.countries.index')->with('success', 'Country updated successfully.');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('user.dashboard.settings.countries.index')->with('success', 'Country deleted successfully.');
    }
}
