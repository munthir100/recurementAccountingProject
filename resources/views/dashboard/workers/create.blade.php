@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Projects")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Projects")])
@endsection

@section('styles')
@endsection

@section('content')
<div class="row">
    <div class="card">
        <x-dashboard.alerts />
        <div class="card-body">
            <form action="{{ route('user.dashboard.workers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2">
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="{{ __('Enter your firstname') }}" value="{{ old('first_name') }}">
                            <label for="first_name">{{ __('First Name') }}</label>
                            @error('first_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="{{ __('Enter your lastname') }}" value="{{ old('last_name') }}">
                            <label for="last_name">{{ __('Last Name') }}</label>
                            @error('last_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" name="job" id="job" class="form-control" placeholder="{{ __('Enter your job') }}" value="{{ old('job') }}">
                            <label for="job">{{ __('Job') }}</label>
                            @error('job')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="number" step="0.01" name="month_salary" id="month_salary" class="form-control" placeholder="{{ __('Enter month salary') }}" value="{{ old('month_salary') }}">
                            <label for="month_salary">{{ __('Month Salary') }}</label>
                            @error('month_salary')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="number" name="contract_period" id="contract_period" class="form-control" placeholder="{{ __('Enter contract period') }}" value="{{ old('contract_period') }}">
                            <label for="contract_period">{{ __('Contract Period') }}</label>
                            @error('contract_period')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="number" step="0.01" name="years_of_experience" id="years_of_experience" class="form-control" placeholder="{{ __('Enter years of experience') }}" value="{{ old('years_of_experience') }}">
                            <label for="years_of_experience">{{ __('Years of Experience') }}</label>
                            @error('years_of_experience')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" name="nationality" id="nationality" class="form-control" placeholder="{{ __('Enter nationality') }}" value="{{ old('nationality') }}">
                            <label for="nationality">{{ __('Nationality') }}</label>
                            @error('nationality')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="number" step="0.01" name="age" id="age" class="form-control" placeholder="{{ __('Enter age') }}" value="{{ old('age') }}">
                            <label for="age">{{ __('Age') }}</label>
                            @error('age')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" name="type" id="type" class="form-control" placeholder="{{ __('Enter type') }}" value="{{ old('type') }}">
                            <label for="type">{{ __('Type') }}</label>
                            @error('type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="number" step="0.01" name="tall" id="tall" class="form-control" placeholder="{{ __('Enter tall') }}" value="{{ old('tall') }}">
                            <label for="tall">{{ __('Tall') }}</label>
                            @error('tall')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" name="religion" id="religion" class="form-control" placeholder="{{ __('Enter religion') }}" value="{{ old('religion') }}">
                            <label for="religion">{{ __('Religion') }}</label>
                            @error('religion')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" name="place_of_birth" id="place_of_birth" class="form-control" placeholder="{{ __('Enter place of birth') }}" value="{{ old('place_of_birth') }}">
                            <label for="place_of_birth">{{ __('Place of Birth') }}</label>
                            @error('place_of_birth')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="number" name="children" id="children" class="form-control" placeholder="{{ __('Enter children') }}" value="{{ old('children') }}">
                            <label for="children">{{ __('Children') }}</label>
                            @error('children')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" name="education" id="education" class="form-control" placeholder="{{ __('Enter education') }}" value="{{ old('education') }}">
                            <label for="education">{{ __('Education') }}</label>
                            @error('education')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="date" name="birth_date" id="birth_date" class="form-control" placeholder="{{ __('Enter birth date') }}" value="{{ old('birth_date') }}">
                            <label for="birth_date">{{ __('Birth Date') }}</label>
                            @error('birth_date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="number" step="0.01" name="weight" id="weight" class="form-control" placeholder="{{ __('Enter weight') }}" value="{{ old('weight') }}">
                            <label for="weight">{{ __('Weight') }}</label>
                            @error('weight')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" name="work_experience_country" id="work_experience_country" class="form-control" placeholder="{{ __('Enter work experience country') }}" value="{{ old('work_experience_country') }}">
                            <label for="work_experience_country">{{ __('Work Experience Country') }}</label>
                            @error('work_experience_country')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <select required class="form-select" id="status_id" name="status_id">
                                <option value="">{{__('Select Status')}}</option>
                                @foreach(\App\Models\Worker::STATUSES as $id => $name)
                                <option value="{{ $id }}">{{ __($name) }}</option>
                                @endforeach
                            </select>
                            <label for="status_id">{{ __('Status') }}</label>
                            @error('status_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 mt-2">
                        <div class="form-floating">
                            <input class="form-control" type="file" id="main_image" name="main_image">
                            <label for="main_image">{{ __('Profile Image') }}</label>
                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div id="experianceRepeater" class="mt-0">
                            <div class="repeater">
                                <div class="d-flex mb-2">
                                    <input type="text" class="form-control mr-2" name="practical_experience[0][name]" placeholder="{{ __('Name') }}" value="">
                                    <input type="text" class="form-control mr-2" name="practical_experience[0][value]" placeholder="{{ __('Value') }}" value="">
                                    <button data-repeater-delete type="button" class="btn btn-outline-danger btn-sm">{{ __('Delete') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-danger" id="errorExperience"></div>
                        <button id="addExperienceBtn" type="button" class="btn btn-outline-primary btn-sm mt-2">{{ __('Add Experience') }}</button>
                    </div>

                    <div class="col-md-6">
                        <div id="languageRepeater" class="mt-0">
                            <div class="repeater">
                                <div class="d-flex mb-2">
                                    <input type="text" class="form-control mr-2" name="languages[0][name]" placeholder="{{ __('Language Name') }}" value="">
                                    <input type="number" class="form-control mr-2" name="languages[0][percentage]" placeholder="{{ __('Percentage') }}" value="">
                                    <button data-repeater-delete type="button" class="btn btn-outline-danger btn-sm">{{ __('Delete') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-danger" id="errorLanguages"></div>
                        <button id="addLanguageBtn" type="button" class="btn btn-outline-primary btn-sm mt-2">{{ __('Add Language') }}</button>
                    </div>
                </div>


                <div class="form-group">
                    <button type="button" id="submitButton" class="btn btn-primary mt-4">{{ __('Create Worker') }}</button>
                </div>
            </form>


        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('dashboard/assets/js/pages/select2.init.js')}}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Repeater JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize repeaters
        initializeRepeater('#experianceRepeater', 'practical_experience');
        initializeRepeater('#languageRepeater', 'languages');

        // Handle form submission
        $('#submitButton').click(function() {
            checkAndHandleEmptyRepeater('#experianceRepeater', 'practical_experience');
            checkAndHandleEmptyRepeater('#languageRepeater', 'languages');
            $('form').submit();
        });

        // Template for practical experience
        var experienceTemplate = $('#experianceRepeater .repeater').eq(0).clone();
        var languageTemplate = $('#languageRepeater .repeater').eq(0).clone();

        // Handle add practical experience button
        $('#addExperienceBtn').on('click', function() {
            handleAddButton(experienceTemplate, '#experianceRepeater', 'practical_experience');
        });

        // Handle add language button
        $('#addLanguageBtn').on('click', function() {
            handleAddButton(languageTemplate, '#languageRepeater', 'languages');
        });

        // Handle delete practical experience and language buttons
        $('#experianceRepeater, #languageRepeater').on('click', 'button[data-repeater-delete]', function() {
            handleDeleteButton($(this), $(this).closest('.repeater'));
        });

        // Function to initialize repeaters
        function initializeRepeater(repeaterId, hiddenInputName) {
            $(repeaterId).repeater({
                show: function() {
                    $(this).slideDown();
                },
                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                    // Check if all items are deleted
                    if ($(repeaterId + ' .repeater').length === 0) {
                        // If all are deleted, set the corresponding hidden input value to null
                        $('input[name="' + hiddenInputName + '"]').val(null);
                    }
                }
            });
        }

        // Function to check and handle empty repeaters
        function checkAndHandleEmptyRepeater(repeaterId, hiddenInputName) {
            if ($(repeaterId + ' .repeater').length === 0) {
                // If the repeater is empty, add a hidden input with null value
                $('<input>').attr({
                    type: 'hidden',
                    name: hiddenInputName,
                    value: null
                }).appendTo('form');
            }
        }

        // Function to handle add button click
        function handleAddButton(template, repeaterId, hiddenInputName) {
            var newTemplate = template.clone();
            newTemplate.find('input').val('');
            $(repeaterId).append(newTemplate);
            updateInputNames($(repeaterId + ' .repeater'));
        }

        // Function to handle delete button click
        function handleDeleteButton(button, repeater) {
            repeater.slideUp(function() {
                $(this).remove();
                // Update input field names after deleting
                updateInputNames($(button).closest('.repeater').siblings('.repeater'));
            });
        }

        // Function to update input field names with unique indices
        function updateInputNames(repeaters) {
            repeaters.each(function(index, element) {
                $(element).find('input, select').each(function() {
                    var name = $(this).attr('name');
                    name = name.replace(/\[(\d+)\]/, '[' + index + ']');
                    $(this).attr('name', name);
                });
            });
        }
    });
</script>
@endsection