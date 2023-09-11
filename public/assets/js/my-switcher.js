// Switchery
var elem = document.querySelector('.js-switch');
var selected = document.querySelector('.status');
var init = new Switchery(elem, { color: '#000000' });
elem.onchange = function() {
    return selected.value = (elem.checked == true) ? '1' : '0';
}