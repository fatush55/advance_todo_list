document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
});

$(document).ready(function(){
    $('.tooltipped').tooltip();
});

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    // var instances = M.Dropdown.init(elems, options);
});

// Or with jQuery
$('.dropdown-trigger').dropdown();


$(() =>{
    $('.alert').show(1000);

    setTimeout(()=>{
        $('.alert').hide(1000);
    },5000);

    $('#closed-btn').click(function () {
        $('.alert').hide(1000);
    });

    //toggle status item to do list
    $('body').on('click', '.status_checkbox', function () {
        const id = $(this).data('id');

        $.post('/update-status', { 'id': id}, function () {
            $(location).attr('href', '/');
        });
    });

    //sort arrow to do list
    $('body').on('click', '.arrow-sort', function ( ) {
        const action = $(this).data('action');
        $.post('/arrow-sort', { 'action': action}, function () {
            $(location).attr('href', '/');
        });
    });

});