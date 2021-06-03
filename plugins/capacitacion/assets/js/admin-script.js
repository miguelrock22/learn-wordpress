jQuery(function($){
    function capacitacion_ajax(){
        $(document).ready(function(){
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    'action': 'capaction_ajaxcallback',
                    'foo': 'bar',
                },
                'success': function(res){
                    $("#test-ajax").html(res);
                }
            });
        });
    }
    capacitacion_ajax();
});