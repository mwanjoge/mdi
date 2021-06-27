$(document).ready(function(){
    $('.disease-check').click(function(){
        let id = $(this).data('id');
        //console.log('clicked '+id)
        $.ajax({
            url: '/results/toggle/'+ id,
            type: "get",
            data: {},
            success: function (data) {
                $("#report-results"+id).show();
                $("#report-desc"+id).show();
            }
        });
    });
    $('.checkup-status').on('change',function(){
        let id = $(this).data('id');
        let status = $(this).val();
        console.log('clicked '+status)
        $.ajax({
            url: '/checkup/status/'+ id +'/'+status,
            type: "get",
            data: {},
            success: function (data) {
                 console.log(data);
                //let placeholder = $('#'+id).find("#invoicePlaceholder" + invoice_id);
                //invoicePlaceholder.html(data).fadeIn();
                //select general

                //scrollToId('.modal-body', invoicePlaceholder);

            }
        });
    });
    $('.report-results').on('keyup',function(){
        let id = $(this).data('id');
        let results = $(this).val();
        console.log('typed '+results)
        $.ajax({
            url: '/report/results/'+ id +'/'+results,
            type: "get",
            data: {},
            success: function (data) {
                 console.log(data);
                //let placeholder = $('#'+id).find("#invoicePlaceholder" + invoice_id);
                //invoicePlaceholder.html(data).fadeIn();
                //select general

                //scrollToId('.modal-body', invoicePlaceholder);

            }
        });
    });
});
n
