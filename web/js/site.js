$(function() {
    var $collectionHolder;

    $collectionHolder = $('.contacts');

    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $(document).on('click', '.btn-add', function (e) {
        e.preventDefault();

        // Get the data-prototype explained earlier
        var prototype = $collectionHolder.data('prototype');

        // get the new index
        var index = $collectionHolder.data('index');

        // Replace '__name__' in the prototype's HTML to
        // instead be a number based on how many items we have
        var newForm = prototype.replace(/__name__/g, index);

        // increase the index with one for the next item
        $collectionHolder.data('index', index + 1);

        var controlForm = $('.controls form .contacts:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(newForm).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');

    }).on('click', '.btn-remove', function (e) {
        $(this).parents('.entry:first').remove();

        e.preventDefault();
        return false;
    });


});