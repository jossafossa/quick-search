<template>
  <div>
    <Shortcuts name="custom_urls" @remove="remove" type="url" :shortcuts="shortcuts" @add="addURL">
    </Shortcuts>
  </div>
</template>

<script setup>
import Shortcuts from '@/components/Shortcuts.vue';
import { onMounted, ref } from 'vue';

const shortcuts = ref([]);

onMounted(() => {
  shortcuts.value = window.qsShortcuts;
})

const addURL = () => {
  shortcuts.value.push([]);
}

const remove = (id) => {
  shortcuts.value.splice(id, 1);
}

</script>

<style lang="scss">
</style>

