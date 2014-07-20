
$('#sender').submit(function(e){
    e.preventDefault();

    $('#ind').children('span').toggle();
    $('#ind').children('img').toggle();

    var img = $('<img>').attr('src', '/assets/img/ajax-loader2.gif');

    img.addClass('loader');

    $('.log').prepend(img);

    // send API request
    $.post('/run', JSON.stringify($(this).serializeArray()), function (data) {

        var row = $('<div>').addClass('entry');

        row.hide();

        row.html('<pre>' + data.result + '</pre>');

        $('.log').prepend(row);

        img.remove();
        row.slideDown(300);

        row.find('a').click(function(ee){

            ee.preventDefault();

            $('input[name="command"]').val($(this).attr('rel'));

            $('input[name="command"]').parent('form').submit();
        });

        $('input[name="command"]').val('');

        $('input[name="command"]').focus();

        $('#ind').children('img').toggle();
        $('#ind').children('span').toggle();

    }, 'json').fail(function () {
        $('#ind').children('img').toggle();

        $('#ind').children('span').toggle();

        img.remove();

        alert('Problem connecting to API');
    });

});

var commandsList = new Bloodhound({
    name: 'commandList',
    prefetch: {
        url: '/list/typeahead',
        ttl: 0
    },
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('val'),
    queryTokenizer: Bloodhound.tokenizers.whitespace
});

commandsList.initialize();

$('#command').typeahead({
        minLength: 1,
        highlight: true,
        hint: true
    },
    {
        name: 'commandList',
        displayKey: 'val',
        source: commandsList.ttAdapter(),
        templates: {
            suggestion: Handlebars.compile('<span class="name">{{val}}</span>{{#if desc}} *- {{desc}}{{/if}}')
        }
    });

$('#command').focus();
