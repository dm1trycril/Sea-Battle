import axios from "axios";
import GlobalApi from "@/api/rest";

const baseURL = "/api";

const headers = {
    "Content-Type": "appilcation/json",
    Accept: "application/json",
    "Accept-Language": "ru"
};

const axiosInstance = axios.create({
    baseURL,
    headers,
});

const Api = new GlobalApi(axiosInstance);

export default Api;