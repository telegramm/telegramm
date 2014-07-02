$('input[name="command"]').focus();

$('#sender').submit(function(e){
    e.preventDefault();

    // send API request
    $.post('/run', JSON.stringify($(this).serializeArray()), function (data) {

        var row = $('<div>').addClass('entry');

        row.hide();

        row.html('<pre>' + data.result + '</pre>');

        $('.log').prepend(row);

        row.slideDown(300);

        $('input[name="command"]').val('');

        $('input[name="command"]').focus();

    }, 'json').fail(function () {
        alert('XXX');
    });

});
