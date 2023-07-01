<template>
    <div class="bg-white absolute bottom-2 flex justify-start left-0 right-0 lg:hidden">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="border-b border-gray-200" id="tab-navigator">
          <nav class="flex " aria-label="Tabs">
            <a
              href="#"
              role="tab"
              :class="{
                'border-indigo-500': activeTab === 'home',
                'border-transparent ': activeTab !== 'home',
                'animate-tab-navigator': activeTab === 'home',
                'slide-animation ': activeTab === 'home'
              }"
              class="flex justify-center text-gray-700 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm tab-navigator-link  gap-2 "
              @click.prevent="setActiveTab('home')"
            >
              <i class="fa-solid fa-house tab-navigator-link"></i>
            </a>
  
            <a
              href="#"
              role="tab"
              :class="{
                'border-indigo-500': activeTab === 'team',
                'border-transparent': activeTab !== 'team',
                'animate-tab-navigator': activeTab === 'team',
                'slide-animation': activeTab === 'team'
              }"
              class=" text-gray-500 hover:text-gray-700 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm tab-navigator-link gap-2"
              @click.prevent="setActiveTab('team')"
            >
                <i class="fa-solid fa-users tab-navigator-link"></i>
            </a>
  
            <a
              href="#"
              role="tab"
              :class="{
                'border-indigo-500': activeTab === 'projects',
                'border-transparent': activeTab !== 'projects',
                'slide-animation': activeTab ==='projects'
              }"
              class=" text-gray-500 hover:text-gray-700 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm tab-navigator-link gap-2"
              @click.prevent="setActiveTab('projects')"
            >
                <i class="fa-solid fa-project-diagram tab-navigator-link"></i>
            </a>
  
            <a
              href="#"
              role="tab"
              :class="{
                'border-indigo-500': activeTab === 'calendar',
                'border-transparent': activeTab !== 'calendar'
              }"
              class=" text-gray-500 hover:text-gray-700 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm tab-navigator-link gap-2"
              @click.prevent="setActiveTab('calendar')"
            >
                <i class="fa-solid fa-calendar tab-navigator-link"></i>
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
  