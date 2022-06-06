import Api from "@/api";

export const roomModule = {
    state: () => ({
        login: "",
        opponent_login: "",
        gamefield: [],
        opponent_gamefield: [],
        score: 0,
        opponent_score: 0,
        turn: null,
    }),
    getters: {
        getGamefield(state) {
            return state.gamefield;
        }
    },
    mutations: {
        setGamefield(state, gamefield) {
            state.gamefield = gamefield;
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