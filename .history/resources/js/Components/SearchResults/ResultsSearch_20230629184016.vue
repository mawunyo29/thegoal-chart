<script setup >
import {ref , computed} from 'vue';
import Tables from '@/Components/Tables/Tables.vue';
import TableDataSet from '@/Components/Tables/TableDataSet.vue';
import TableHead from '@/Components/Tables/TableHead.vue';
import LiList from '@/Components/ListsData/LiList.vue';
import UlList from '@/Components/ListsData/UlList.vue';

const props = defineProps({
    data: {
        type: Array,
        required: true,
    },
    displayStyle: {
        type: String,
       default: 'table',
    },
});
</script>
<template>
    <div>
       <template v-if="displayStyle === 'table'">
            <Tables>
                <TableHead >
                    <template #head>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </template>
                </TableHead>
               <tr>
                    <td>1</td>
                    <td><img src="https://via.placeholder.com/150" alt="image" class="img-fluid"/></td>
                    <td>Product 1</td>
                    <td>100</td>
                    <td>Category 1</td>
                    <td>Brand 1</td>
                    <td>10</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                    </td>
               </tr>
               <tr>
                <TableDataSet > </TableDataSet>
               </tr>
               
            </Tables>
         </template>
            <template v-else-if="displayStyle === 'list'">
                <UlList >
                    <LiList v-for="item in data" :key="item.id" :data="item"/>
                </UlList>
            </template>
    </div>
   
</template>