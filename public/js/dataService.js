
var dataService = function () {

    var urlBase = window.location.origin,

    memberLogin = function() {
        return $.ajax({
            url: urlBase + '/member/login',
            type: 'post',
            data: $('#member-login').serialize()
        });
    },

    register = function() {
        return $.ajax({
            url: urlBase + '/member/register',
            type: 'post',
            data: $('#registration-form').serialize()
        });
    },

    getMovieId = function(id) {
        return $.getJSON(urlBase + '/movie/' + id);
    },

    getReservedSeats = function(movieId, timeId) {
        return $.getJSON(urlBase + '/member/movie/' + movieId + '/' + timeId);
    },

    saveAdminReservedSeats = function(seatsArray, movieId, timeId, customerName) {
        return $.ajax({
            url: urlBase + '/admin/save-reserved-seats',
            data: {
                adminReservedSeats: seatsArray,
                movieId: movieId,
                timeId: timeId,
                customerName: customerName
            },
            type: 'POST'
        });
    },

    saveReservedSeats = function(seatsArray, movieId, timeId) {
        return $.ajax({
            url: urlBase + '/member/save-reserved-seats',
            data: { reservedSeats: seatsArray, movieId: movieId, timeId: timeId },
            type: 'POST'
        });
    }

    return {
        memberLogin: memberLogin,
        register: register,
        getMovieId: getMovieId,
        getReservedSeats: getReservedSeats,
        saveAdminReservedSeats: saveAdminReservedSeats,
        saveReservedSeats: saveReservedSeats
    };
}();
