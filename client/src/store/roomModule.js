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
        getLogin(state) {
            return state.login;
        },
        getOpponentLogin(state) {
            return state.opponent_login;
        },
        getGamefield(state) {
            return state.gamefield;
        },
        getOpponentGamefield(state) {
            return state.opponent_gamefield;
        },
        getGamestatus(state) {
            return state.gamestatus;
        },

        isPreparing(state) {
            return state.gamestatus === "preparing";
        }
    },
    mutations: {
        loadLogin(state) {
            state.login = localStorage.getItem('login');
        },
        setGamefield(state, gamefield) {
            state.gamefield = gamefield;
        },
        setGamestatus(state, gamestatus) {
            state.gamestatus = gamestatus;
        },
        setOwnCell(state, { new_state, index }) {
            if (state.gamestatus != "preparing") {
                return;
            }
            let new_gamefield = [...state.gamefield];
            new_gamefield[index] = new_state;
            state.gamefield = new_gamefield;
        },
        hitOpponentCell(state, { new_state, index }) {
            if (state.gamestatus != "game") {
                return;
            }
            let new_gamefield = [...state.opponent_gamefield];
            new_gamefield[index] = new_state;
            state.opponent_gamefield = new_gamefield;
        }
    },
    actions: {
        isLogged({commit}) {
            let login = localStorage.getItem('login');
            if (login === null) {
                return false;
            }
            commit('loadLogin');
            return true;
        }
    },
    namespaced: true
}