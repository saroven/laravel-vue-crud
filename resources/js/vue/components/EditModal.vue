<template>
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="editModal" tabindex="-1"
         aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="form-group">
                            <label for="name">Name</label>

                            <input type="text" v-model="editName" class="form-control" id="name"
                                   placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" v-model="editEmail" class="form-control" id="email"
                                   placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" v-model.number="editPhone" class="form-control" id="phone"
                                   placeholder="Enter phone">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="editCancel" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" @click="updateContact" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>

</template>


<script>
export default {
    name: "EditModal",
    props: ['editId'],
    data() {
        return {
            editName: "",
            editEmail: "",
            editPhone: "",
            form: [],
            msg:{
                type:'',
                txt:''
            }
        }
    },
    methods: {
        updateContact() {

            this.form = {
                id: this.editId,
                name: this.editName,
                email: this.editEmail,
                phone: this.editPhone,
            }

            axios.post('/api/contact/' + this.editId, this.form)
                .then((res) => {
                    document.getElementById('editCancel').click();
                        this.msg.type = res.data.type;
                        this.msg.txt = res.data.msg;

                        this.$parent.getContacts(); //call parent component method
                        this.$emit('message', this.msg); //pass data to patent component
                })
                .catch((error) => {
                    console.log(error);
                })
        }
    },
    watch: {
        editId: function (id) {
            axios.get('/api/contact/' + id)
                .then(response => {
                    this.editName = response.data.contact.name;
                    this.editEmail = response.data.contact.email;
                    this.editPhone = response.data.contact.phone;
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
}
</script>
