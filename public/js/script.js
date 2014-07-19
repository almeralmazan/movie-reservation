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
 
