$(document).ready(function(){
    $(".opt_delete_account a").click(function(){
        $("#dialog-delete-account").dialog('open');
    });

    $("#dialog-delete-account").dialog({
        autoOpen: false,
        modal: true,
        buttons: [
            {
                text: bender_red.langs.delete,
                click: function() {
                    window.location = bender_red.base_url + '?page=user&action=delete&id=' + bender_red.user.id  + '&secret=' + bender_red.user.secret;
                }
            },
            {
                text: bender_red.langs.cancel,
                click: function() {
                    $(this).dialog("close");
                }
            }
        ]
    });
});