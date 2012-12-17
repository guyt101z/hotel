    hoverMenu();
    activeMenu();
    $('#widge ul li:last-child').css('margin-right', '0');
    $('#text_container .contacts_block > ul.toggle > li:nth-child(odd)').css({
        "font-family": "HelveticaNeueBold",
        "font-size": "12px",
        "float": "left",
        "list-style": "none",
        "width": "30%"
    });

function hoverMenu() {
    hoverMenuHelper(1, 'rgb(55,147,26)');
    hoverMenuHelper(2, 'rgb(249,210,6)');
    hoverMenuHelper(3, 'rgb(0,43,148)');
    hoverMenuHelper(4, 'rgb(92,221,255)');
    hoverMenuHelper(5, 'rgb(150,191,13)');
    hoverMenuHelper(6, 'rgb(139,139,137)');
    hoverMenuHelper(7, 'rgb(255,125,0)');
}

function hoverMenuHelper(nth_child, rgb) {
    $('.navigation > li:nth-child('+ nth_child + '):not(.active) > a').hover(function() {
        $(this).css('border-bottom', '6px solid ' + rgb);
    }, function() {
        $(this).css('border-bottom', "");});
}

function activeMenu() {
    $('.navigation > li:not(.active) > ul').css('display', 'none');
    $('.navigation > li:nth-child(1).active > a').css('border-bottom', '6px solid rgb(55,147,26)');
    $('.navigation > li:nth-child(2).active > a').css('border-bottom', '6px solid rgb(249,210,6)');
    $('.navigation > li:nth-child(3).active > a').css('border-bottom', '6px solid rgb(0,43,148)');
    $('.navigation > li:nth-child(4).active > a').css('border-bottom', '6px solid rgb(92,221,255)');
    $('.navigation > li:nth-child(5).active > a').css('border-bottom', '6px solid rgb(150,191,13)');
    $('.navigation > li:nth-child(6).active > a').css('border-bottom', '6px solid rgb(139,139,137)');
    $('.navigation > li:nth-child(7).active > a').css('border-bottom', '6px solid rgb(255,125,0)');
}

