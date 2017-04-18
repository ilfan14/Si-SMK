$(document).ready(function() {
    $(document).on('click', '.panel-heading .removepanel', function(){
        var $this = $(this);
        $this.parents('.panel').hide("slow");
    });
//panel hide
    $('.showhide').attr('title','Hide Panel content');
    $(document).on('click', '.panel-heading .clickable', function(e){
        var $this = $(this);
        if(!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
            $('.showhide').attr('title','Show Panel content');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
            $('.showhide').attr('title','Hide Panel content');
        }
    });
    var elem = document.querySelector('.js-switch2');
    var init = new Switchery(elem, {
        size: 'big',
        color: '#418bca'
    });
    // end of switchery's.

    $.each($('.make-switch'), function() {
        $(this).bootstrapSwitch({
            onText: $(this).data('onText'),
            offText: $(this).data('offText'),
            onColor: $(this).data('onColor'),
            offColor: $(this).data('offColor'),
            size: $(this).data('size'),
            labelText: $(this).data('labelText'),
            state: $(this).data('checked')
        });
    });
    $(function() {
        $("[data-toggle='popover']").popover();
    });


    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    $('.collapse').on('shown.bs.collapse', function() {
        $(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
    }).on('hidden.bs.collapse', function() {
        $(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
    });

});
