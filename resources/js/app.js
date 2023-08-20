import './bootstrap';


import { createApp } from 'vue';

import Chat from './components/Chat.vue';

const app = createApp({
    components: {
        Chat,
    },
});

// app.component('chat',chat);

app.mount("#app");