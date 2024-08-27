import { get_request } from './modules/server.js';


const responseElement = document.getElementById('press-count');
function populateResponse(request) {
    responseElement.innerHTML = request.response;
}


function press_count_update_loop() {
    get_request({
        action: "get_press_count"
        
    }, populateResponse);
 
    setTimeout(press_count_update_loop, 500);
}
press_count_update_loop();


function inc_press_count() {
    get_request({
        action: "inc_press_count"
        
    }, populateResponse);
}
document.getElementById("the-button").onmousedown = inc_press_count;