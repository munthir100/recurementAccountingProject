@extends('main-site.layouts.shared.app-layout')
@section('title')
@include("main-site.layouts.shared.includes.title-meta", ["title" => __("Contact Us")])
@endsection
@section('content')
<header class="header-with-topbar">
    @include('main-site.layouts.shared.includes.header')
</header>
<!-- Start page title -->
<section class="page-title-center-alignment cover-background top-space-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center position-relative page-title-extra-large">
                <h1 class="alt-font d-inline-block fw-700 ls-minus-05px text-base-color mb-10px mt-3 md-mt-50px">Inquiry Requests</h1>
            </div>
            <div class="col-12 breadcrumb breadcrumb-style-01 d-flex justify-content-center">
                <ul>
                    <li><a href="demo-decor-store.html">Home</a></li>
                    <li>Inquiry Requests</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End page title -->

<section class="big-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10" data-anime='{ "el": "childs", "translateY": [15, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                @forelse ($inquiryRequests as $inquiryRequest)
                <div class="row border-bottom border-2 border-color-dark-gray pb-50px mb-50px sm-pb-35px sm-mb-35px align-items-center">
                    <div class="col-md-2 text-center text-md-end">
                        <span class="fw-600 text-uppercase">ID:</span> {{ $inquiryRequest->id }}
                    </div>
                    <div class="col-md-2">
                        <span class="fw-600 text-uppercase">Name:</span> {{ $inquiryRequest->name }}
                    </div>
                    <div class="col-md-2">
                        <span class="fw-600 text-uppercase">Email:</span> {{ $inquiryRequest->email }}
                    </div>
                    <div class="col-md-2">
                        <span class="fw-600 text-uppercase">Phone:</span> {{ $inquiryRequest->phone }}
                    </div>
                    <div class="col-md-2">
                        <span class="fw-600 text-uppercase">Worker:</span>
                        <a class="text-base-color" href="{{route('home.workers.show',$inquiryRequest->worker->id)}}">
                            {{ $inquiryRequest->worker->first_name }} {{ $inquiryRequest->worker->last_name }}
                        </a>

                    </div>
                    <div class="col-md-2 text-center text-md-end">
                        <span class="fs-12 text-muted">{{ $inquiryRequest->created_at->diffForHumans() }}</span><br>
                        <td>
                            <button type="button" class="btn btn-base-color btn-rounded remove-item-btn" data-id="{{ $inquiryRequest->id }}">
                                <i class="bi bi-trash"></i> {{ __('Delete') }}
                            </button>
                        </td>
                    </div>
                </div>
                <form id="form{{ $inquiryRequest->id }}" action="{{ route('account.callCenter.inquiryRequests.destroy', $inquiryRequest->id) }}" method="post" class="hidden">
                    @csrf
                    @method('delete')
                </form>
                @empty
                <div class="col-12 text-center">
                    <p>No inquiry requests available at the moment.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>


<!-- Delete confirmation modal -->
<div id="modal-popup3" class="zoom-anim-dialog mfp-hide col-xl-3 col-lg-6 col-md-7 col-11 mx-auto bg-white text-center modal-popup-main p-50px">
    <span class="text-dark-gray fw-600 fs-24 mb-10px d-block">Confirm Deletion</span>
    <p>Are you sure you want to delete this inquiry request?</p>
    <a class="btn btn-small btn-rounded btn-dark-gray popup-modal-dismiss mt-10px" href="#">Cancel</a>
    <button type="button" class="btn btn-danger btn-small btn-rounded mt-10px" id="confirm-delete">Confirm</button>
</div>

@endsection
<!-- JavaScript to handle modal and deletion -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.remove-item-btn');
        const modal = document.getElementById('modal-popup3');
        let currentForm;

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const inquiryId = this.getAttribute('data-id');
                currentForm = document.getElementById(`form${inquiryId}`);
                // Open modal
                $.magnificPopup.open({
                    items: {
                        src: '#modal-popup3',
                        type: 'inline'
                    }
                });
            });
        });

        document.getElementById('confirm-delete').addEventListener('click', function() {
            // Submit the current form for deletion
            currentForm.submit();
        });
    });
</script>