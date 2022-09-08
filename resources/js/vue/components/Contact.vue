<template>
    <div style="width: 60%; margin: auto;">
        <button type="button" class="btn btn-primary btn-sm"
                data-bs-toggle="modal" data-bs-target="#addModal">
            Add Contact
        </button>
        <!--message -->

        <div v-if="msg.type === 'success'" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>success!</strong> {{ msg.txt }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div v-if="msg.type === 'error'" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Ops!</strong> {{ msg.txt }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <!--        end message -->
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">PHONE</th>
                <th scope="col" style="width: 20%">ACTION</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(contact, index) in contacts" :key="contact.id">
                <th scope="row">{{ index + 1 }}</th>
                <td>{{ contact.name }}</td>
                <td>{{ contact.email }}</td>
                <td>{{ contact.phone }}</td>
                <td>
                    <button type="button" @click="setEditId(contact.id)" class="btn btn-primary btn-sm"
                            data-bs-toggle="modal" data-bs-target="#editModal">
                        Edit
                    </button>

                    <button type="button" @click="setDeleteId(contact.id)" class="btn btn-danger btn-sm"
                            data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <AddModal @message="getMessage"></AddModal>
    <EditModal :editId="editId" @message="getMessage"></EditModal>
    <DeleteModal :deleteId="deleteId" @message="getMessage"></DeleteModal>

</template>

<script>
import DeleteModal from "./DeleteModal.vue";
import EditModal from "./EditModal.vue";
import AddModal from "./AddModal.vue";

export default {
    name: "Contact",
    components: {
        DeleteModal,
        EditModal,
        AddModal
    },
    data() {
        return {
            contacts: [],
            deleteId: 0,
            editId: 0,
            msg: []
        }
    },
    mounted() {
        this.getContacts();
    },
    methods: {
        getContacts() {
            axios.get('/api/contacts')
                .then(response => {
                    this.contacts = response.data.contacts;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        setEditId(id) {
            this.editId = id;
        },
        setDeleteId(id) {
            this.deleteId = id;
        },
        getMessage(message) {
            this.msg = message; //get message (type, txt) and assign

            console.log(this.msg)
        }
    }
}
</script>
