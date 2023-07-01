import {ref} from "vue";
import axios from "axios";

 export default function useUserServices() {
    const users = ref([]);
    const dataTable = ref([]);

    const getUsers = async () => {
        const response = await axios.get("/api/users");
        users.value = response.data;
    };

    const getDataTable = async () => {
        const response = await axios.get("/api/relationship");
        dataTable.value = response.data;
    };

    return {
        users,
        getUsers,
        dataTable,
        getDataTable
    };
}