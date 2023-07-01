import {ref} from "vue";
import axios from "axios";

 export default function useUserServices() {
    const users = ref([]);

    const getUsers = async () => {
        const response = await axios.get("/api/users");
        users.value = response.data;
    };

    return {
        users,
        getUsers,
    };
}
