<template>
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="deleteModal" tabindex="-1"
         aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeBtn"></button>
                </div>
                <div class="modal-body">
                    Do you really want to delete this contact? This process cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" id="cancelBtn" @click="deleteContact" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "DeleteModal",
    props: ['deleteId'],
    data() {
        return {
            msg: {
                type: '',
                txt: ''
            }
        }
    },
    methods: {
        deleteContact() {
            document.getElementById('closeBtn').click();
            let url = '/api/delete-contact/' + this.deleteId;
            axios.get(url)
                .then(response => {
                    this.msg.type = response.data.type;
                    this.msg.txt = response.data.msg;

                    this.$parent.getContacts(); //pass data to the parent component
                    this.$emit('message', this.msg); //pass data to patent component

                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
}
</script>
