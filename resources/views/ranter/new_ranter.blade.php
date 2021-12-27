@extends('layouts.master')
@section('title')
    {{$title}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">{{$title}}</h6>
                </div>

                <div class="panel-body">

                        <form  class="stepy-validation" action="{{$actions}}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <input type="hidden" name="ranterID" value="{{$table->ranterID ?? ''}}">
                            <fieldset title="1">
                                <legend class="text-semibold">Personal data</legend>
                                @include('shared.ranter_form.basic')
                            </fieldset>

                            <fieldset title="2">
                                <legend class="text-semibold">Guardian Information</legend>
                                @include('shared.ranter_form.guardian')
                            </fieldset>

                            <fieldset title="3">
                                <legend class="text-semibold">Educational/Occupational data</legend>
                                @include('shared.ranter_form.educational')
                            </fieldset>

                            <fieldset title="4">
                                <legend class="text-semibold">Additional data</legend>
                                @include('shared.ranter_form.other')
                            </fieldset>
                            <button type="submit" class="btn btn-success stepy-finish">Submit <i class="icon-check position-right"></i></button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript" src="{{asset('public/assets/js/plugins/forms/validation/validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/forms/wizards/stepy.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/pickers/daterangepicker.js')}}"></script>

    <script type="text/javascript">

        $(function () {

            // Override defaults
            $.fn.stepy.defaults.legend = false;
            $.fn.stepy.defaults.transition = 'fade';
            $.fn.stepy.defaults.duration = 150;
            $.fn.stepy.defaults.backLabel = '<button type="button" class="btn btn-warning"><i class="icon-arrow-left16 position-left"></i> Back</button> ';
            $.fn.stepy.defaults.nextLabel = ' <button type="button" class="btn btn-primary">Next <i class="icon-arrow-right16 position-right"></i></button>';

            $(".stepy-validation").stepy({
                validate: true,
                block: true,
                next: function(index) {
                    if (!$(".stepy-validation").validate(validate)) {
                        return false
                    }
                }
            });


            // Initialize validation
            var validate = {
                ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
                errorClass: 'validation-error-label',
                successClass: 'validation-valid-label',
                highlight: function(element, errorClass) {
                    $(element).removeClass(errorClass);
                },
                unhighlight: function(element, errorClass) {
                    $(element).removeClass(errorClass);
                },

                // Different components require proper error label placement
                errorPlacement: function(error, element) {

                    // Styled checkboxes, radios, bootstrap switch
                    if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                        if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                            error.appendTo( element.parent().parent().parent().parent() );
                        }
                        else {
                            error.appendTo( element.parent().parent().parent().parent().parent() );
                        }
                    }

                    // Unstyled checkboxes, radios
                    else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                        error.appendTo( element.parent().parent().parent() );
                    }

                    // Input with icons and Select2
                    else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                        error.appendTo( element.parent() );
                    }

                    // Inline checkboxes, radios
                    else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                        error.appendTo( element.parent().parent() );
                    }

                    // Input group, styled file input
                    else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                        error.appendTo( element.parent().parent() );
                    }

                    else {
                        error.insertAfter(element);
                    }
                },
                rules: {
                    email: {
                        email: true
                    }
                }
            }

        });



        $(function () {
            var types1 = $('#ranterType').val();
            educational_box(types1);

            $('#ranterType').change(function () {
                var types = $(this).val();
                educational_box(types);
            });
        });


        $(function () {
            $("#inputFile").change(function () {
                imgPrev(this , '.photo_prev');
            });

            $("#guardianPhoto").change(function () {
                imgPrev(this , '.guardianPhoto');
            });

            $("#guardianPhotoLoc").change(function () {
                imgPrev(this , '.guardianPhotoLoc');
            });

            $("#guardian1Photo").change(function () {
                imgPrev(this , '.guardian1Photo');
            });

        });

        $(function () {
            $('.date_pic').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });

            $('.dob').daterangepicker({
                singleDatePicker: true,
                 showDropdowns: true,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });


        function educational_box(types) {
            switch(types) {
                case 'School':
                    $('#ssc').show();
                    $('#hsc, #hns, #ms, #coach, #jobs').hide();
                    break;
                case 'College':
                    $('#ssc, #hsc').show();
                    $('#hns, #ms, #coach, #jobs').hide();
                    break;
                case 'Coaching':
                    $('#ssc, #hsc, #coach').show();
                    $('#hns, #ms, #jobs').hide();
                    break;
                case 'Honours':
                    $('#ssc, #hsc, #hns').show();
                    $('#ms, #coach, #jobs').hide();
                    break;
                case 'Masters':
                    $('#ssc, #hsc, #hns, #ms').show();
                    $('#coach, #jobs').hide();
                    break;
                case 'MBA':
                    $('#ssc, #hsc, #hns, #ms').show();
                    $('#coach, #jobs').hide();
                    break;
                case 'Diploma':
                    $('#ssc, #hsc, #coach').show();
                    $('#hns, #ms, #jobs').hide();
                    break;
                case 'Job':
                    $('#jobs').show();
                    $('#ssc, #hsc, #hns, #ms, #coach').hide();
                    break;
                default:
                    $('#ssc').show();
                    $('#hsc, #hns, #ms, #coach, #jobs').hide();
            }
        }






    </script>

@endsection
