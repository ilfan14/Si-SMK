function testAnim(x, str) {
    $('#animationSandbox' + str).removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
        $(this).removeClass();
    });
};

function testAnim1(str) {
    var x = document.getElementById('s' + str).value;

    $('#animationSandbox' + str).removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
        $(this).removeClass();
    });
};