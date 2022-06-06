

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
    mutation: {
        setGameield(state, gamefield) {
            state.gamefield = gamefield;
        }
    },
    actions: {
        
    }
}