$('#sender').submit(function(e){
    e.preventDefault();


    // send API request
    $.post('/run', JSON.stringify($(this).serializeArray()), function (data) {

        var row = $('<div>').addClass('entry');

        row.html('<pre>' + data.result + '</pre>');

        $('.log').prepend(row);
    }, 'json').fail(function () {
        alert('XXX');
    });

});
