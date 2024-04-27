@extends('main-site.layouts.shared.app-layout')

@section('title')
@include("main-site.layouts.shared.includes.title-meta", ["title" => __("Worker Profile")])
@endsection

@section('content')
<header class="header-with-topbar">
    @include('main-site.layouts.shared.includes.header')
</header>

<section class="profile-section bg-very-light-gray py-5 mt-4">
    <div class="container">
        <div class="profile-header text-center mt-4 mb-4">
            <div class="avatar-lg mx-auto mb-3">
                @if($worker->getFirstMedia('main_images'))
                <img height="215" width="215" src="{{ $worker->getFirstMedia('main_images')->getUrl() }}" alt="{{ __('user-img') }}" class="img-thumbnail rounded-circle" />
                @else
                <img height="215" width="215" src="/dashboard/assets/images/users/avatar-1.jpg" alt="{{ __('user-img') }}" class="img-thumbnail rounded-circle" />
                @endif
            </div>
            <h2 class="fw-bold">{{ $worker->first_name }} {{ $worker->last_name }}</h2>
            <p class="text-muted mb-2">{{ $worker->job }}</p>
            <p class="text-muted">{{ $worker->nationality }} | {{ $worker->education }}</p>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-md-4 text-center">
                <h4 class="fw-bold">{{ $worker->month_salary }}</h4>
                <p>{{ __('Monthly Salary') }}</p>
            </div>
            <div class="col-md-4 text-center">
                <h4 class="fw-bold">{{ $worker->age }}</h4>
                <p>{{ __('Years Old') }}</p>
            </div>
        </div>

        <div class="profile-info card shadow-sm p-4">
            <h5 class="card-title mb-3">{{ __('Info') }}</h5>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>{{ __('Full Name') }}:</th>
                            <td>{{ $worker->first_name }} {{ $worker->last_name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Nationality') }}:</th>
                            <td>{{ $worker->nationality }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Joining Date') }}:</th>
                            <td>{{ $worker->created_at->diffForHumans() }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Contract Period') }}:</th>
                            <td>{{ $worker->contract_period }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Type') }}:</th>
                            <td>{{ $worker->type }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Height') }}:</th>
                            <td>{{ $worker->tall }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Religion') }}:</th>
                            <td>{{ $worker->religion }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Place of Birth') }}:</th>
                            <td>{{ $worker->place_of_birth }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Children') }}:</th>
                            <td>{{ $worker->children }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Birth Date') }}:</th>
                            <td>{{ $worker->birth_date }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Weight') }}:</th>
                            <td>{{ $worker->weight }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Work Experience Country') }}:</th>
                            <td>{{ $worker->work_experience_country }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Years of Experience') }}:</th>
                            <td>{{ $worker->years_of_experience }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @if($worker->languages)
        <div class="card shadow-sm p-4 mt-4">
            <h5 class="card-title">{{ __('Languages') }}</h5>
            <div class="d-flex flex-wrap">
                @foreach(json_decode($worker->languages, true) as $language)
                <span class="badge bg-base-color mx-1">{{$language['name']}}</span>
                @endforeach
            </div>
        </div>
        @endif

        @if($worker->practical_experience)
        <div class="card shadow-sm p-4 mt-4">
            <h5 class="card-title">{{ __('Practical Experience') }}</h5>
            <div class="d-flex flex-wrap">
                @foreach(json_decode($worker->practical_experience, true) as $experience)
                <span class="badge bg-base-color mx-1">{{$experience['name']}}</span>
                @endforeach
            </div>
        </div>
        @endif
    </div>
    <div class="text-center mt-4">
        @auth('account')
        @if(request()->user('account')->isCustomerAccount)
        <a href="#modal-popup2" class="popup-with-zoom-anim btn-rounded btn-base-color btn btn-large btn-transparent-dark-gray d-table d-lg-inline-block lg-mb-15px md-mx-auto">
            <span class="btn-text">{{__('Request Now')}}</span>
            <span class="btn-icon"><i class="feather icon-feather-shopping-bag"></i></span>
        </a>
        @elseif(request()->user('account')->isOfficeAccount)
        <a disabled class="disabled btn-rounded btn-base-color btn btn-large btn-transparent-dark-gray d-table d-lg-inline-block lg-mb-15px md-mx-auto">
            <span class="btn-text">{{__('Request Now')}}</span>
            <i class="feather icon-feather-shopping-bag"></i>
        </a>
        @endif
        @else
        <a href="{{route('account.login')}}" class="btn-rounded btn-base-color btn btn-large btn-transparent-dark-gray d-table d-lg-inline-block lg-mb-15px md-mx-auto">
            <span class="btn-text">{{__('Request Now')}}</span>
            <i class="feather icon-feather-shopping-bag"></i>
        </a>
        @endauth

    </div>

    <!-- start modal pop-up -->
    <div id="modal-popup2" class="zoom-anim-dialog mfp-hide col-xl-6 col-lg-6 col-md-7 col-112 mx-auto bg-white text-center modal-popup-main p-50px">
        <span class="text-dark-gray fw-600 fs-24 mb-10px d-block">{{__('Create Order')}}</span>
        <form action="{{ route('account.customer.orders.store') }}" method="post">
            @csrf
            <input hidden name="worker_id" value="{{ $worker->id }}" required>
            <div class="row">
                <div class="col-6 mb-3 text-start">
                    <label for="amount" class="form-label">{{__('Amount')}}</label>
                    <input type="number" step="0.01" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}" required min="0">
                    @error('amount')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6 mb-3 text-start">
                    <label for="contract_type" class="form-label">{{__('Contract Type')}}</label>
                    <input type="text" class="form-control @error('contract_type') is-invalid @enderror" id="contract_type" name="contract_type" value="{{ old('contract_type') }}" required maxlength="255">
                    @error('contract_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-6 mb-3 text-start">
                    <label for="contract_start_duration" class="form-label">{{__('Contract Start Date')}}</label>
                    <input type="date" class="form-control @error('contract_start_duration') is-invalid @enderror" id="contract_start_duration" name="contract_start_duration" value="{{ old('contract_start_duration') }}" required>
                    @error('contract_start_duration')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6 mb-3 text-start">
                    <label for="contract_end_duration" class="form-label">{{__('Contract End Date')}}</label>
                    <input type="date" class="form-control @error('contract_end_duration') is-invalid @enderror" id="contract_end_duration" name="contract_end_duration" value="{{ old('contract_end_duration') }}" required>
                    @error('contract_end_duration')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-3 text-start">
                    <label for="additional_information" class="form-label">{{__('Additional Information (Optional)')}}</label>
                    <textarea class="form-control @error('additional_information') is-invalid @enderror" id="additional_information" name="additional_information" maxlength="1000">{{ old('additional_information') }}</textarea>
                    @error('additional_information')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn-rounded btn-base-color btn btn-large btn-transparent-dark-gray d-table d-lg-inline-block lg-mb-15px md-mx-auto">
                <span class="btn-text">{{__('Place Order')}}</span>
                <i class="feather icon-feather-shopping-bag">
                </i>
            </button>
        </form>
    </div>


</section>

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('dashboard/assets/libs/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/pages/profile.init.js') }}"></script>
@endsection
@endsection