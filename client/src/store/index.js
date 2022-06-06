import { createStore } from "vuex";
import { roomModule } from "@/store/roomModule";

export default createStore({
    modules: {
        room: roomModule
    }
});