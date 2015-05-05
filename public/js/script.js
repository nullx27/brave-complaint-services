var brave_complaint;

brave_complaint = {
    form_error: false,
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

        $('[data-toggle="popover"]').popover()

        //ajax calls
        $('.update-status').on('click', this.update_status_ajax);
        $('.submit-btn-link').on('click', this.update_submit_button);
        $('.submit-btn').on('click', this.submit_form);
        $('.complaint_form').on('submit', this.required_check);
        $('.mark-important').on('click', this.mark_important);

    },

    _get_complaint_id: function(){
        var url = window.location.href.split('/');
        return url[url.length -1];
    },

    mark_important: function(){

        var element = $(this);

        $.ajax({
            type: "POST",
            url: '/complaint/important',
            data: {
                id: brave_complaint._get_complaint_id()
            }
        })
        .success(function(data){
                $.jGrowl('Updated Importantce!', {position:'center'});
                if(element.hasClass('active')) {
                    element.removeClass('active');
                } else {
                    element.addClass('active');
                }
            });

        setTimeout(function(){
            window.location.reload();
        }, 2000);

        return false;
    },


    update_status_ajax: function(){
        var element = $(this);

        $.ajax({
            type: "POST",
            url: '/complaint/update',
            data: {
                id: brave_complaint._get_complaint_id(),
                status: $(this).attr('name')
            }
        })
            .error(function(data){
                $('#status-button').text("Error");
                $.jGrowl('Something has gone wrong!', {position:'center'});
            })
            .success(function(data){
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
        var submit = $('.submit-btn');
        submit.text('Submit as ' + $(this).text());
        $('.complaint_submitted').val($(this).attr('data-type'));
        submit.dropdown("toggle");

        //Show HR investigation notice
        if($(this).text().trim() == 'Anonymous'){
            $("<div>").addClass('alert alert-warning').text("If you're submitting as anonymous HR can only take notice but not investigate any further!")
                .insertAfter($('label[for="complaint_investigate"]'));
        } else {

        }

        return false;
    },

    submit_form: function(){
        $('.complaint_form').submit();
    },

    required_check: function(){
        //because we are submitting the form via js we need to redo the frontend required check

        var error = false;
        $('[required]').each(function () {
            if($(this).val() == ''){
                $(this).parent('.form-group').addClass('has-error');
                error = true;
            }
        });

        if(error){
            if(!brave_complaint.form_error){
                $('<div>').addClass('alert alert-danger').text('Please fill out all required forms!')
                    .insertAfter($('.jumbotron'));
            }

            brave_complaint.form_error = error;

            $("html, body").animate({ scrollTop: 0 }, "fast");
            return false;
        }
    }
};

jQuery( 'document' ).ready(function(){
    brave_complaint.init();
});