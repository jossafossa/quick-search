<template>
  <div>
    <Shortcuts name="custom_urls" type="url" @add="addURL">
      <Shortcut @remove="remove(index)" @add="addURL(index)" :name="name" :type="type"
        v-for="(shortcut, index) of shortcuts" :key="index" :index="index" :shortcut="shortcut">
        <ShortcutInput label="label" type="text" :namePrefix="`${namePrefix}[${index}]`" :value="shortcut.label" />
        <ShortcutInput label="icon" type="text" :namePrefix="`${namePrefix}[${index}]`" :value="shortcut.icon" />
        <ShortcutInput label="type" type="hidden" :namePrefix="`${namePrefix}[${index}]`" :value="shortcut.type" />
        <ShortcutInput label="url" type="text" :namePrefix="`${namePrefix}[${index}]`" :value="shortcut.url" />
      </Shortcut>
    </Shortcuts>
  </div>
</template>

<script setup>
import ShortcutInput from '@/components/ShortcutInput.vue';
import Shortcuts from '@/components/Shortcuts.vue';
import Shortcut from '@/components/Shortcut.vue';

import { onMounted, ref } from 'vue';

const shortcuts = ref([]);
const shortcutElements = ref([])
const namePrefix = `qs_options[custom_urls]`;
const defaultShortcut = {
  "label": "",
  "icon": "dashicons-block-default",
  "url": "",
  "type": "url",
}


onMounted(() => {
  shortcuts.value = window.qsShortcuts;
})

const addURL = (index = false) => {
  console.log(index);
  if (index !== false) {
    shortcuts.value.splice(index + 1, 0, defaultShortcut);
    console.log(shortcutElements.value[index]);
    shortcutElements.value[index].focus();
  } else {
    shortcuts.value.push(defaultShortcut);
  }
}

const remove = (id) => {
  shortcuts.value.splice(id, 1);
}

</script>

<style lang="scss">
</style>

