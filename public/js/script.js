var brave_comlaint;

brave_comlaint = {

    init: function(){

        $('#complaints_overview').tablecloth({
            theme: "default",
            bordered: false,
            condensed: true,
            striped: true,
            sortable: true,
            clean: true,
            cleanElements: "th td"
        });

        //ajax calls
        $('.update-status').on('click', this.update_status_ajax);
        $('.submit-btn-link').on('click', this.update_submit_button);
        $('.submit-btn').on('click', this.submit_form);

    },

    _get_complaint_id: function(){
        var url = window.location.href.split('/');
        return url[url.length -1];
    },


    update_status_ajax: function(){
        var element = $(this);

        $.ajax({
            type: "POST",
            url: '/complaint/update',
            data: {
                id: brave_comlaint._get_complaint_id(),
                status: $(this).attr('name')
            }
        })
            .error(function(data){
                $('#status-button').text("Error");
                $.jGrowl('Something has gone wrong!', {position:'center'});
            })
            .success(function(data){
                console.log(data);
                $.jGrowl('Updated Status!', {position:'center'});

                var buttontext;
                switch(element.attr('name')){
                    case 'new':
                        buttontext = "New";
                        break;
                    case 'inprogress':
                        buttontext = "In Progress";
                        break;
                    case 'closed':
                        buttontext = "Closed";
                        break;
                }

                $('#status-button').text(buttontext);
            });

        setTimeout(function(){
            window.location.reload();
        }, 2000);

        return false;
    },

    update_submit_button: function(){
        $('.submit-btn').text('Submit as ' + $(this).text());
        $('.complaint_submitted').val($(this).attr('data-type'));
        $('.submit-btn').dropdown("toggle");

        return false;
    },

    submit_form: function(){
        $('.complaint_form').submit();
    }
    
}

jQuery( 'document' ).ready(function(){
    brave_comlaint.init();
});