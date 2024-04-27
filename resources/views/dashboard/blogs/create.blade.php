    @extends('dashboard.layouts.shared.app-layout')

    @section('title')
    @include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Create Blog Post")])
    @endsection

    @section('page-title')
    @include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Create Blog Post")])
    @endsection

    @section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form id="blogForm" action="{{ route('user.dashboard.blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Title Input -->
                    <div class="form-group mb-2">
                        <label for="title">{{ __('Title') }}:</label>
                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Context (Quill Editor) -->
                    <div class="form-group mb-2">
                        <label for="context">{{ __('Context') }}:</label>
                        <div class="snow-editor" style="height: 300px;"></div>
                    </div>
                    @error('context')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <!-- Hidden Input for Context -->
                    <input type="hidden" id="context" name="context" value="{{ old('context') }}">

                    <!-- Image Input -->
                    <div class="form-group mb-2">
                        <label for="image">{{ __('Image') }}:</label>
                        <input type="file" id="image" name="image" accept=".png, .jpg, .jpeg" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Is Published Checkbox -->
                    <div class="form-group mb-2">
                        <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
                        <label for="is_published">{{ __('Is Published') }}</label>
                        @error('is_published')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="button" id="submitButton" class="btn btn-primary mt-4">{{ __('Create') }}</button>
                </form>


            </div>
        </div>
    </div>
    @endsection

    @section('styles')
    <!-- Quill CSS -->
    <link href="/dashboard/assets/libs/quill/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="/dashboard/assets/libs/quill/quill.bubble.css" rel="stylesheet" type="text/css" />
    <link href="/dashboard/assets/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />
    @endsection

    @section('scripts')
    <!-- Quill JS -->
    <script src="/dashboard/assets/libs/quill/quill.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Quill editor with the Snow theme
            var quill = new Quill('.snow-editor', {
                theme: 'snow'
            });

            // Get the form and submit button elements
            var form = document.getElementById('blogForm');
            var submitButton = document.getElementById('submitButton');

            // Add click event listener to the submit button
            submitButton.addEventListener('click', function(event) {
                // Prevent default form submission
                event.preventDefault();

                // Get the content from the Quill editor
                var contextContent = quill.root.innerHTML;

                // Set the hidden input field value with the content from the Quill editor
                document.querySelector('input#context').value = contextContent;

                // Submit the form
                form.submit();
            });
        });
    </script>

    <!-- Init JS -->
    <script src="/dashboard/assets/js/pages/form-editor.init.js"></script>
    <script src="/dashboard/assets/js/app.js"></script>
    @endsection