(function($) {

$(document).ready(function() {
    $('#buildings').on('change', function() {
        var selectedBuilding = $(this).val();
        var ajaxurl = 'wp-admin/admin-ajax.php';
        console.log(selectedBuilding)
        // Wywołaj funkcję AJAX, aby pobrać dane dla wybranego budynku
        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                action: 'get_apartments',
                building: selectedBuilding
            },
            success: function(response) {
                $('#txtHint').html(response);
            }
        });
    });
});

})(jQuery);