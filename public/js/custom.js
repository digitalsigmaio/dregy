/**
 * Created by Manson on 5/8/2018.
 */

// Material Select Initialization
$(document).ready(function () {
    new WOW().init();

    // Tooltips Initialization
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    $('.mdb-select').material_select();

    // SideNav Initialization
    $(".button-collapse").sideNav();

    $('.nav-item').hover(function () {
        $(this).toggleClass('active');
    });

});
