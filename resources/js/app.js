
// use axios

import {createApp} from 'vue';
import Contact from './vue/components/Contact.vue';
import DeleteModal from "./vue/components/DeleteModal.vue";
import AddModal from "./vue/components/AddModal.vue";
import EditModal from "./vue/components/EditModal.vue";

const app = createApp(Contact);

// app.component('Contact', Contact)
//   .component('AddModal', AddModal)
//   .component('EditModal', EditModal)
//   .component('DeleteModal', DeleteModal)

app.mount('#app')
