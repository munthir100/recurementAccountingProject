@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Accounts")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Accounts"), "title" => __("Accounts")])
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
            <div class="card-header">
                <div class="mb-2"></div>
                <div class="row g-4 mb-3">
                    <div class="col-sm-auto">
                        <div>
                            <a href="{{ route('user.dashboard.accounts.create') }}" class="btn btn-success add-btn" id="create-btn">
                                <i class="ri-add-line align-bottom me-1"></i> {{ __("Add") }}
                            </a>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="d-flex justify-content-sm-end">
                            <div class="search-box ms-2">
                                <form action="" method="get">
                                    <div class="form-floating">
                                        <input type="text" name="search" class="form-control search" id="search" placeholder="{{ __("Search...") }}">
                                        <label for="search">{{ __("Type a Keyword...") }}</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-nowrap table-striped-columns mb-3">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">{{ __("ID") }}</th>
                                <th scope="col">{{ __("Name") }}</th>
                                <th scope="col">{{ __("Email") }}</th>
                                <th scope="col">{{ __("Phone") }}</th>
                                <th scope="col">{{ __("Status") }}</th>
                                <th scope="col">{{ __("Actions") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($accounts as $account)
                            <form id="form{{ $account->id }}" action="{{ route('user.dashboard.accounts.destroy', $account->id) }}" method="post" class="hidden">
                                @csrf
                                @method('delete')
                            </form>
                            <tr>
                                <td>{{ $account->id }}</td>
                                <td>{{ $account->name }} </td>
                                <td>{{ $account->email }} </td>
                                <td>{{ $account->phone }}</td>
                                <td> <x-dashboard.table-status-badge statusId="{{ $account->status_id }}" /> </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div class="edit">
                                            <a href="{{ route('user.dashboard.accounts.edit', $account->id) }}" class="btn btn-icon btn-primary edit-item-btn" title="{{__('Edit')}}"><i class="bx bx-edit"></i></a>
                                        </div>
                                        <div class="show">
                                            <a href="{{ route('user.dashboard.accounts.show', $account->id) }}" class="btn btn-icon btn-info edit-item-btn" title="{{__('Show')}}"><i class="ri-eye-line"></i></a>
                                        </div>
                                        <div class="remove">
                                            <button class="btn btn-icon btn-danger remove-item-btn" title="{{__('Delete')}}" data-id="{{ $account->id }}"><i class="bx bx-trash"></i></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="5" class="text-center">{{ __("No items fond!") }}</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        <x-dashboard.pagination :model="$accounts" />
                    </div>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection

@section("scripts")
<script src="{{ asset('dashboard/assets/libs/prismjs/prism.js') }}"></script>
<!-- Sweet Alerts js -->
<script src="{{ asset('dashboard/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{asset('dashboard/assets/js/actions/delete-items.js')}}"></script>
@endsection