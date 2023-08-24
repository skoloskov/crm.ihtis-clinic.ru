jQuery(function($){
    $('#reception_type_konsultacziya').click(function (){
        $('#reception_type_konsultacziya_text').addClass('reception_type_tab_active');
        $('#reception_type_manipulyacziya_text').removeClass('reception_type_tab_active');
    });
    $('#reception_type_manipulyacziya').click(function (){
        $('#reception_type_manipulyacziya_text').addClass('reception_type_tab_active');
        $('#reception_type_konsultacziya_text').removeClass('reception_type_tab_active');
    });
});

jQuery(function($){
    $('#submit_visit_button').click(function(){
        var new_visit = $('#submit_pacient_visit');
        $.ajax({
            url: ajax_action_object.url,
            type: 'POST',
            data: new_visit.serialize(),
            beforeSend: function( xhr ) {
                $('#submit_visit_button').text('Добавляем...');
            },
            success: function (data) {
                $('#submit_visit_button').text('Добавить запись');
                $('#submit_pacient_visit')[0].reset();
                alert( 'Запись успешно добавлена' );
            }
        });
        return false;
    });
});


