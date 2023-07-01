<template>
    <table class=" w-full ">
        <thead>
            <tr class="text-left border-b border-gray-200 sticky top-0 bg-slate-950 text-white">
                <slot name="tableheader"></slot>
            </tr>
        </thead>
        <tbody>
            <slot name="body"></slot>
        </tbody>
    </table>
</template>