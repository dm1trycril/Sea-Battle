import FieldsApi from "@/api/rest/fields";
import AuthApi from "@/api/rest/auth";

export default class GlobalApi {
    constructor(client) {
        this.client = client;
        this.fields = new FieldsApi(client);
        this.auth = new AuthApi(client);
    }
}