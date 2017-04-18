
    $(document).ready(function() {
        $(
            'input#defaultconfig'
        ).maxlength();

        $(
            'input#thresholdconfig'
        ).maxlength({
            threshold: 20

        });
        $(
            'input#moreoptions'
        ).maxlength({
            alwaysShow: true,
            warningClass: "label label-success",
            limitReachedClass: "label label-danger"
        });

        $(
            'input#alloptions'
        ).maxlength({
            alwaysShow: true,
            warningClass: "label label-success",
            limitReachedClass: "label label-danger",
            separator: ' chars out of ',
            preText: 'You typed ',
            postText: ' chars.',
            validate: true
        });
        $(
            'textarea#textarea'
        ).maxlength({
            alwaysShow: true
        });

        $('input#placement')
            .maxlength({
                alwaysShow: true,
                placement: 'top-left'
            });
    });
  $('#card').card({
      container: $('.card-wrapper')
  });

    