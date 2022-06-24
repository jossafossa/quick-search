<template>
  <div class="shortcuts">
    <Shortcut @remove="emit('remove', index)" :name="name" :type="type" v-for="(shortcut, index) of props.shortcuts"
      :key="index" :index="index" :shortcut="shortcut">
    </Shortcut>
    <button @click.prevent="emit('add')">Add shortcut</button>
  </div>
</template>

<script setup>
// imports
import Shortcut from '@/components/Shortcut.vue';
import { defineProps, defineEmits } from "vue";


// props
const props = defineProps({
  shortcuts: Array,
  name: String
})

const emit = defineEmits(["add", "remove"]);

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.shortcuts {
  background-color: black;
  color: white;
  padding: 1rem;

}
</style>
