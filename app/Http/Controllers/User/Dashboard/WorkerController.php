<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Models\Worker;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Worker\CreateWorkerRequest;
use App\Http\Requests\User\Worker\UpdateWorkerRequest;

class WorkerController extends Controller
{
    public function index()
    {
        $this->authorize('read worker');
        $workers = Worker::with('office.account')->dynamicPaginate();
        return view('dashboard.workers.index', compact('workers'));
    }

    public function create()
    {
        $this->authorize('create worker');
        return view('dashboard.workers.create');
    }

    public function store(CreateWorkerRequest $request)
    {
        $this->authorize('create worker');
        $worker = Worker::create($request->except('main_image'));
        $worker->addMedia($request->file('main_image'))->toMediaCollection('main_images');
        return redirect()->route('user.dashboard.workers.index')->with('success', 'Worker created successfully.');
    }

    public function show(Worker $worker)
    {
        $this->authorize('read worker');
        return view('dashboard.workers.show', compact('worker'));
    }

    public function edit(Worker $worker)
    {
        $this->authorize('update worker');
        return view('dashboard.workers.edit', compact('worker'));
    }

    public function update(UpdateWorkerRequest $request, Worker $worker)
    {
        $this->authorize('update worker');
        $worker->update($request->except('main_image'));
        $request->validate(['main_image' => ['sometimes', 'image', 'max:2048']]);
        if ($request->hasFile('main_image')) {
            $worker->clearMediaCollection('main_images');
            $worker->addMedia($request->file('main_image'))->toMediaCollection('main_images');
        }

        return back()->with('success', 'Worker updated successfully.');
    }

    public function destroy(Worker $worker)
    {
        $this->authorize('delete worker');
        $worker->delete();
        return redirect()->route('user.dashboard.workers.index')->with('success', 'Worker deleted successfully.');
    }
}
