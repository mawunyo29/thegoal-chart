import {ref} from "vue";
import axios from "axios";

 export default function useUserServices() {
    const users = ref([]);
    const dataTable = ref([]);

    const getUsers = async () => {
        const response = await axios.get("/api/users");
        users.value = response.data;
    };

    const getDataTable = async (model) => {
         await axios.post(`/api/relationship` ,{model: model}).then((response) => {
            dataTable.value = response.data;
            return response;
        }).catch((error) => {
            return error;
        });
       
       
    };

    return {
        users,
        getUsers,
        dataTable,
        getDataTable
    };
}