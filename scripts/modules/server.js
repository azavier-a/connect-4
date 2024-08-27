const PUB_SERVER = 'https://server.connect-4.xyz';
const DEV_SERVER = 'http://localhost:5055/connect-4-server';

const DEV_MODE = await (async ()=> new Promise((resolve, reject)=> {
    const request = new XMLHttpRequest();
    request.open('GET', '.devMode', true);

    request.onload =()=> (request.status == 200)
                          ? resolve(JSON.parse((request.response).toLowerCase()))
                          : reject(new Error(`Request failed with status ${xhr.status}`));

    request.send(); 
}))();

const SERVER_URL = (DEV_MODE? DEV_SERVER:PUB_SERVER) +'/index.php'; 


function invoke_server(method, data, onload) {
    const request = new XMLHttpRequest();
    
    let URL = SERVER_URL + '?';
    for(const key in data) {
        URL += key +'='+ data[key] + "&";
    }
    URL = URL.substr(0, URL.length - 1);
    
    request.open(method, URL, true);

    request.onload =()=> (request.status == 200)? onload(request):null;

    request.send();
}
export const get_request = (get_data, onload)=> invoke_server('GET', get_data, onload);
export const post_request = (post_data, onload)=> invoke_server('POST', post_data, onload);
export const put_request = (put_data, onload)=> invoke_server('PUT', put_data, onload);