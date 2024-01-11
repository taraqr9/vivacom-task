<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Colorlib Templates">
        <meta name="author" content="Colorlib">
        <meta name="keywords" content="Colorlib Templates">

        <!-- Title Page-->
        <title>Customer</title>

        <!-- Icons font CSS-->
        <link href="{{ url()->asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ url()->asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
        <!-- Font special for pages-->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

        <!-- Vendor CSS-->
        <link href="{{ url()->asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ url()->asset('vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="{{ url()->asset('css/main.css') }}" rel="stylesheet" media="all">

        <!-- Jquery-->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    </head>
    <body>

    <div class="page-wrapper bg-secondary p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        Customer stored successfully!
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Customer Data Store</h2>
                    <form method="POST" action="{{ route('customer.store') }}">
                        @csrf
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="NAME" name="name" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="email" placeholder="EMAIL" name="email" required>
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="PHONE" name="phone" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender" required>
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            @foreach(\App\Enums\GenderEnum::cases() as $gender)
                                                <option value="{{$gender->value}}">{{$gender->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select id="division" name="division_id" required>
                                    <option disabled="disabled" selected>SELECT DIVISION</option>
                                    @foreach($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select id="district" name="district_id" required>
                                    <option disabled="disabled" selected>SELECT DISTRICT</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#district').prop('disabled', true).hide();

            $('#division').on('change', function () {
                var divisionId = $(this).val();

                $('#district').empty();
                $('#district').append('<option disabled="disabled" selected="selected">SELECT DISTRICT</option>');

                if (divisionId) {
                    $('#district').prop('disabled', false).show();

                    $.ajax({
                        url: '/'+ divisionId +'/district',
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            $.each(data, function (key, value) {
                                $('#district').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                } else {
                    $('#district').prop('disabled', true).hide();
                }
            });
        });
    </script>


    <!-- Jquery JS-->
    <script src="{{ url()->asset('vendor/jquery/jquery.min.js') }}"></script>

    <!-- Vendor JS-->
    <script src="{{ url()->asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ url()->asset('vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ url()->asset('vendor/datepicker/daterangepicker.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ url()->asset('js/global.js') }}"></script>
    </body>
</html>
