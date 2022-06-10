import FieldsApi from "@/api/rest/fields";
import AuthApi from "@/api/rest/auth";
import RoomsApi from "@/api/rest/rooms";

export default class GlobalApi {
    constructor(client) {
        this.client = client;
        this.fields = new FieldsApi(client);
        this.auth = new AuthApi(client);
        this.rooms = new RoomsApi(client);
    }
}