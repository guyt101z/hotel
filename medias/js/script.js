function setCookie(name,value) {
    var Days = 30; 
    var exp  = new Date(); 
    exp.setTime(exp.getTime() + Days*24*60*60*1000);
    document.cookie = name + "="+ escape(value) +";expires="+ exp.toGMTString() + ";path=/";
}

