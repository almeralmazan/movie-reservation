
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

    getMovieTimesById = function(cinemaId) {
        return $.getJSON(urlBase + '/admin/dashboard/get-movie-times/' + cinemaId);
    },

    getReservedSeats = function(cinemaId, timeId) {
        return $.getJSON(urlBase + '/admin/dashboard/get-reserved-seats/' + cinemaId + '/' + timeId);
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
    },

    deleteMovie = function(movieId) {
        return $.ajax({
            url: urlBase + '/admin/dashboard/delete/movie/' + movieId,
            type: 'DELETE'
        });
    };

    return {
        memberLogin: memberLogin,
        register: register,
        getMovieId: getMovieId,
        getMovieTimesById: getMovieTimesById,
        getReservedSeats: getReservedSeats,
        saveAdminReservedSeats: saveAdminReservedSeats,
        saveReservedSeats: saveReservedSeats,
        deleteMovie: deleteMovie
    };
}();
