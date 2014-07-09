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
$('.btn-seats').on('click', function(){
    $(this).toggleClass('btn-info');
});

// counting seats
$ ( "#reserve-seat" ).on('click', function(){
    // for seats
    var seats = [];
    var total_seats = $(".btn-info").length;
    var price = 75.00;
    // for seats
    $(".container").find(".btn-info").each(function(){ seats.push(this.id); });
    $("#reserving-for-seat").text(seats);
    $("#total-seats").text(total_seats);
    $("#total-seat-price").text(total_seats*price);
    $("#total").text(total_seats*price);
});
// Add-ons burger
$ ("#qty-burger").on('input',function(){
    var qty_burger = $("#qty-burger").val();
    var price_burger = 30.00;
    var total = $("#total").text();
    $("#total-burger-price").text(qty_burger*price_burger);
    $("#total").text(parseInt(total) + parseInt(qty_burger*price_burger));
});
// Add-ons fries
$ ("#qty-fries").on('input',function(){
    var qty_fries = $("#qty-fries").val();
    var price_fries = 25.00;
    var total = $("#total").text();
    $("#total-fries-price").text(qty_fries*price_fries);
    $("#total").text(parseInt(total) + parseInt(qty_fries*price_fries));
});
// Add-ons soda
$ ("#qty-soda").on('input',function(){
    var qty_soda = $("#qty-soda").val();
    var price_soda = 15.00;
    var total = $("#total").text();
    $("#total-soda-price").text(qty_soda*price_soda);
    $("#total").text(parseInt(total) + parseInt(qty_soda*price_soda));
});

// total payments
$ (".sub-total").on('change', function(){
    var tae = $(this).text
    console.log(tae);
});




//Cinema page
$( '#btn-get-movie-1' ).on('click', function(event){
    $(event.target).closest("div").animate({
        opacity: 1
    }, 5000, function(){
        // Animation complete.
    });
});

$( '#btn-get-movie-2' ).on('click', function(){
    var id = $(this).attr("id");
    console.log ( id );
});

$( '#btn-get-movie-3' ).on('click', function(){
    var id = $(this).attr("id");
    console.log ( id );
}); 
