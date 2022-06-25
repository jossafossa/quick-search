<template>
  <div class="settings">
    <h2>Custom url actions</h2>
    <Shortcuts name="custom_urls" type="url" @add="addURL">
      <Shortcut
        @remove="removeURL(index)"
        @add="addURL(index)"
        :name="name"
        :type="type"
        v-for="(shortcut, index) of shortcuts"
        :key="index"
        :index="index"
        :shortcut="shortcut"
      >
        <ShortcutInput
          label="label"
          type="text"
          :namePrefix="`${customURLNamePrefix}[${index}]`"
          :value="shortcut.label"
        />
        <ShortcutInput
          label="icon"
          type="text"
          :namePrefix="`${customURLNamePrefix}[${index}]`"
          :value="shortcut.icon"
        />
        <ShortcutInput
          label="type"
          type="hidden"
          :namePrefix="`${customURLNamePrefix}[${index}]`"
          :value="shortcut.type"
        />
        <ShortcutInput
          label="url"
          type="text"
          :namePrefix="`${customURLNamePrefix}[${index}]`"
          :value="shortcut.url"
        />
      </Shortcut>
    </Shortcuts>

    <h2>Exclude specific actions</h2>
    <ExcludedActions>
      <ActionList title="Enabled actions">
        <Action
          v-for="(actionID, index) of enabledActions"
          :key="index"
          :action="actions[actionID]"
          :id="actionID"
          @click="disableAction(index)"
        >
        </Action>
      </ActionList>

      <ActionList title="Disabled actions">
        <Action
          v-for="(actionID, index) of disabledActions"
          :key="index"
          :action="actions[actionID]"
          :id="actionID"
          @click="enableAction(index)"
        >
        <input type="hidden" :name="disabledActionsName" :value="actionID">
        </Action>
      </ActionList>
    </ExcludedActions>
  </div>
</template>

<script setup>
import ShortcutInput from "@/components/ShortcutInput.vue";
import Shortcuts from "@/components/Shortcuts.vue";
import Shortcut from "@/components/Shortcut.vue";
import ExcludedActions from "@/components/ExcludedActions.vue";
import ActionList from "@/components/ActionList.vue";
import Action from "@/components/Action.vue";

import { onMounted, ref } from "vue";

const shortcuts = ref([]);
const enabledActions = ref([]);
const actions = ref({});
const disabledActions = ref([]);
const shortcutElements = ref([]);
const customURLNamePrefix = `qs_options[custom_urls]`;
const disabledActionsName = `qs_options[disabled_actions][]`;
const defaultShortcut = {
  label: "",
  icon: "dashicons-block-default",
  url: "",
  type: "url",
};

// populate vue with external data
onMounted(() => {
  shortcuts.value = window.qsCustomURLs;
  actions.value = window.qsAllActions;
  enabledActions.value = window.qsEnabledActions;
  disabledActions.value = window.qsDisabledActions;
});

// insert a new custom url at index
const addURL = (index = false) => {
  console.log(index);
  if (index !== false) {
    shortcuts.value.splice(index + 1, 0, defaultShortcut);
    console.log(shortcutElements.value[index]);
    shortcutElements.value[index].focus();
  } else {
    shortcuts.value.push(defaultShortcut);
  }
};

// remove url at index
const removeURL = (id) => {
  shortcuts.value.splice(id, 1);
};

const disableAction = (index) => {
  const action = enabledActions.value.splice(index, 1);
  disabledActions.value.unshift(action[0]);
};

const enableAction = (index) => {
  const action = disabledActions.value.splice(index, 1);
  enabledActions.value.unshift(action[0]);
};
</script>

<style lang="scss">
:root {
  --qs-background: #1d2327;
  --qs-foreground: #2c3337;
  --qs-highlight: #3f484e;
}
</style>
