
     $(document).ready(function() {
         $('.editable').editable({
         type: 'text',
         name: 'username',
         url: '/post',
         title: 'Edit username',

     });

    $('#status').editable({
        prepend: "not selected",
        source: [
            {value: 1, text: 'Activated'},
            {value: 2, text: 'Pending'},
            {value: 3, text: 'Deleted'}
        ],
        display: function(value, sourceData) {
             var colors = {1: "text-success", 2: "text-warning", 3: "text-danger"},
                 elem = $.grep(sourceData, function(o){return o.value == value;});
                 
             if(elem.length) {
                 $(this).text(elem[0].text).removeClass('text-success text-warning text-danger');     
                 $(this).text(elem[0].text).addClass(colors[value]); 
             }
        }   
    });     

     //ajax emulation
     $.mockjax({
         url: '/post',
         responseTime: 200
        
     });


});