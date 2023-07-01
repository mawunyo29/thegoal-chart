<script setup>
import { computed, onMounted, onUnmounted, watch, ref } from 'vue';
import axios from 'axios';

const props = defineProps({
    title: {
        type: String,
        default: 'Card Title',
    },
    image: {
        type: String,
        default: '',
    },
    classes: {
        type: String,
        default: '',
    },
    
});

const images = ref([]);
// Fonction pour récupérer une image aléatoire
async function getRandomImage() {
    try {
        const response = await axios.get('https://api.unsplash.com/photos/random', {
            headers: {
                Authorization: `Client-ID ${import.meta.env.VITE_UNSPLASH_ACCESS_KEY}`, // Remplacez par votre clé API Unsplash
            },
            params: {
                orientation: 'landscape', // Orientation de l'image (optionnel)
            },
        });

        const imageUrl = response.data.urls.regular;
        return imageUrl;
    } catch (error) {
        console.error('Erreur lors de la récupération de l\'image aléatoire :', error);
        return null;
    }
}

// Exemple d'utilisation
getRandomImage().then((imageUrl) => {
    if (imageUrl) {

        images.value = imageUrl;
        console.log('Image aléatoire :', images.value);
        // Utilisez l'URL de l'image comme vous le souhaitez
    }
});

</script>
<template>
    <div class="card" :title="title" :image="image" :class="classes">
        <!---the card image  from unsplash --->
        <div class="card-image">
            <img :src="images" :class="classes" />
        </div>
        <div class="card-header py-1">
            {{ title }}
            <hr class=" border-b border-b-slate-400">
        </div>
        <!---the card body--->
        <div class="card-body my-1">
            <slot  />
        </div>
        <div>
            <hr class=" border-b border-b-slate-400">
            <slot name="footer" />
        </div>
    </div>
</template>