export default class RoomsApi {
    constructor(client) {
        this.client = client;
    }

    createRoom = async (login) => await this.client.post('/createroom', {login})
}