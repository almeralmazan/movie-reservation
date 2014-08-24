var controllerPage = function () {

    var urlBase = window.location.origin;

    var init,
        getMovieTimesById,
        getMemberLoginInputs,
        changePassword,
        getRegistrationInputs,
        getMovieId,
        getReservedSeats,
        getAdminReservedSeats,
        saveAdminReservedSeats,
        memberPayPalDeposit,
        memberBankDeposit,
        adminWalkinSaveReserveSeats,
        getMemberReservedSeats;

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

        $('#change-password-form').on('submit', function (e) {
            e.preventDefault();
            changePassword();
        });

        // Live click from ajax dynamic button
        $(document).on('click', '#populate-seats .available-seats', function () {

            var seatId = $(this).attr('id').replace('seat-number-', '');

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
        });

        $('#movie-select').on('change', function () {
            var cinemaId = $(this).val();
            getMovieTimesById(cinemaId);
        });

        // Delete a movie on dashboard
        $('.delete-movie').click(function () {
            var movieId = $(this).data('movie-id');
            var movieTitle = $(this).data('movie-title');

            bootbox.confirm(
                'Are you sure you want to delete -- <strong>' + movieTitle + '</strong> ?',
                function (accept) {
                    if (accept) {
                        location.href = '/admin/dashboard/delete/movie/' + movieId;
                    }
                }
            );
        });

        // Delete a transaction on transaction dashboard page
        $(document).on('click', '.delete-transaction', function () {
            var transactionId = $(this).data('transaction-id');

            bootbox.confirm(
                'Are you sure you want to delete?',
                function (accept) {
                    if (accept) {
                        location.href = '/admin/dashboard/delete/transaction/' + transactionId;
                    }
                }
            );
        });

        // Pay transaction on transaction dashboard page
        $(document).on('click', '.pay-transaction', function () {
            var transactionId = $(this).data('transaction-id');

            bootbox.confirm(
                'Are you sure you want to set this to Paid status?',
                function (accept) {
                    if (accept) {
                        location.href = '/admin/dashboard/pay/transaction/' + transactionId;
                    }
                }
            );
        });

        $('#show-times').on('change', function () {
            var cinemaId = $('#movie-select').val();
            var timeId = $(this).val();

            getAdminReservedSeats(cinemaId, timeId);
        });

        // Pay Online
        $('#paypal-deposit').on('click', function(e) {
            e.preventDefault();

            var cinemaId = $('#cinema-id-paypal').val();
            var selectedTime = $('#show-start-time').val();

            var memberName = $('#member-name-paypal').val();
            var seatsReserved = $('#reserving-for-seat-paypal').text();

            var seatsQuantity = $('#total-seats-paypal').text();
            var burgerQuantity = $('#qty-burger-paypal').val();
            var friesQuantity = $('#qty-fries-paypal').val();
            var sodaQuantity = $('#qty-soda-paypal').val();

            var totalBurgerPrice = $('#total-burger-price-paypal').text();
            var totalFriesPrice = $('#total-fries-price-paypal').text();
            var totalSodaPrice = $('#total-soda-price-paypal').text();
            var totalPrice = $('h4#total-paypal').text();

            memberPayPalDeposit(
                cinemaId, selectedTime, memberName, seatsReserved,
                seatsQuantity, burgerQuantity, friesQuantity, sodaQuantity,
                totalBurgerPrice, totalFriesPrice, totalSodaPrice, totalPrice
            );
        });

        // Member Reserve Seat
        $('#member-bank-deposit-form').on('submit', function(event) {
            event.preventDefault();

            var cinemaId = $('#bank-cinema-id').val();
            var selectedTime = $('#show-start-time').val();

            var memberName = $('#bank-member-name').val();
            var seatsReserved = $('#reserving-for-seat').text();

            var seatsQuantity = $('#total-seats').text();
            var burgerQuantity = $('#qty-burger').val();
            var friesQuantity = $('#qty-fries').val();
            var sodaQuantity = $('#qty-soda').val();

            var totalBurgerPrice = $('#total-burger-price').text();
            var totalFriesPrice = $('#total-fries-price').text();
            var totalSodaPrice = $('#total-soda-price').text();
            var totalPrice = $('h4#total').text();

            memberBankDeposit(
                cinemaId, selectedTime, memberName, seatsReserved,
                seatsQuantity, burgerQuantity, friesQuantity, sodaQuantity,
                totalBurgerPrice, totalFriesPrice, totalSodaPrice, totalPrice
            );

        });

        // Admin Reserve Seat
        $('#admin-reserve-seat').on('submit', function(event) {
            event.preventDefault();

            var cinemaId = $('#movie-select').val();
            var selectedTime = $('#show-times').val();

            var walkinName = $('#walkin-name').val();
//            var customerStatus = 'walkin';
            var seatsReserved = $('#reserving-for-seat').text();

            var seatsQuantity = $('#total-seats').text();
            var burgerQuantity = $('#qty-burger').val();
            var friesQuantity = $('#qty-fries').val();
            var sodaQuantity = $('#qty-soda').val();

            var totalBurgerPrice = $('#total-burger-price').text();
            var totalFriesPrice = $('#total-fries-price').text();
            var totalSodaPrice = $('#total-soda-price').text();
            var totalPrice = $('h4#total').text();

            adminWalkinSaveReserveSeats(
                cinemaId, selectedTime, walkinName, seatsReserved,
                seatsQuantity, burgerQuantity, friesQuantity, sodaQuantity,
                totalBurgerPrice, totalFriesPrice, totalSodaPrice, totalPrice
            );

        });

        // Admin Reserve Button
        $(document).on('click', '#admin-reserve-button', function () {
            var customerName = $('#customer-name').val();
            var timeId = $('#movie-time').val();
            var movieId = $('#movie-id').val();

            saveAdminReservedSeats(seatsArray, movieId, timeId, customerName);
        });


        // Member Check Button
        $('.check-reservation-seats').on('click', function () {
            var timeId = $('#movie-time').val();
            var movieId = $('#movie-id').val();

            getReservedSeats(movieId, timeId);
        });


        // Member Reserve Button
        $(document).on('click', '#reserve-button', function () {
            var timeId = $('#movie-time').val();
            var movieId = $('#movie-id').val();

            saveReservedSeats(seatsArray, movieId, timeId);
        });

        // Member Select Time in Reserve Movie Page
        $('#show-start-time').on('change', function () {
            var timeId = $(this).val();

            getMemberReservedSeats(timeId);
        });


        // Date picker
        $('.form_date').datetimepicker({
            language: 'fr',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });

        // Time picker
        $('.form_time').datetimepicker({
            language: 'fr',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 1,
            minView: 0,
            maxView: 1,
            forceParse: 0
        });

        //thumbnail (hover)
        $(document).ready(function () {
            $("[rel='tooltip']").tooltip();

            $('.thumbnail').hover(
                function () {
                    $(this).find('.caption').slideDown(250); //.fadeIn(250)
                },
                function () {
                    $(this).find('.caption').slideUp(250); //.fadeOut(205)
                }
            );
        });

        // admin's home page tab
        $(document).ready(function () {
            $("div.tab-menu>div.list-group>a").click(function (e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();
                $("div.tab>div.tab-content").removeClass("active");
                $("div.tab>div.tab-content").eq(index).addClass("active");
            });
        });

        // Seats for cinema screen
        $("#movie")
            .change(function () {
                var str = "";
                $("#movie option:selected").each(function () {
                    str += $(this).val() + " ";
                });
                $("#cinema-screen").text(str);
            }).change();

        // Seats
        $(document).on('click', '.btn-seats', function () {
            $(this).toggleClass('btn-info');
        });

        // counting seats - paypal
        $ ( "#reserve-seat-paypal" ).on('click', function(){
            // for seats
            var seats = [];
            var total_seats = $(".btn-info").length;
            var price = 250.00;
            var total_burger_price = $("#total-burger-price-paypal").text();
            var total_fries_price = $("#total-fries-price-paypal").text();
            var total_soda_price = $("#total-soda-price-paypal").text();
            // for seats
            $(".container").find(".btn-info").each(function(){ seats.push(this.id); });
            $("#reserving-for-seat-paypal").text(seats);
            $("#total-seats-paypal").text(total_seats);
            $("#total-seat-price-paypal").text(total_seats*price);
            $("#total-paypal").text(parseInt($("#total-seat-price-paypal").text()) + parseInt(total_fries_price) + parseInt(total_soda_price) + parseInt(total_burger_price));
        });

        // Add-ons burger
        $ ("#qty-burger-paypal").on('input',function(){
            var qty_burger = $("#qty-burger-paypal").val();
            var price_burger = 50.00;
            var total = $("#total-seat-price-paypal").text();
            var total_fries_price = $("#total-fries-price-paypal").text();
            var total_soda_price = $("#total-soda-price-paypal").text();
            $("#total-burger-price-paypal").text(qty_burger*price_burger);
            $("#total-paypal").text(parseInt(total) + parseInt($("#total-burger-price-paypal").text()) + parseInt(total_fries_price) + parseInt(total_soda_price));
        });

        // Add-ons fries
        $ ("#qty-fries-paypal").on('input',function(){
            var qty_fries = $("#qty-fries-paypal").val();
            var price_fries = 50.00;
            var total_burger_price = $("#total-burger-price-paypal").text();
            var total_soda_price = $("#total-soda-price-paypal").text();
            var total = $("#total-seat-price-paypal").text();
            $("#total-fries-price-paypal").text(qty_fries*price_fries);
            $("#total-paypal").text(parseInt(total) + parseInt($("#total-fries-price-paypal").text()) + parseInt(total_burger_price) + parseInt(total_soda_price));
        });

        // Add-ons soda
        $ ("#qty-soda-paypal").on('input',function(){
            var qty_soda = $("#qty-soda-paypal").val();
            var price_soda = 30.00;
            var total_burger_price = $("#total-burger-price-paypal").text();
            var total_fries_price = $("#total-fries-price-paypal").text();
            var total = $("#total-seat-price-paypal").text();
            $("#total-soda-price-paypal").text(qty_soda*price_soda);
            $("#total-paypal").text(parseInt(total) + parseInt($("#total-soda-price-paypal").text())+ parseInt(total_burger_price) + parseInt(total_fries_price));
        });


        // counting seats
        $("#reserve-seat").on('click', function () {
            // for seats
            var seats = [];
            var total_seats = $(".btn-info").length;
            var price = 250.00;
            var total_burger_price = $("#total-burger-price").text();
            var total_fries_price = $("#total-fries-price").text();
            var total_soda_price = $("#total-soda-price").text();
            // for seats
            $(".container").find(".btn-info").each(function () {
                seats.push(this.id);
            });
            $("#reserving-for-seat").text(seats);
            $("#total-seats").text(total_seats);
            $("#total-seat-price").text(total_seats * price);
            $("#total").text(parseInt($("#total-seat-price").text()) + parseInt(total_fries_price) + parseInt(total_soda_price) + parseInt(total_burger_price));
        });

        // Add-ons burger
        $("#qty-burger").on('input', function () {
            var qty_burger = $("#qty-burger").val();
            var price_burger = 50.00;
            var total = $("#total-seat-price").text();
            var total_fries_price = $("#total-fries-price").text();
            var total_soda_price = $("#total-soda-price").text();
            $("#total-burger-price").text(qty_burger * price_burger);
            $("#total").text(parseInt(total) + parseInt($("#total-burger-price").text()) + parseInt(total_fries_price) + parseInt(total_soda_price));
        });

        // Add-ons fries
        $("#qty-fries").on('input', function () {
            var qty_fries = $("#qty-fries").val();
            var price_fries = 50.00;
            var total_burger_price = $("#total-burger-price").text();
            var total_soda_price = $("#total-soda-price").text();
            var total = $("#total-seat-price").text();
            $("#total-fries-price").text(qty_fries * price_fries);
            $("#total").text(parseInt(total) + parseInt($("#total-fries-price").text()) + parseInt(total_burger_price) + parseInt(total_soda_price));
        });

        // Add-ons soda
        $("#qty-soda").on('input', function () {
            var qty_soda = $("#qty-soda").val();
            var price_soda = 30.00;
            var total_burger_price = $("#total-burger-price").text();
            var total_fries_price = $("#total-fries-price").text();
            var total = $("#total-seat-price").text();
            $("#total-soda-price").text(qty_soda * price_soda);
            $("#total").text(parseInt(total) + parseInt($("#total-soda-price").text()) + parseInt(total_burger_price) + parseInt(total_fries_price));
        });

        //Cinema page
        $('#btn-get-movie-1').on('click', function () {
            $('#details-1').css({
                opacity: 1
            });
        });

        $('#btn-get-movie-2').on('click', function () {
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
                        .addClass('alert-danger')
                        .text(data.message);
                } else {
                    window.location.href = urlBase + '/member';
                }
            })
            .fail(function (jqXHR, textStatus, error) {
                console.log(textStatus);
            });
    };

    changePassword = function() {
        dataService.changePassword()
            .done(function (data) {
                if ( ! data.success) {
                    $('#change-password-error')
                        .removeClass('hidden')
                        .text(data.message);
                } else {
                    $('#old-password').val('');
                    $('#new-password').val('');
                    $('#confirm-password').val('');

                    $('#change-password-error').addClass('hidden');

                    $('#myModal-change-pass').modal('hide');

                    $('#change-password-success')
                        .html(
                            '<div class="alert alert-success alert-dismissible" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert">' +
                                    '<span aria-hidden="true">&times;</span>' +
                                    '<span class="sr-only">Close</span>' +
                                '</button>' + data.message + '</div>'
                        );

                }
            })
            .fail(function (jqXHR, textStatus, error) {
                console.log(textStatus);
            });
    };

    getRegistrationInputs = function () {
        dataService.register()
            .done(function (data) {

                if ( ! data.success) {

                    $('#first-name-error').empty();
                    $('#last-name-error').empty();
                    $('#email-error').empty();
                    $('#mobile-number-error').empty();
                    $('#password-error').empty();
                    $('#password-confirmation-error').empty();

                    $('#first-name-error').text(data.errors.first_name);
                    $('#last-name-error').text(data.errors.last_name);
                    $('#email-error').text(data.errors.email);
                    $('#mobile-number-error').text(data.errors.mobile_number);
                    $('#password-error').text(data.errors.password);
                    $('#password-confirmation-error').text(data.errors.password_confirmation);

                } else {

                    $('#first-name-error').empty();
                    $('#last-name-error').empty();
                    $('#email-error').empty();
                    $('#mobile-number-error').empty();
                    $('#password-error').empty();
                    $('#password-confirmation-error').empty();

                    $('#registration-success')
                        .html(
                            '<div class="alert alert-success alert-dismissible" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert">' +
                                '<span aria-hidden="true">&times;</span>' +
                                '<span class="sr-only">Close</span></button>' + data.message +
                            '</div>'
                        );
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

    getAdminReservedSeats = function (cinemaId, timeId) {
        dataService.getAdminReservedSeats(cinemaId, timeId)
            .done(function (data) {

                var seatsContent = $('#populate-seats');

                seatsContent.empty();

                var html = "";
                var addColumnCounter = 0;

                if (data.length == 0) {
                    for (var index = 0; index < 50; index++) {
                        addColumnCounter++;

                        html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two'>";
                        html += "<button id='seat-" + (index+1) + "' class='btn-seats btn btn-success btn-block'>" + (index + 1) + "</button>";
                        html += "</div>";

                        if (addColumnCounter % 5 == 0) {
                            if ((index + 1) % 10 == 0) {
//                                html += '';
                            } else {
                                html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two'></div>";
                                html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two'></div>";
                            }
                        }
                    }
                } else {
                    var currentIndexValue = 0;

                    for (var index = 0; index < 50; index++) {
                        if ( data[currentIndexValue] != undefined &&
                            (index+1) == data[currentIndexValue].seat_number) {

                            addColumnCounter++;

                            if (data[currentIndexValue].paid_status == 1) {
                                html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two' data-toggle='tooltip' data-placement='top' title='" + data[currentIndexValue].customer_name + "'>";
                                html += "<button id='seat-" + (index+1) + "' class='btn-seats btn btn-danger btn-block' disabled>" + (index + 1) + "</button>";
                                html += "</div>";
                            } else if (data[currentIndexValue].paid_status == 0){
                                html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two' data-toggle='tooltip' data-placement='top' title='" + data[currentIndexValue].customer_name + "'>";
                                html += "<button id='seat-" + (index+1) + "'" + " class='btn-seats btn btn-warning btn-block'  data-toggle='tooltip' data-placement='top' title='" + data[currentIndexValue].customer_name + "' disabled>" + (index + 1) + "</button>";
                                html += "</div>";
                            }

                            currentIndexValue++;

                            if (addColumnCounter % 5 == 0) {
                                if ((index + 1) % 10 == 0) {
//                                html += '';
                                } else {
                                    html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two'></div>";
                                    html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two'></div>";
                                }
                            }

                        }

                        else {
//                                html += "<div id='seat-number-" + (index+1) + "' class='btn btn-success available-seats'>" + (index+1) + "</div>";
                            html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two'>";
                            html += "<button id='seat-" + (index+1) + "' class='btn-seats btn btn-success btn-block'>" + (index + 1) + "</button>";
                            html += "</div>";

                            addColumnCounter++;

                            if (addColumnCounter % 5 == 0) {
                                if ((index + 1) % 10 == 0) {
//                                html += '';
                                } else {
                                    html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two'></div>";
                                    html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two'></div>";
                                }
                            }
                        }
                    }
                }

                html += "</div></div>";

                seatsContent.html(html);
            })
            .fail(function (jqXHR, textStatus, error) {
                console.log(textStatus);
            });
    };

    // -----------------------
    // Populate Member Seats
    // -----------------------
    getMemberReservedSeats = function (timeId) {
        dataService.getMemberReservedSeats(timeId)
                .done( function(data) {
                    var seatsContent = $('#populate-seats');

                    seatsContent.empty();

                    var html = "";
                    var addColumnCounter = 0;

                    if (data.length == 0) {
                        for (var index = 0; index < 50; index++) {
                            addColumnCounter++;

                            html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two'>";
                            html += "<button id='seat-" + (index+1) + "' class='btn-seats btn btn-success btn-block'>" + (index + 1) + "</button>";
                            html += "</div>";

                            if (addColumnCounter % 5 == 0) {
                                if ((index + 1) % 10 == 0) {
//                                html += '';
                                } else {
                                    html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two'></div>";
                                    html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two'></div>";
                                }
                            }
                        }
                    } else {
                        var currentIndexValue = 0;

                        for (var index = 0; index < 50; index++) {
                            if ( data[currentIndexValue] != undefined &&
                                (index+1) == data[currentIndexValue].seat_number) {

                                addColumnCounter++;

                                if (data[currentIndexValue].paid_status == 1) {
                                    html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two' data-toggle='tooltip' data-placement='top' title='" + data[currentIndexValue].customer_name + "'>";
                                    html += "<button id='seat-" + (index+1) + "' class='btn-seats btn btn-danger btn-block' disabled>" + (index + 1) + "</button>";
                                    html += "</div>";
                                } else {
                                    html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two' data-toggle='tooltip' data-placement='top' title='" + data[currentIndexValue].customer_name + "'>";
                                    html += "<button id='seat-" + (index+1) + "'" + " class='btn-seats btn btn-warning btn-block'  data-toggle='tooltip' data-placement='top' title='" + data[currentIndexValue].customer_name + "' disabled>" + (index + 1) + "</button>";
                                    html += "</div>";
                                }

                                currentIndexValue++;

                                if (addColumnCounter % 5 == 0) {
                                    if ((index + 1) % 10 == 0) {
//                                html += '';
                                    } else {
                                        html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two'></div>";
                                        html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two'></div>";
                                    }
                                }

                            }

                            else {
//                                html += "<div id='seat-number-" + (index+1) + "' class='btn btn-success available-seats'>" + (index+1) + "</div>";
                                html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two'>";
                                html += "<button id='seat-" + (index+1) + "' class='btn-seats btn btn-success btn-block'>" + (index + 1) + "</button>";
                                html += "</div>";

                                addColumnCounter++;

                                if (addColumnCounter % 5 == 0) {
                                    if ((index + 1) % 10 == 0) {
//                                html += '';
                                    } else {
                                        html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two'></div>";
                                        html += "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-1 margin-top-two'></div>";
                                    }
                                }
                            }
                        }
                    }

                    html += "</div></div>";

                    seatsContent.html(html);

                    $('#reserve-seat-paypal').removeClass('hidden');
                    $('#reserve-seat').removeClass('hidden');
            })
            .fail(function (jqXHR, textStatus, error) {
                console.log(textStatus);
            });
    };

    memberPayPalDeposit = function(
            cinemaId, selectedTime, memberName, seatsReserved,
            seatsQuantity, burgerQuantity, friesQuantity, sodaQuantity,
            totalBurgerPrice, totalFriesPrice, totalSodaPrice, totalPrice
        ) {
        dataService.memberPayPalDeposit(
                cinemaId, selectedTime, memberName, seatsReserved,
                seatsQuantity, burgerQuantity, friesQuantity, sodaQuantity,
                totalBurgerPrice, totalFriesPrice, totalSodaPrice, totalPrice
            )
            .done(function (data) {
                console.log('Success sending data...');
                location.href = urlBase + '/member/online-payment/' + data.transactionId + '/' + data.totalPrice;
            })
            .fail(function (jqXHR, textStatus, error) {
                console.log(textStatus);
            });

    };

    memberBankDeposit = function(
        cinemaId, selectedTime, memberName, seatsReserved,
        seatsQuantity, burgerQuantity, friesQuantity, sodaQuantity,
        totalBurgerPrice, totalFriesPrice, totalSodaPrice, totalPrice
        ) {
        dataService.memberBankDeposit(
                cinemaId, selectedTime, memberName, seatsReserved,
                seatsQuantity, burgerQuantity, friesQuantity, sodaQuantity,
                totalBurgerPrice, totalFriesPrice, totalSodaPrice, totalPrice
        )
        .done(function (data) {
            console.log('Success sending data...');
            location.href = urlBase + '/member/receipt-ticket/' + data.transactionId
        })
        .fail(function (jqXHR, textStatus, error) {
            console.log(textStatus);
        });
    };

    adminWalkinSaveReserveSeats = function(
            cinemaId, selectedTime, walkinName, seatsReserved,
            seatsQuantity, burgerQuantity, friesQuantity, sodaQuantity,
            totalBurgerPrice, totalFriesPrice, totalSodaPrice, totalPrice
        ) {
        dataService.adminWalkinSaveReserveSeats(
            cinemaId, selectedTime, walkinName, seatsReserved,
            seatsQuantity, burgerQuantity, friesQuantity, sodaQuantity,
            totalBurgerPrice, totalFriesPrice, totalSodaPrice, totalPrice
        )
        .done(function (data) {
            console.log('Success sending data...');
            location.href = urlBase + '/admin/dashboard/receipt-ticket/' + data.transactionId
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

//    depositAmount = function (amount) {
//        dataService.depositAmount(amount)
//            .done( function (data) {
//                console.log('Done');
//
//                window.location.href = urlBase + '/member/success-page'
//            })
//            .fail(function (jqXHR, textStatus, error) {
//                console.log(textStatus);
//            });
//    };

    saveReservedSeats = function (seatsArray, movieId, timeId) {
        dataService.saveReservedSeats(seatsArray, movieId, timeId)
            .done(function (data) {
                console.log('Success sending data...');
                window.location.reload();
            })
            .fail(function (jqXHR, textStatus, error) {
                console.log(textStatus);
            });
    };

    return {
        init: init
    };
}();

controllerPage.init();
