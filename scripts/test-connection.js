
const DEV_MODE = false;


const DEV_SERVER = 'http://localhost:5055';
const PUB_SERVER = 'https://connect-4.xyz';



const SERVER_URL = (DEV_MODE? DEV_SERVER:PUB_SERVER) +'/connect-4-server/index.php'; 

const the_button = document.getElementById("the-button");
the_button.onmousedown = inc_press_count;

function get_press_count() {
    const request = new XMLHttpRequest();

    request.onload = () => populateResponse(request.response);

    request.open('GET', SERVER_URL+ "?action=get_press_count");
    request.send();

    setTimeout(get_press_count, 500);
}
window.onload = get_press_count;


function inc_press_count() {
    const request = new XMLHttpRequest();

    request.onload = () => set_press_count(parseInt(request.response) + 1);

    request.open('GET', SERVER_URL+ "?action=get_press_count");
    request.send();
}
function set_press_count(value) {
    const request = new XMLHttpRequest();

    request.onload = () => populateResponse(request.response);

    request.open('GET', SERVER_URL+ "?action=set_press_count&value="+value);
    request.send();
}


function populateResponse(response) {
    const responseElement = document.getElementById('press-count');
    
    responseElement.innerHTML = response;
}