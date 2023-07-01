<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Header from '@/Components/Header.vue';
import TabNavigator from '@/Components/TabNavigator.vue';
import Card from '@/Components/Card.vue';
import RoundedButton from '@/Components/RoundedButton.vue';
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
const image = '';

</script>

<template>
    <Head title="Welcome" />
    <Header>
        <template #links>
            <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Dashboard</Link>

                <template v-else>
                    <Link :href="route('login')"
                        class="btn-green font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    Log in</Link>

                    <Link v-if="canRegister" :href="route('register')"
                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    Register</Link>
                </template>
            </div>
        </template>
    </Header>
    <section class="flec flex-col">
        <h2 class="text-center">Card</h2>
        <div class="relative">
            <div class=" p-8 md:flex md:space-x-2 space-y-2 md:space-y-0">
                <Card title="new Card" class="md:h-72 md:w-72 w-full" />
                <Card title="new Card" class="md:h-64 md:w-64 w-full" />
                <Card title="new Card 3" class="md:h-full md:w-40 ring ring-green-400 text-xs overflow-hidden w-full">
                    <template #default>
                        <div>
                            <p class="p-0.5 py-1"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt dolores
                                placeat eveniet laboriosam eum repudiandae nam illum autem. Deleniti placeat, inventore sint
                                officia ipsam earum aliquam tenetur rem. Pariatur, optio?</p>
                        </div>
                    </template>
                    <template #footer>
                        <div class=" p-0.5 flex justify-end bottom-0">
                            <RoundedButton class="shadow-sm z-30">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </RoundedButton>
                        </div>
                    </template>

                </Card>
                <Card title="new Card ring blue" class="md:h-full md:w-40 ring ring-blue-400 text-xs overflow-hidden w-full " titleClasses="text-base first-line:uppercase first-line:tracking-widest">
                    <template #default>
                        <div>
                            <p class="p-0.5 py-1"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt dolores
                                placeat eveniet laboriosam eum repudiandae nam illum autem. Deleniti placeat, inventore sint
                                officia ipsam earum aliquam tenetur rem. Pariatur, optio?</p>
                        </div>
                    </template>
                    <template #footer>
                        <div class=" p-0.5 flex justify-end bottom-0">
                            <RoundedButton class="shadow-sm z-30 bg-blue-400 text-white">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </RoundedButton>
                        </div>
                    </template>

                </Card>
                <Card title="new Card" class="md:h-64 md:w-64 w-full" />
                <Card title="new Card" class="md:h-64 md:w-24 w-full text-xs text-center" />
            </div>

        </div>
    </section>

    <div class="relative flex justify-center left-0 w-full pt-8 ">
        <div class="mt-5 w-full fixed bottom-0 ">
            <tab-navigator />
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
