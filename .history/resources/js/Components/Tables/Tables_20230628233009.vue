<template>
    <div class="overflow-y-auto h-60">
        <table class="w-full">
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