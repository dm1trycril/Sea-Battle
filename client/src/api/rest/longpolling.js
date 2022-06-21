import Api from "@/api";
// import store from "@/store";

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

export async function joinPolling(room_id) {
    while(true) //eslint-disable-line no-constant-condition
    {
        const response = await Api.rooms.isOpponentJoin(room_id);
        const message = response.data.message;
        if(message === "user_joined")
        {
            // store.commit("roomModule/setGamestatus", "preparing");
            return true;
        }
        else if(message === "should_wait"){
            await sleep(1100);
        }
    }
}

export async function readyPolling(room_id, login) {
    console.log("start");
    while(true) //eslint-disable-line no-constant-condition
    {
        const response = await Api.rooms.isOpponentReady(room_id, login);
        console.log(response);
        const message = response.data.message;
        if(message === "should_wait") {
            console.log("sleep");
            await sleep(1100);
        }
        else if(message === "start_game") {
            console.log("finish");
            return true;
        }
    }
}

// export async function 