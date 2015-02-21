(function () {
    $("a.discussion").on('click', function (event) {
        event.preventDefault();
        event.stopImmediatePropagation(); 
        var $form = $(this);
        var url = $form[0]['href'];
        console.log(url);
        var posting = $.get(url);
        posting.done(function (data) {
                    alert("successs");
                    
                    $('#latest').replaceWith(data);
                    
                    
                })
                .fail(function () {
                    alert("error");
                })
                .always(function () {
                    alert("finished");
                });             
        
    });



}());