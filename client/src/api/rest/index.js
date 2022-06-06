import FieldsApi from "@/api/rest/fields";

export default class GlobalApi {
    constructor(client) {
        this.client = client;
        this.fields = new FieldsApi(client);
    }
}