@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Show Order")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Orders"), "title" => __("Show Order")])
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 text-center">
                        <h5 class="card-title">{{ __("Worker Details") }}</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">{{ __('First Name') }}</th>
                                    <td>{{ $worker->first_name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Last Name') }}</th>
                                    <td>{{ $worker->last_name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Job') }}</th>
                                    <td>{{ $worker->job }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Month Salary') }}</th>
                                    <td>{{ $worker->month_salary }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Contract Period') }}</th>
                                    <td>{{ $worker->contract_period }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Languages') }}</th>
                                    <td>{{ $worker->languages }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Nationality') }}</th>
                                    <td>{{ $worker->nationality }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Age') }}</th>
                                    <td>{{ $worker->age }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Type') }}</th>
                                    <td>{{ $worker->type }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Tall') }}</th>
                                    <td>{{ $worker->tall }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Religion') }}</th>
                                    <td>{{ $worker->religion }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Place of Birth') }}</th>
                                    <td>{{ $worker->place_of_birth }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Children') }}</th>
                                    <td>{{ $worker->children }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Education') }}</th>
                                    <td>{{ $worker->education }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Birth Date') }}</th>
                                    <td>{{ $worker->birth_date }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Weight') }}</th>
                                    <td>{{ $worker->weight }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Has Practical Experience') }}</th>
                                    <td>{{ $worker->has_practical_experience }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Practical Experience') }}</th>
                                    <td>{{ $worker->practical_experience }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Passport Number') }}</th>
                                    <td>{{ $worker->passport_number }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Passport Release Date') }}</th>
                                    <td>{{ $worker->passport_release_date }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Passport End Date') }}</th>
                                    <td>{{ $worker->passport_end_date }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Passport Place of Issue') }}</th>
                                    <td>{{ $worker->passport_place_of_issue }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Work Experience Country') }}</th>
                                    <td>{{ $worker->work_experience_country }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Years of Experience') }}</th>
                                    <td>{{ $worker->years_of_experience }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Main Image') }}</th>
                                    <td>{{ $worker->main_image }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Related Images') }}</th>
                                    <td>{{ $worker->related_images }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('CV') }}</th>
                                    <td>{{ $worker->cv }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Office ID') }}</th>
                                    <td>{{ $worker->office_id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Status ID') }}</th>
                                    <td>{{ $worker->status_id }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection