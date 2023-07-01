<template>
    <div class="overflow-y-auto h-60  rounded-sm shadow-lg  mx-8">
        <table class="table w-full ">
            <thead>
                <tr>
                    <slot name="tableheader"></slot>
                </tr>
            </thead>
            <tbody>
                <slot name="body"></slot>
            </tbody>
        </table>
    </div>
</template>