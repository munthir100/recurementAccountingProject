@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Edit Contract")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Contracts"), "title" => __("Edit Contract")])
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('user.dashboard.reports.contracts.update', $contract->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">{{ __("Title") }}</label>
                                <input required type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $contract->title) }}" placeholder="{{ __("Enter title") }}">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __("Description") }}</label>
                                <input required type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description', $contract->description) }}" placeholder="{{ __("Enter description") }}">
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="amount" class="form-label">{{ __("Amount") }}</label>
                                <input required type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount', $contract->amount) }}" placeholder="{{ __("Enter amount") }}">
                                @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="amount_type" class="form-label">{{ __("Amount Type") }}</label>
                                <select required class="form-select @error('amount_type') is-invalid @enderror" id="amount_type" name="amount_type">
                                    <option value="">Select Amount Type</option>
                                    <option value="monthly" {{ old('amount_type', $contract->amount_type) == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                    <option value="daily" {{ old('amount_type', $contract->amount_type) == 'daily' ? 'selected' : '' }}>Daily</option>
                                    <option value="weekly" {{ old('amount_type', $contract->amount_type) == 'weekly' ? 'selected' : '' }}>Weekly</option>
                                    <option value="annually" {{ old('amount_type', $contract->amount_type) == 'annually' ? 'selected' : '' }}>Annually</option>
                                </select>
                                @error('amount_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="start_date" class="form-label">{{ __("Start Date") }}</label>
                                <input required type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date', $contract->start_date) }}">
                                @error('start_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="end_date" class="form-label">{{ __("End Date") }}</label>
                                <input required type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date', $contract->end_date) }}">
                                @error('end_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="status_id" class="form-label">{{ __("Status") }}</label>
                                <select required class="form-select" id="status_id" name="status_id">
                                    <option value="">{{__('Select Status')}}</option>
                                    @foreach(\App\Models\Contract::STATUSES as $id => $name)
                                    <option value="{{ $id }}" {{ old('status_id', $contract->status_id) == $id ? 'selected' : '' }}>{{ __($name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="location" class="form-label">{{ __("Location") }}</label>
                                <input required type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location', $contract->location) }}" placeholder="{{ __("Enter location") }}">
                                @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="renewal_terms" class="form-label">{{ __("Renewal Terms") }}</label>
                                <input required type="text" class="form-control @error('renewal_terms') is-invalid @enderror" id="renewal_terms" name="renewal_terms" value="{{ old('renewal_terms', $contract->renewal_terms) }}" placeholder="{{ __("Enter renewal terms") }}">
                                @error('renewal_terms')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="contractable_type" class="form-label">{{ __("Contract Category") }}</label>
                                <select required class="form-select" id="contractable_type" name="contractable_type">
                                    <option value="">Select Contrtact Category</option>
                                    <option value="/App/Models/Account::class" {{ old('contractable_type', $contract->contractable_type) == '/App/Models/Account::class' ? 'selected' : '' }}>Account</option>
                                    <option value="/App/Models/User::class" {{ old('contractable_type', $contract->contractable_type) == '/App/Models/User::class' ? 'selected' : '' }}>User</option>
                                </select>
                                @error('contractable_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="contractable_id" class="form-label">{{ __("Contractable Category ID") }}</label>
                                <input required type="number" class="form-control @error('contractable_id') is-invalid @enderror" id="contractable_id" name="contractable_id" value="{{ old('contractable_id', $contract->contractable_id) }}" placeholder="{{ __("Enter contractable ID") }}">
                                @error('contractable_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __("Update") }}</button>
                </form>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection