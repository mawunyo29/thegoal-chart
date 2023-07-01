<template>
    <table>
        <thead>
            <tr>
                <th v-for="heading in headings" :key="heading">
                    {{ heading }}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in filteredData" :key="item.id">
                <td v-for="heading in headings" :key="heading">
                    {{ item[heading] }}
                </td>
            </tr>
        </tbody>
    </table>
   
</template>
<script>
    export default {
        props: {
            data: {
                required: true,
                type: Array
            },
            headings: {
                required: true,
                type: Array
            },
            filterKey: {
                type: String,
                default: ''
            }
        },
        computed: {
            filteredData() {
                return this.data.filter(item => {
                    return Object.keys(item).some(key => {
                        return String(item[key]).toLowerCase().includes(this.filterKey.toLowerCase())
                    })
                })
            }
        }
    }
</script>