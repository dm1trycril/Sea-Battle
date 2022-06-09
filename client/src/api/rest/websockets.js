import Pusher from "pusher-js";

export default class WebSocketsApi {
    getPusher = () => {
        return new Pusher('b12b887baea031c69c0d', {
            cluster: 'eu'
          });
    }
}

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;