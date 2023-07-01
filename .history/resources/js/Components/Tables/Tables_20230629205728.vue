<template>
    <div class="overflow-y-auto h-60  rounded-sm shadow-lg  mx-8">
        <table class=" w-full ">
            <thead>

                <slot name="tableheader"></slot>

            </thead>
            <tbody>
                <slot name="body"></slot>
            </tbody>
        </table>
    </div>
</template>