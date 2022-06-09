const allowedStatuses = new Set([400]);

function validateStatus(s) {
    return s >= 200 && s < 400 || allowedStatuses.has(s);
}

export default class AuthApi {
    constructor(client) {
        this.client = client;
    }

    registerUser = async (login, password) => await this.client.post('/register', {login, password}, {validateStatus})
    loginUser = async (login, password) => await this.client.post('/login', {login, password}, {validateStatus})
}