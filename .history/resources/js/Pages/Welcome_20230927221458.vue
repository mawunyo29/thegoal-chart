<script setup>
import TabNavigator from '@/Components/TabNavigator.vue';
import Card from '@/Components/Card.vue';
import RoundedButton from '@/Components/RoundedButton.vue';

import Search from '@/Components/Search.vue';
import CreateForm from '@/Components/Forms/CreateForm.vue';

</script>

<template>
    <BaseLayout>
        <section class="flex flex-col py-8">
        <h2 class="text-center">Card</h2>
        <div class="relative">
            <div class="p-8 space-y-2  md:flex md:space-x-2 md:space-y-0 md:flex-wrap">
                <Card title="new Card" class="w-full md:h-72 md:w-72" />
                <Card title="new Card" class="w-full md:h-64 md:w-64" />
                <Card title="new Card 3" class="w-full h-full overflow-hidden text-xs md:w-40 ring ring-green-400">
                    <template #default>
                        <div>
                            <p class="p-0.5 py-1"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt dolores
                                placeat eveniet laboriosam eum repudiandae nam illum autem. Deleniti placeat, inventore sint
                                officia ipsam earum aliquam tenetur rem. Pariatur, optio?</p>
                        </div>
                    </template>
                    <template #footer>
                        <div class=" p-0.5 flex justify-end bottom-0">
                            <RoundedButton
                                class="z-30 bg-white border shadow-md text-slate-600 hover:bg-green-400 hover:text-white">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </RoundedButton>
                        </div>
                    </template>

                </Card>
                <Card title="new Card ring blue" class="w-full h-full overflow-hidden text-xs md:w-40 ring ring-blue-400 first-line:uppercase first-line:tracking-widest first-letter:text-7xl first-letter:font-bold first-letter:text-slate-900 first-letter:mr-3 first-letter:float-left "
                    titleClasses="text-base first-line:uppercase first-line:tracking-widest text-green-600">
                    <template #default>
                        <div>
                            <p class="p-0.5 py-1"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt dolores
                                placeat eveniet laboriosam eum repudiandae nam illum autem. Deleniti placeat, inventore sint
                                officia ipsam earum aliquam tenetur rem. Pariatur, optio?</p>
                        </div>
                    </template>
                    <template #footer>
                        <div class=" p-0.5 flex justify-end bottom-0">
                            <RoundedButton class="z-30 text-white bg-blue-400 shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </RoundedButton>
                        </div>
                    </template>

                </Card>
                <Card title="new Card" class="w-full md:h-64 md:w-64" />
                <Card title="new Card" class="w-full text-xs text-center md:h-64 md:w-24" />
            </div>

        </div>
    </section>
    <section>
        <h2 class="text-center">Button</h2>
        <div class="relative">
            <div class="flex items-baseline flex-shrink p-8 space-x-2">
                <RoundedButton class="text-white bg-green-400 hover:bg-green-300 hover:ring hover:ring-blue-950">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </RoundedButton>
                <RoundedButton class="text-white bg-purple-500 sm:w-10 sm:h-10 hover:bg-purple-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </RoundedButton>
                <RoundedButton class="text-white bg-pink-600 sm:w-12 sm:h-12">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </RoundedButton>
                <RoundedButton class="z-50 shadow-xl ring">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </RoundedButton>
                <RoundedButton class="text-white bg-slate-700 sm:w-16 sm:h-16 hover:ring-2 ">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </RoundedButton>
                <RoundedButton class="text-white bg-gray-400 ">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                        </path>
                    </svg>
                </RoundedButton>
            </div>

        </div>

    </section>
    <section class="table-section">
        <h2 class="text-center">Table</h2>
        <div class="flex justify-end w-full">
            <Search :displayStyle="'list'" />  
        </div>
    </section>
    <section class="form ">
        <h2 class="text-center">Table</h2>
        <div class="flex w-full">
            <CreateForm :fillable="fillable" />  
        </div>
    </section>
    <div class="relative left-0 flex justify-center w-full pt-8 ">
        <div class="fixed bottom-0 w-full mt-5 ">
            <tab-navigator />
        </div>
    </div>
    </BaseLayout>
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
