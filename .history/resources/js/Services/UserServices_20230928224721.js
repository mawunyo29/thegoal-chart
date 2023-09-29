import {ref} from "vue";
import axios from "axios";

 export default function useUserServices() {
    const users = ref([]);
    const dataTable = ref([]);
    const complexDataTable = ref([]);

    const getUsers = async () => {
        const response = await axios.get("/api/users");
        users.value = response.data;
    };

    const getPaginateUsers = async (page) => {
        const response = await axios({
            method: "GET",
            url: `/api/paginate/users?cursor=${page}`,
            contentType: "application/json",
            data: {
                nextCursor: page
            }
        });
        users.value = response.data;
        console.log(users.value);
        return response;
    }

    const getDataTable = async (model) => {
         await axios.post(`/api/relationship` ,{model: model}).then((response) => {
            dataTable.value = response.data;
            return response;
        }).catch((error) => {
            return error;
        }); 
    };

    const getComplexDataTable = async (model , search) => {
        await axios.post(`/api/complex-data` ,{model: model, search: search}).then((response) => {
              complexDataTable.value = response.data;
                return response;
            }).catch((error) => {
                return error;
            });
    };


    return {
        users,
        complexDataTable,
        getComplexDataTable,
        getUsers,
        dataTable,
        getDataTable,
        getPaginateUsers
    };
}
