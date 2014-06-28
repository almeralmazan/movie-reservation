
var controllerPage = function() {

    var urlBase = window.location.origin;

    var init = function() {

            var seatsArray = [];

            $('#member-login').on('submit', function(e) {
                e.preventDefault();

                getMemberLoginInputs();
            });

            // Live click from ajax dynamic button
            $(document).on('click', '#populate-seats .available-seats', function() {

                var seatId = $(this).attr('id').replace('seat-number-', '');

                // for testing purposes
                // console.log("seatsArray.length before = " + seatsArray.length);


                if ( $(this).hasClass('process-reservation') ) {
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
                if ( $('#populate-seats').has('div.process-reservation').length ) {
                    $('button#reserve-button, button#admin-reserve-button').prop('disabled', false).addClass('btn-warning');
                } else {
                    $('button#reserve-button, button#admin-reserve-button').prop('disabled', true).removeClass('btn-warning');
                }

                // for testing purposes
                // console.log('After seatsArray: ' + seatsArray);
                // console.log("seatsArray.length after = " + seatsArray.length);
            });

            // Member Check Button
            $('.check-reservation-seats').on('click', function() {
                var timeId = $('#movie-time').val();
                var movieId = $('#movie-id').val();

                getReservedSeats(movieId, timeId);
            });

            // Admin Check Button
            $('.admin-check-reserved-seats').on('click', function() {
                var timeId = $('#movie-time').val();
                var movieId = $('#movie-id').val();

                getAdminReservedSeats(movieId, timeId);
            });

            // Member Reserve Button
            $(document).on('click', '#reserve-button', function() {
                var timeId = $('#movie-time').val();
                var movieId = $('#movie-id').val();

                saveReservedSeats(seatsArray, movieId, timeId);
            });

            // Admin Reserve Button
            $(document).on('click', '#admin-reserve-button', function() {
                var customerName = $('#customer-name').val();
                var timeId = $('#movie-time').val();
                var movieId = $('#movie-id').val();

                saveAdminReservedSeats(seatsArray, movieId, timeId, customerName);
            });
        },

        getMemberLoginInputs = function() {
            dataService.memberLogin()
                .done( function(data) {
                    if ( ! data.success) {
                        $('#error-message').empty();
                        $('#error-message').addClass('alert alert-box error-login').text(data.message);
                    } else {
                        window.location.href = urlBase + '/member';
                    }
                })
                .fail( function(jqXHR, textStatus, error) {
                   console.log(textStatus);
                });
        },

        getMovieId = function(id) {
            dataService.getMovieId(id)
                .done( function(data) {
                    $('h4#movie-name').text(data.name);
                    $('p#p_description').text(data.description);
                    $('.modal-footer').html(
                        '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'
                    );
                })
                .fail( function(jqXHR, textStatus, error) {
                    console.log(textStatus);
                });
        },


        getReservedSeats = function (movieId, timeId) {
            dataService.getReservedSeats(movieId, timeId)
                .done( function(data) {
                    var seatsContent = $('#populate-seats');

                    seatsContent.empty();

                    var html = "<div style='margin-top: 20px;' class='btn-toolbar' role='toolbar'><div class='btn-group'>";

                    if (data.length === 0) {
                        for (var index = 0; index < 50; index++) {
                            html += "<div id='seat-number-" + (index+1) + "' class='btn btn-success available-seats'>" + (index+1) + "</div>";
                        }
                    } else {
                        var currentIndexValue = 0;

                        for (var index = 0; index < 50; index++) {
                            if ( data[currentIndexValue] !== undefined && (index+1) === data[currentIndexValue].seat_number) {
                                html += "<div id='seat-number-" + (index+1) + "' class='btn btn-danger reserved-seats'>"+ (index+1) + "</div>";
                                currentIndexValue++;
                            } else {
                                html += "<div id='seat-number-" + (index+1) + "' class='btn btn-success available-seats'>" + (index+1) + "</div>";
                            }
                        }
                    }

                    html += "</div></div>";

                    html += "<div id='customer-info'> <button class='btn btn-default' id='reserve-button' disabled='disabled'>Reserve</button> </div>";

                    seatsContent.html(html);

                })
                .fail( function(jqXHR, textStatus, error) {
                    console.log(textStatus);
                });
        },

        getAdminReservedSeats = function (movieId, timeId) {
            dataService.getReservedSeats(movieId, timeId)
                .done( function(data) {
                    var seatsContent = $('#populate-seats');

                    seatsContent.empty();

                    var html = "<div style='margin-top: 20px;' class='btn-toolbar' role='toolbar'><div class='btn-group'>";

                    if (data.length === 0) {
                        for (var index = 0; index < 50; index++) {
                            html += "<div id='seat-number-" + (index+1) + "' class='btn btn-success available-seats'>" + (index+1) + "</div>";
                        }
                    } else {
                        var currentIndexValue = 0;

                        for (var index = 0; index < 50; index++) {
                            if ( data[currentIndexValue] !== undefined && (index+1) === data[currentIndexValue].seat_number) {
                                html += "<div id='seat-number-" + (index+1) + "' class='btn btn-danger reserved-seats'>"+ (index+1) + "</div>";
                                currentIndexValue++;
                            } else {
                                html += "<div id='seat-number-" + (index+1) + "' class='btn btn-success available-seats'>" + (index+1) + "</div>";
                            }
                        }
                    }

                    html += "</div></div>";

                    html += "<div><input id='customer-name' type='text' name='customer_name' class='form-control'/></div>";

                    html += "<div id='customer-info'> <button class='btn btn-default' id='admin-reserve-button' disabled='disabled'>Reserve</button> </div>";

                    seatsContent.html(html);

                })
                .fail( function(jqXHR, textStatus, error) {
                    console.log(textStatus);
                });
        },

        saveAdminReservedSeats = function(seatsArray, movieId, timeId, customerName) {
            dataService.saveAdminReservedSeats(seatsArray, movieId, timeId, customerName)
                .done( function(data) {
                    console.log('Success sending data...');
                })
                .fail( function(jqXHR, textStatus, error) {
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
