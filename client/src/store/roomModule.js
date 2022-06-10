import Api from "@/api";

export const roomModule = {
    state: () => ({
        login: "",
        opponent_login: "",
        gamefield: 
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
             ],
        opponent_gamefield: 
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            ],
        score: 0,
        opponent_score: 0,
        turn: null,
        gamestatus: "preparing"
    }),
    getters: {
        getGamefield(state) {
            return state.gamefield;
        },
        getGamestatus(state) {
            return state.gamestatus;
        }
    },
    mutations: {
        setGamefield(state, gamefield) {
            state.gamefield = gamefield;
        },
        setGamestatus(state, gamestatus) {
            state.gamestatus = gamestatus;
        },
        setOwnCell(state, {new_state, index}) {
            let new_gamefield = [...state.gamefield];
            new_gamefield[index] = new_state;
            state.gamefield = new_gamefield;
        }
    },
    actions: {
        async loadUserGamefield({commit}) {
            try {
                const fieldData = await Api.fields.getUserGamefield(1, 1);
                commit('setGamefield', fieldData.data);
            } catch (error) {
                console.error(error);
            }
        }
    },
    namespaced: true
}