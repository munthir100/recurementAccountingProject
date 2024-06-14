<?php

namespace App\Http\Controllers\User\Dashboard\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::useFilters()->dynamicPaginate();

        return view('user.dashboard.settings.siteSettings.services.index', compact('services'));
    }

    public function create()
    {
        return view('user.dashboard.settings.siteSettings.services.create');
    }

    public function store(CreateServiceRequest $request)
    {
        $service = Service::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('image')) {
            $service->addMediaFromRequest('image')->toMediaCollection('service_image');
        }

        return redirect()->route('user.dashboard.settings.siteSettings.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('user.dashboard.settings.siteSettings.services.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'is_new' => $request->input('is_new'),
            'status_id' => $request->input('status_id'),
        ]);

        if ($request->hasFile('image')) {
            $service->clearMediaCollection('service_image');
            $service->addMediaFromRequest('image')->toMediaCollection('service_image');
        }

        return to_route('user.dashboard.settings.siteSettings.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('user.dashboard.settings.siteSettings.services.index')->with('success', 'Service deleted successfully.');
    }
}
