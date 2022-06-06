export default class FieldsApi {
    constructor(client) {
        this.client = client;
    }

    getUserGamefield = async (room_id, user_id) => await this.client.get(`/getgamefield?room_id=${room_id}&user_id=${user_id}`)
}