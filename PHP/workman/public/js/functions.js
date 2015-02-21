(function () {
    var container = {
        comment : 'ul#latest-comments',
        car : '',
        answer :''
    };
    function add(data, target) {
        $(target).append(data);
        
    }
    function remove(target) {
        $(target).detach();
    }
    function update(data,target) {  
        $(target).replaceWith(data);
        $(target).slideDown( "slow" );
        
    }
    function all(data, target) {

    }
    
    function fail() {
        console.log('failed');
    }
    var comment = {
        prepare:function() {
            event.preventDefault();
            event.stopImmediatePropagation();
        },
        create: function () {
            event.preventDefault();
            event.stopImmediatePropagation();
            
            console.log("creating");
        },
        update: function (event) {
            event.preventDefault();
            event.stopImmediatePropagation();
            var $form = $(this);
            var url = $form[0]['href'];
            
            $(container.comment).slideUp( "slow" )
            var posting = $.get(url);
            posting.done(function (data){
                update(data,container.comment)
            })
                    .fail(fail);
        }
    };



    $(document).ready(function () {
        $("section#comments a.discussion").on('click', comment.update);
        $("section#comments a#new").on('click', comment.create);
        $("section#comments a#all").on('click', comment.all);
    });

    $('section#cars a#new').on('click', function (event) {
        event.preventDefault();
        event.stopImmediatePropagation();
        var $form = $(this);
        var url = $form[0]['href'];
        console.log(url);
        var posting = $.get(url);
        posting.done(function (data) {
            $('section#cars div').slideUp(1000);
            $('section#cars').append(data);
            console.log('success');
        })
                .fail(function () {
                });
    });
    $('section#cars a#cancel').on('click', function (event) {
        event.preventDefault();
        event.stopImmediatePropagation();
        $('section#cars div').slideDown(1000);
    });

}());