<template>
    <div class="overflow-y-auto h-60  rounded-sm shadow-lg ring mx-8">
        <table class="w-full ">
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