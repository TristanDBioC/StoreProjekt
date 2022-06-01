document.getElementById('uncheck').onclick = function clear() {
    let chck = document.getElementsByName('size[]')
    for(var i = 0; i<chck.length; i++) {
        chck[i].checked = false;
    }

    chck = document.getElementsByName('color[]')
    for(var i = 0; i<chck.length; i++) {
        chck[i].checked = false;
    }
    
    chck = document.getElementsByName('type[]')
    for(var i = 0; i<chck.length; i++) {
        chck[i].checked = false;
    }
}