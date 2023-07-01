<script setup>
import { ref, computed , watch} from 'vue';


<template>
    <div class="flex flex-col">
        <div class="flex flex-row justify-between ">
          <slot />
        </div>
        
    </div>
</template>

