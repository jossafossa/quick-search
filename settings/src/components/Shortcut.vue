<template>
  <div class="shortcut">
    <div class="shortcut-inputs">
      <span>{</span>
      <ShortcutInput label="label" type="text" :namePrefix="namePrefix" :value="shortcut.label"></ShortcutInput>
      <ShortcutInput label="icon" type="hidden" :namePrefix="namePrefix" :value="shortcut.icon"></ShortcutInput>
      <ShortcutInput label="type" type="hidden" :namePrefix="namePrefix" :value="shortcut.type"></ShortcutInput>
      <ShortcutInput label="url" type="text" :namePrefix="namePrefix" :value="shortcut.url"></ShortcutInput>
      <span>},</span>
    </div>
    <button @click.prevent="emit('remove')">x</button>
  </div>
</template>

<script setup>

import ShortcutInput from '@/components/ShortcutInput'

import { defineProps, defineEmits } from 'vue';
const props = defineProps({
  type: String,
  index: Number,
  shortcut: Object,
  name: String
});

const emit = defineEmits(["remove"]);

const namePrefix = `qs_options[${props.name}][${props.index}]`;

</script>

<style lang="scss">
.shortcut {
  display: flex;

  >.shortcut-inputs {
    flex: 1;
  }
}

.shortcut-inputs {
  display: flex;
  flex-direction: column;
  align-items: stretch;
  font-family: monospace;

  >span {
    opacity: 0.5;
  }
}
</style>