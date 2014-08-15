
var dataService = function () {

    var urlBase = window.location.origin,

    memberLogin = function() {
        return $.ajax({
            url: urlBase + '/member/login',
            type: 'post',
            data: $('#member-login').serialize()
        });
    },

    changePassword = function() {
        return $.ajax({
            url: urlBase + '/member/change-password',
            type: 'post',
            data: $('#change-password-form').serialize()
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

    getAdminReservedSeats = function(cinemaId, timeId) {
        return $.getJSON(urlBase + '/admin/dashboard/get-admin-reserved-seats/' + cinemaId + '/' + timeId);
    },

    getMemberReservedSeats = function(timeId) {
        return $.getJSON(urlBase + '/member/get-member-reserved-seats/' + timeId);
    },

    adminWalkinSaveReserveSeats = function(
            cinemaId, selectedTime, walkinName, seatsReserved,
            seatsQuantity, burgerQuantity, friesQuantity, sodaQuantity,
            totalBurgerPrice, totalFriesPrice, totalSodaPrice, totalPrice
        ) {
        return $.ajax({
            url: urlBase + '/admin/dashboard/reserved-seat',
            data: {
                cinemaId: cinemaId,
                selectedTime: selectedTime,
                walkinName: walkinName,
                seatsReserved: seatsReserved,
                seatsQuantity: seatsQuantity,
                burgerQuantity: burgerQuantity,
                friesQuantity: friesQuantity,
                sodaQuantity: sodaQuantity,
                totalBurgerPrice: totalBurgerPrice,
                totalFriesPrice: totalFriesPrice,
                totalSodaPrice: totalSodaPrice,
                totalPrice: totalPrice
            },
            type: 'POST'
        })
    },

    saveAdminReservedSeats = function(seatsArray, movieId, timeId, customerName) {
        return $.ajax({
            url: urlBase + '/admin/dashboard/reserved-seat',
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

    depositAmount = function (amount) {
        return $.ajax({
            url: urlBase + '/member/deposit-amount',
            data: { amount: amount },
            type: 'POST'
        });
    };


    return {
        memberLogin: memberLogin,
        changePassword: changePassword,
        register: register,
        getMovieId: getMovieId,
        getMovieTimesById: getMovieTimesById,
        getAdminReservedSeats: getAdminReservedSeats,
        getMemberReservedSeats: getMemberReservedSeats,
        adminWalkinSaveReserveSeats: adminWalkinSaveReserveSeats,
        saveAdminReservedSeats: saveAdminReservedSeats,
        saveReservedSeats: saveReservedSeats,
        depositAmount: depositAmount
    };
}();
