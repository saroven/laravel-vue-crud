<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Contact App</title>

    <script src="{{ asset('vue.js') }}"></script>
</head>
<body>
<div id="app" style="width: 60%;margin: auto;">
    <div class="bg-dark text-light p-3 d-flex justify-content-between">
        <h1 class="text-center">All Contacts</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            Add Contact
        </button>
    </div>

    <div>
        {{-- contacts--}}
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
                <contacts :contactdata="contacts"></contacts>
            </tbody>
        </table>
    </div>


    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="deleteModal" tabindex="-1"
         aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you really want to delete this contact? This process cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" @click="deleteContact" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


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
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>

                            <input type="text" v-model="editname" class="form-control" id="name"
                                   placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" v-model="editemail" class="form-control" id="email"
                                   placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" v-model.number="editphone" class="form-control" id="phone"
                                   placeholder="Enter phone">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" @click="updateContact" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>

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
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>

                            <input type="text" v-model="addname" class="form-control" id="name"
                                   placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" v-model="addemail" class="form-control" id="email"
                                   placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" v-model.number="addphone" class="form-control" id="phone"
                                   placeholder="Enter phone">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" @click="addContact" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>


</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
        integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="application/javascript">
    var app = new Vue({
        el: '#app',
        data: {
            // add
            addname: '',
            addemail: '',
            addphone: '',

            // edit
            editname: '',
            editemail: '',
            editphone: '',
            contacts: [],
        },
        methods: {
            getContacts: function () {
                axios.get('/api/contacts')
                    .then((response) => {
                        this.contacts = response.data.contacts;
                        console.log(this.contacts);
                    })
            },
            addContact() {
                console.log(this.addname);
                console.log(this.addemail);
                console.log(this.addphone);
            },
            updateContact: function () {
                console.log(this.editname);
                console.log(this.editemail);
                console.log(this.editphone);
            },
            deleteContact: function () {
                console.log('deleted');
            }
        },
        mounted: function () {
            this.getContacts();
        },
        components: {
            'contacts': {
                template: `
                    <div>
                    <tr v-for="(contact, index) in contactdata">
                        <th scope="row">@{{ contact.id }}</th>
                        <td>@{{ contact.name }}</td>
                        <td>@{{ contact.email }}</td>
                        <td>@{{ contact.phone }}</td>
                        <td>
                        </td>
                    </tr>
                    </div>
                `,
                props: ['contactdata'],
                methods: {
                    deleteContact: function () {
                        this.$emit('delete-contact');
                    }
                }
            }
        }
    });
</script>
</body>
</html>
