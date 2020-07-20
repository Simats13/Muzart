$(document).ready(function(){
    $('.modal-trigger').leanModal();

    $(".delete_modo").click(function(){
        var id = $(this).attr("id");

        $.post('ajax/delete_modo.php', {id:id}, function(){
            $("#modo_"+id).hide();
        });


    });

})