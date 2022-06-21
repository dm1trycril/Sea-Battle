export default class RoomsApi {
    constructor(client) {
        this.client = client;
    }

    createRoom = async (login) => await this.client.post('/room/create', {login})

    userReady = async (room_id, login, gamefield) => await this.client.post('/room/ready', {room_id, login, gamefield})

    userJoin = async (room_id, login) => await this.client.post('/room/join', {room_id, login})

    isOpponentJoin = async (room_id) => await this.client.post('/room/is_opponent_join', {room_id})
    isOpponentReady = async (room_id, login) => await this.client.post('/room/is_opponent_ready',{room_id, login})
    isOpponentShot = async (room_id, login) => await this.client.post('/room/is_opponent_shot', {room_id, login})
}
