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

<div id="languageRepeater">
    <div class="repeater">

        <input type="text" name="languages[0][name]" >
        <input type="number" name="languages[0][percentage]" >
        <button data-repeater-delete type="button" class="btn btn-outline-danger btn-sm">{{ __('Delete') }}</button>
    </div>
</div>
<button id="addLanguageBtn" type="button" class="btn btn-outline-primary btn-sm mt-2">{{ __('Add Language') }}</button>


@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Repeater JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize repeaters
        initializeRepeater('#languageRepeater', 'languages');

        // Handle form submission
        $('#submitButton').click(function() {
            checkAndHandleEmptyRepeater('#languageRepeater', 'languages');
            $('form').submit();
        });

        // Template for language
        var languageTemplate = $('#languageRepeater .repeater').eq(0).clone();

        // Handle add language button
        $('#addLanguageBtn').on('click', function() {
            handleAddButton(languageTemplate, '#languageRepeater', 'languages');
        });

        // Handle delete and language button
        $('#languageRepeater').on('click', 'button[data-repeater-delete]', function() {
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