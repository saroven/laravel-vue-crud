<template>
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addModal" tabindex="-1"
         aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="form-group">
                            <label for="name">Name</label>

                            <input type="text" v-model="addName" class="form-control" id="name"
                                   placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" v-model="addEmail" class="form-control" id="email"
                                   placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" v-model.number="addPhone" class="form-control" id="phone"
                                   placeholder="Enter phone">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="addCancel" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" @click="addContact" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "AddModal",
    data() {
        return {
            addName: "",
            addEmail: "",
            addPhone: "",
            msg: {
                type: '',
                txt: ''
            }
        }
    },
    methods: {
        addContact() {

            let url = '/api/add-contact/';

            axios.get(url, {
                params: {
                    name: this.addName,
                    email: this.addEmail,
                    phone: this.addPhone
                }
            })
                .then((response) => {
                    this.$parent.getContacts(); //call parent component method
                    document.getElementById('addCancel').click();
                })
                .catch((error) => {
                    console.log(error);
                })
        }
    }
}
</script>
