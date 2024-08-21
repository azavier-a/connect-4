const the_button = document.getElementById("the-button");
the_button.onmousedown = inc_press_count;

function get_press_count() {
    const request = new XMLHttpRequest();

    request.onload = () => populateResponse(request.response);

    request.open('GET', "http://localhost/connect-4-server/index.php?action=get_press_count");
    request.send();
}
window.onload = get_press_count;


function inc_press_count() {
    const request = new XMLHttpRequest();

    request.onload = () => set_press_count(parseInt(request.response) + 1);

    request.open('GET', "http://localhost/connect-4-server/index.php?action=get_press_count");
    request.send();
}
function set_press_count(value) {
    const request = new XMLHttpRequest();

    request.onload = () => populateResponse(request.response);

    request.open('GET', "http://localhost/connect-4-server/index.php?action=set_press_count&value="+value);
    request.send();
}


function populateResponse(response) {
    const responseElement = document.getElementById('press-count');
    
    responseElement.innerHTML = response;
}