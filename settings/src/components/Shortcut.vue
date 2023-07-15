<template>
  <div class="shortcut">
    <div @keydown.enter.prevent="emit('add')" class="shortcut-inputs">
      <span>{</span>
      <slot></slot>
      <span>},</span>
    </div>
    <button class="qs-button" @click.prevent="emit('remove')">x</button>
  </div>
</template>

<script setup>
// import ShortcutInput from '@/components/ShortcutInput'

import { defineEmits } from "vue";
// const props = defineProps({
//   type: String,
//   index: Number,
//   shortcut: Object,
//   name: String
// });

const icons = {
  "dashicons-menu": "f333",
  "dashicons-admin-site": "f319",
  "dashicons-dashboard": "f226",
  "dashicons-admin-post": "f109",
  "dashicons-admin-media": "f104",
  "dashicons-admin-links": "f103",
  "dashicons-admin-page": "f105",
  "dashicons-admin-comments": "f101",
  "dashicons-admin-appearance": "f100",
  "dashicons-admin-plugins": "f106",
  "dashicons-admin-users": "f110",
  "dashicons-admin-tools": "f107",
  "dashicons-admin-settings": "f108",
  "dashicons-admin-network": "f112",
  "dashicons-admin-home": "f102",
  "dashicons-admin-generic": "f111",
  "dashicons-admin-collapse": "f148",
  "dashicons-welcome-write-blog": "f119",
  "dashicons-welcome-add-page": "f133",
  "dashicons-welcome-view-site": "f115",
  "dashicons-welcome-widgets-menus": "f116",
  "dashicons-welcome-comments": "f117",
  "dashicons-welcome-learn-more": "f118",
  "dashicons-format-aside": "f123",
  "dashicons-format-image": "f128",
  "dashicons-format-gallery": "f161",
  "dashicons-format-video": "f126",
  "dashicons-format-status": "f130",
  "dashicons-format-quote": "f122",
  "dashicons-format-chat": "f125",
  "dashicons-format-audio": "f127",
  "dashicons-camera": "f306",
  "dashicons-images-alt": "f232",
  "dashicons-images-alt2": "f233",
  "dashicons-video-alt": "f234",
  "dashicons-video-alt2": "f235",
  "dashicons-video-alt3": "f236",
  "dashicons-image-crop": "f165",
  "dashicons-image-rotate-left": "f166",
  "dashicons-image-rotate-right": "f167",
  "dashicons-image-flip-vertical": "f168",
  "dashicons-image-flip-horizontal": "f169",
  "dashicons-undo": "f171",
  "dashicons-redo": "f172",
  "dashicons-editor-bold": "f200",
  "dashicons-editor-italic": "f201",
  "dashicons-editor-ul": "f203",
  "dashicons-editor-ol": "f204",
  "dashicons-editor-quote": "f205",
  "dashicons-editor-alignleft": "f206",
  "dashicons-editor-aligncenter": "f207",
  "dashicons-editor-alignright": "f208",
  "dashicons-editor-insertmore": "f209",
  "dashicons-editor-spellcheck": "f210",
  "dashicons-editor-distractionfree": "f211",
  "dashicons-editor-kitchensink": "f212",
  "dashicons-editor-underline": "f213",
  "dashicons-editor-justify": "f214",
  "dashicons-editor-textcolor": "f215",
  "dashicons-editor-paste-word": "f216",
  "dashicons-editor-paste-text": "f217",
  "dashicons-editor-removeformatting": "f218",
  "dashicons-editor-video": "f219",
  "dashicons-editor-customchar": "f220",
  "dashicons-editor-outdent": "f221",
  "dashicons-editor-indent": "f222",
  "dashicons-editor-help": "f223",
  "dashicons-editor-strikethrough": "f224",
  "dashicons-editor-unlink": "f225",
  "dashicons-editor-rtl": "f320",
  "dashicons-align-left": "f135",
  "dashicons-align-right": "f136",
  "dashicons-align-center": "f134",
  "dashicons-align-none": "f138",
  "dashicons-lock": "f160",
  "dashicons-calendar": "f145",
  "dashicons-visibility": "f177",
  "dashicons-post-status": "f173",
  "dashicons-edit": "f464",
  "dashicons-trash": "f182",
  "dashicons-arrow-up": "f142",
  "dashicons-arrow-down": "f140",
  "dashicons-arrow-right": "f139",
  "dashicons-arrow-left": "f141",
  "dashicons-arrow-up-alt": "f342",
  "dashicons-arrow-down-alt": "f346",
  "dashicons-arrow-right-alt": "f344",
  "dashicons-arrow-left-alt": "f340",
  "dashicons-arrow-up-alt2": "f343",
  "dashicons-arrow-down-alt2": "f347",
  "dashicons-arrow-right-alt2": "f345",
  "dashicons-arrow-left-alt2": "f341",
  "dashicons-sort": "f156",
  "dashicons-leftright": "f229",
  "dashicons-list-view": "f163",
  "dashicons-exerpt-view": "f164",
  "dashicons-share": "f237",
  "dashicons-share-alt": "f240",
  "dashicons-share-alt2": "f242",
  "dashicons-twitter": "f301",
  "dashicons-rss": "f303",
  "dashicons-email": "f465",
  "dashicons-email-alt": "f466",
  "dashicons-facebook": "f304",
  "dashicons-facebook-alt": "f305",
  "dashicons-googleplus": "f462",
  "dashicons-networking": "f325",
  "dashicons-hammer": "f308",
  "dashicons-art": "f309",
  "dashicons-migrate": "f310",
  "dashicons-performance": "f311",
  "dashicons-wordpress": "f120",
  "dashicons-wordpress-alt": "f324",
  "dashicons-pressthis": "f157",
  "dashicons-update": "f463",
  "dashicons-screenoptions": "f180",
  "dashicons-info": "f348",
  "dashicons-cart": "f174",
  "dashicons-feedback": "f175",
  "dashicons-cloud": "f176",
  "dashicons-translation": "f326",
  "dashicons-tag": "f323",
  "dashicons-category": "f318",
  "dashicons-yes": "f147",
  "dashicons-no": "f158",
  "dashicons-no-alt": "f335",
  "dashicons-plus": "f132",
  "dashicons-minus": "f460",
  "dashicons-dismiss": "f153",
  "dashicons-marker": "f159",
  "dashicons-star-filled": "f155",
  "dashicons-star-half": "f459",
  "dashicons-star-empty": "f154",
  "dashicons-flag": "f227",
  "dashicons-location": "f230",
  "dashicons-location-alt": "f231",
  "dashicons-vault": "f178",
  "dashicons-shield": "f332",
  "dashicons-shield-alt": "f334",
  "dashicons-sos": "f468",
  "dashicons-search": "f179",
  "dashicons-slides": "f181",
  "dashicons-analytics": "f183",
  "dashicons-chart-pie": "f184",
  "dashicons-chart-bar": "f185",
  "dashicons-chart-line": "f238",
  "dashicons-chart-area": "f239",
  "dashicons-groups": "f307",
  "dashicons-businessman": "f338",
  "dashicons-id": "f336",
  "dashicons-id-alt": "f337",
  "dashicons-products": "f312",
  "dashicons-awards": "f313",
  "dashicons-forms": "f314",
  "dashicons-testimonial": "f473",
  "dashicons-portfolio": "f322",
  "dashicons-book": "f330",
  "dashicons-book-alt": "f331",
  "dashicons-download": "f316",
  "dashicons-upload": "f317",
  "dashicons-backup": "f321",
  "dashicons-clock": "f469",
  "dashicons-lightbulb": "f339",
  "dashicons-desktop": "f472",
  "dashicons-tablet": "f471",
  "dashicons-smartphone": "f470",
  "dashicons-smiley": "f328",
};
console.log(icons);

const emit = defineEmits(["remove", "add"]);

// const namePrefix = `qs_options[${props.name}][${props.index}]`;
</script>

<style lang="scss" scoped>
.shortcut {
  --bracket-size: 1rem;
  padding: 0.5rem 1rem;
  background-color: var(--foreground);
  border-radius: var(--border-radius);
  display: flex;
  font-family: monospace;
  align-items: stretch;

  > .shortcut-inputs {
    flex: 1;
  }

  > button {
    padding: 1rem 0.5rem;
    cursor: pointer;
    border: none;
    font-family: inherit;
    margin: calc(var(--bracket-size) - 0.25rem) 0;
  }
}
.shortcut-inputs {
  display: flex;
  flex-direction: column;

  > span {
    opacity: 0.5;
    height: var(--bracket-size);
  }
}
</style>
