<template>
    <div class="overflow-y-auto h-60 px-8 ">
        <table class="w-full rounded-sm shadow-lg">
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