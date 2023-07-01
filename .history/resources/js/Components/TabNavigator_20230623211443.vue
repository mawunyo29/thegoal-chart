<template>
    <div class="bg-white absolute bottom-2 flex justify-start left-0 right-0">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="border-b border-gray-200" id="tab-navigator">
          <nav class="-mb-px flex space-x-8" aria-label="Tabs">
            <a
              href="#"
              :class="{
                'border-indigo-500': activeTab === 'home',
                'border-transparent': activeTab !== 'home',
                'animate-tab-navigator': activeTab === 'home',
                'slide-animation': activeTab === 'home'
              }"
              class="flex justify-center text-gray-900 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm tab-navigator-link"
              @click.prevent="setActiveTab('home')"
            >
              <i class="fa-solid fa-house tab-navigator-link"></i>
            </a>
  
            <a
              href="#"
              :class="{
                'border-indigo-500': activeTab === 'team',
                'border-transparent': activeTab !== 'team'
              }"
              class=" text-gray-500 hover:text-gray-700 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm tab-navigator-link"
              @click.prevent="setActiveTab('team')"
            >
              Team
            </a>
  
            <a
              href="#"
              :class="{
                'border-indigo-500': activeTab === 'projects',
                'border-transparent': activeTab !== 'projects'
              }"
              class=" text-gray-500 hover:text-gray-700 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm tab-navigator-link"
              @click.prevent="setActiveTab('projects')"
            >
              Projects
            </a>
  
            <a
              href="#"
              :class="{
                'border-indigo-500': activeTab === 'calendar',
                'border-transparent': activeTab !== 'calendar'
              }"
              class=" text-gray-500 hover:text-gray-700 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm tab-navigator-link"
              @click.prevent="setActiveTab('calendar')"
            >
              Calendar
            </a>
          </nav>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const activeTab = ref('home');
  
  const setActiveTab = (tab) => {
    if (activeTab.value !== tab) {
      activeTab.value = tab;
    }
  };
  </script>

<style scoped>
.slide-animation {
  transition: transform 0.3s ease-in-out;
}

.slide-animation.slide-left-enter-active {
  transform: translateX(100%);
  transition-duration: 0.5s;
}

.slide-animation.slide-left-leave-active {
  transform: translateX(-100%);
  transition-duration: 0.5s;
}

.slide-animation.slide-right-enter-active {
  transform: translateX(-100%);
  transition-duration: 0.5s;
}

.slide-animation.slide-right-leave-active {
  transform: translateX(100%);
  transition-duration: 0.5s;
}
</style>
  