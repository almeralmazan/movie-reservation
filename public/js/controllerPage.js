
var controllerPage = function() {

    var urlBase = window.location.origin;

    var init,
        getMovieTimesById,
        getMemberLoginInputs,
        getRegistrationInputs,
        getMovieId,
        getReservedSeats,
        getAdminReservedSeats,
        saveAdminReservedSeats;

    init = function () {

        var seatsArray = [];

        $('#member-login').on('submit', function (e) {
            e.preventDefault();

            getMemberLoginInputs();
        });

        $('#registration-form').on('submit', function (e) {
            e.preventDefault();

            getRegistrationInputs();
        });

        // Live click from ajax dynamic button
        $(document).on('click', '#populate-seats .available-seats', function () {

            var seatId = $(this).attr('id').replace('seat-number-', '');

            // for testing purposes
            // console.log("seatsArray.length before = " + seatsArray.length);


            if ($(this).hasClass('process-reservation')) {
                $(this).removeClass('btn-info process-reservation')
                    .addClass('btn-success available-seats');

                // remove one item in array
                seatsArray.splice(seatsArray.indexOf(seatId), 1);

            } else {
                $(this).addClass('btn-info process-reservation');

                // add one item into array
                seatsArray.push(seatId);
            }

            // enable reserve button
            if ($('#populate-seats').has('div.process-reservation').length) {
                $('button#reserve-button, button#admin-reserve-button').prop('disabled', false).addClass('btn-warning');
            } else {
                $('button#reserve-button, button#admin-reserve-button').prop('disabled', true).removeClass('btn-warning');
            }

            // for testing purposes
            // console.log('After seatsArray: ' + seatsArray);
            // console.log("seatsArray.length after = " + seatsArray.length);
        });

        $('#movie-select').on('change', function () {
            var cinemaId = $(this).val();

            getMovieTimesById(cinemaId);
        });

        // Delete a movie on dashboard
        $('.delete-movie').click(function() {
            var movieId = $(this).data('movie-id');
            var movieTitle = $(this).data('movie-title');

            bootbox.confirm(
                'Are you sure you want to delete -- <strong>' + movieTitle + '</strong> ?',
                function(accept) {
                    if (accept) {
                        location.href = '/admin/dashboard/delete/movie/' + movieId;
                    }
                }
            );
        });


        $('#show-times').on('change', function() {

            var cinemaId = $('#movie-select').val();
            var timeId = $(this).val();

            getReservedSeats(cinemaId, timeId);
        });

        // Member Check Button
        $('.check-reservation-seats').on('click', function () {
            var timeId = $('#movie-time').val();
            var movieId = $('#movie-id').val();

            getReservedSeats(movieId, timeId);
        });

        // Admin Check Button
        $('.admin-check-reserved-seats').on('click', function () {
            var timeId = $('#movie-time').val();
            var movieId = $('#movie-id').val();

            getAdminReservedSeats(movieId, timeId);
        });

        // Member Reserve Button
        $(document).on('click', '#reserve-button', function () {
            var timeId = $('#movie-time').val();
            var movieId = $('#movie-id').val();

            saveReservedSeats(seatsArray, movieId, timeId);
        });

        // Admin Reserve Button
        $(document).on('click', '#admin-reserve-button', function () {
            var customerName = $('#customer-name').val();
            var timeId = $('#movie-time').val();
            var movieId = $('#movie-id').val();

            saveAdminReservedSeats(seatsArray, movieId, timeId, customerName);
        });

        // Date picker
        $('.form_date').datetimepicker({
            language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });

        // Time picker
        $('.form_time').datetimepicker({
            language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 1,
            minView: 0,
            maxView: 1,
            forceParse: 0
        });

        //thumbnail (hover)
        $( document ).ready(function() {
            $("[rel='tooltip']").tooltip();

            $('.thumbnail').hover(
                function(){
                    $(this).find('.caption').slideDown(250); //.fadeIn(250)
                },
                function(){
                    $(this).find('.caption').slideUp(250); //.fadeOut(205)
                }
            );
        });

        // admin's home page tab
        $(document).ready(function() {
            $("div.tab-menu>div.list-group>a").click(function(e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();
                $("div.tab>div.tab-content").removeClass("active");
                $("div.tab>div.tab-content").eq(index).addClass("active");
            });
        });

        // Seats for cinema screen
        $( "#movie" )
            .change(function () {
                var str = "";
                $( "#movie option:selected" ).each(function() {
                    str += $( this ).val() + " ";
                });
                $( "#cinema-screen" ).text( str );
            }).change();

        // Seats
        $(document).on('click', '.btn-seats', function() {
            $(this).toggleClass('btn-info');
        });

        // counting seats
        $ ( "#reserve-seat" ).on('click', function(){
            // for seats
            var seats = [];
            var total_seats = $(".btn-info").length;
            var price = 75.00;
            var total_burger_price = $("#total-burger-price").text();
            var total_fries_price = $("#total-fries-price").text();
            var total_soda_price = $("#total-soda-price").text();
            // for seats
            $(".container").find(".btn-info").each(function(){ seats.push(this.id); });
            $("#reserving-for-seat").text(seats);
            $("#total-seats").text(total_seats);
            $("#total-seat-price").text(total_seats*price);
            $("#total").text(parseInt($("#total-seat-price").text()) + parseInt(total_fries_price) + parseInt(total_soda_price) + parseInt(total_burger_price));
        });

        // Add-ons burger
        $ ("#qty-burger").on('input',function(){
            var qty_burger = $("#qty-burger").val();
            var price_burger = 30.00;
            var total = $("#total-seat-price").text();
            var total_fries_price = $("#total-fries-price").text();
            var total_soda_price = $("#total-soda-price").text();
            $("#total-burger-price").text(qty_burger*price_burger);
            $("#total").text(parseInt(total) + parseInt($("#total-burger-price").text()) + parseInt(total_fries_price) + parseInt(total_soda_price));
        });

        // Add-ons fries
        $ ("#qty-fries").on('input',function(){
            var qty_fries = $("#qty-fries").val();
            var price_fries = 25.00;
            var total_burger_price = $("#total-burger-price").text();
            var total_soda_price = $("#total-soda-price").text();
            var total = $("#total-seat-price").text();
            $("#total-fries-price").text(qty_fries*price_fries);
            $("#total").text(parseInt(total) + parseInt($("#total-fries-price").text()) + parseInt(total_burger_price) + parseInt(total_soda_price));
        });

        // Add-ons soda
        $ ("#qty-soda").on('input',function(){
            var qty_soda = $("#qty-soda").val();
            var price_soda = 15.00;
            var total_burger_price = $("#total-burger-price").text();
            var total_fries_price = $("#total-fries-price").text();
            var total = $("#total-seat-price").text();
            $("#total-soda-price").text(qty_soda*price_soda);
            $("#total").text(parseInt(total) + parseInt($("#total-soda-price").text())+ parseInt(total_burger_price) + parseInt(total_fries_price));
        });

        //Cinema page
        $( '#btn-get-movie-1' ).on('click', function(){
            $('#details-1').css({
                opacity: 1
            });
        });

        $( '#btn-get-movie-2' ).on('click', function(){
            $('#details-2').css({
                opacity: 1
            });
        });


    };

    getMovieTimesById = function (cinemaId) {
        dataService.getMovieTimesById(cinemaId)
            .done(function (data) {
                var showTimesContainer = $('#show-times');
                var html;

                showTimesContainer.empty();

                html = '<option>-- Select Times --</option>';

                for (var i = 0; i < data.length; i++) {
                    html += "<option value='" + data[i].time_id + "'>" + data[i].start_time + '</option>';
                }

                showTimesContainer.html(html);
            })
            .fail(function (jqXHR, textStatus, error) {
                console.log(textStatus);
            });
    };

    getMemberLoginInputs = function () {
        dataService.memberLogin()
            .done(function (data) {
                if (!data.success) {
                    $('#error-message')
                        .addClass('alert alert-danger')
                        .text(data.message);
                } else {
                    window.location.href = urlBase + '/member';
                }
            })
            .fail(function (jqXHR, textStatus, error) {
                console.log(textStatus);
            });
    };

    getRegistrationInputs = function () {
        dataService.register()
            .done(function (data) {

                var errorsContainer = $('#registration-errors');
                var ulContainer = $('ul.content');
                var result = '';

                if (!data.success) {
                    $.each(data.message, function (index, value) {
                        result += '<li>' + value + '</li>';
                    });

                    errorsContainer.addClass('alert alert-danger');
                    ulContainer.html(result);

                } else {
                    errorsContainer.removeClass('alert-danger');

                    $('#first_name').val('');
                    $('#last_name').val('');
                    $('#mobile_number').val('');
                    $('#email').val('');
                    $('#password').val('');
                    $('#password_confirmation').val('');

                    errorsContainer
                        .addClass('alert alert-success')
                        .html(data.message)
                }
            })
            .fail(function (jqXHR, textStatus, error) {
                console.log(textStatus);
            });
    };

    getMovieId = function (id) {
        dataService.getMovieId(id)
            .done(function (data) {
                $('h4#movie-name').text(data.name);
                $('p#p_description').text(data.description);
                $('.modal-footer').html(
                    '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'
                );
            })
            .fail(function (jqXHR, textStatus, error) {
                console.log(textStatus);
            });
    };
    getReservedSeats = function (cinemaId, timeId) {
        dataService.getReservedSeats(cinemaId, timeId)
            .done(function (data) {
                var seatsContent = $('#populate-seats');
                seatsContent.empty();

                var html = '';
                if (data.length === 0) {
                    for (var index = 0; index < 50; index++) {
                        html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two'>";
                        html +=     "<button class='btn-seats btn btn-success btn-block' id='seat-" + (index + 1) + "'>" + (index + 1) + "</button>";
                        html += "</div>";
                    }
                } else {
                    var currentIndexValue = 0;

                    for (var index = 0; index < 50; index++) {
                        if (data[currentIndexValue] !== undefined &&
                            (index + 1) === data[currentIndexValue].seat_number &&
                            data[currentIndexValue].paid_status === 1) {
                            html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two' data-toggle='tooltip' data-placement='top' title='" + data[currentIndexValue].customer_name + "'>";
                            html +=     "<button class='btn-seats btn btn-danger btn-block' id='seat-" + (index + 1) + "' disabled>" + (index + 1) + "</button>";
                            html += "</div>";

                            currentIndexValue++;

                        } else if (data[currentIndexValue] !== undefined &&
                                    (index + 1) === data[currentIndexValue].seat_number &&
                                    data[currentIndexValue].paid_status === 2) {

                            html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two' data-toggle='tooltip' data-placement='top' title='" + data[currentIndexValue].customer_name + "'>";
                            html +=     "<button class='btn-seats btn btn-warning btn-block'  data-toggle='tooltip' data-placement='top' title='" + data[currentIndexValue].customer_name + "'id='seat-" + (index + 1) + "' disabled>" + (index + 1) + "</button>";
                            html += "</div>";

                        } else {
                            html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two'>";
                            html +=     "<button class='btn-seats btn btn-success btn-block' id='seat-" + (index + 1) + "'>" + (index + 1) + "</button>";
                            html += "</div>";
                        }
                    }
                }


                seatsContent.html(html);

            })
            .fail(function (jqXHR, textStatus, error) {
                console.log(textStatus);
            });
    };

    getAdminReservedSeats = function (movieId, timeId) {
        dataService.getReservedSeats(movieId, timeId)
            .done(function (data) {
                var seatsContent = $('#populate-seats');

                seatsContent.empty();

                var html = "<div style='margin-top: 20px;' class='btn-toolbar' role='toolbar'><div class='btn-group'>";

                if (data.length === 0) {
                    for (var index = 0; index < 50; index++) {
                        html += "<div id='seat-number-" + (index + 1) + "' class='btn btn-success available-seats'>" + (index + 1) + "</div>";
                    }
                } else {
                    var currentIndexValue = 0;

                    for (var index = 0; index < 50; index++) {
                        if (data[currentIndexValue] !== undefined && (index + 1) === data[currentIndexValue].seat_number) {
                            html += "<div id='seat-number-" + (index + 1) + "' class='btn btn-danger reserved-seats'>" + (index + 1) + "</div>";
                            currentIndexValue++;
                        } else {
                            html += "<div id='seat-number-" + (index + 1) + "' class='btn btn-success available-seats'>" + (index + 1) + "</div>";
                        }
                    }
                }

                html += "</div></div>";

                html += "<div><input id='customer-name' type='text' name='customer_name' class='form-control'/></div>";

                html += "<div id='customer-info'> <button class='btn btn-default' id='admin-reserve-button' disabled='disabled'>Reserve</button> </div>";

                seatsContent.html(html);

            })
            .fail(function (jqXHR, textStatus, error) {
                console.log(textStatus);
            });
    };

    saveAdminReservedSeats = function (seatsArray, movieId, timeId, customerName) {
        dataService.saveAdminReservedSeats(seatsArray, movieId, timeId, customerName)
            .done(function (data) {
                console.log('Success sending data...');
            })
            .fail(function (jqXHR, textStatus, error) {
                console.log(textStatus);
            });
    };

    saveReservedSeats = function(seatsArray, movieId, timeId) {
        dataService.saveReservedSeats(seatsArray, movieId, timeId)
            .done( function(data) {
                console.log('Success sending data...');
                window.location.reload();
            })
            .fail( function(jqXHR, textStatus, error) {
                console.log(textStatus);
            });
    };

    return {
        init: init
    };
}();

controllerPage.init();
