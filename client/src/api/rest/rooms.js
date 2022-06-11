export default class RoomsApi {
    constructor(client) {
        this.client = client;
    }

    createRoom = async (login) => await this.client.post('/room/create', {login})

    userReady = async (room_id, login, gamefield) => await this.client.post('/room/ready', {room_id, login, gamefield})
}