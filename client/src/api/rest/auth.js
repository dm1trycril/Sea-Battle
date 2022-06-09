export default class AuthApi {
    constructor(client) {
        this.client = client;
    }

    registerUser = async (login, password) => await this.client.post('/register', {login, password})
    loginUser = async (login, password) => await this.client.post('/login', {login, password})
}