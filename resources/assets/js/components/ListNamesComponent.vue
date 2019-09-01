<template>
    <div>
        <form class="form-control" @submit.prevent="addPerson" @keydown="resetErrors">
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" v-model="person.name">

                    <span class="alert-danger form-control" v-for="error_name in this.errors.name" role="alert">
                        <strong>{{ error_name }}</strong>
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                <div class="col-md-6">
                    <input id="description" type="text" class="form-control" name="description" v-model="person.description">

                    <span class="alert-danger form-control" v-for="error_description in this.errors.description" role="alert">
                        <strong>{{ error_description }}</strong>
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-8 offset-md-4">
                    <button class="btn btn-primary" :disabled="isDisabled">Add</button>
                </div>
            </div>
        </form>

        <div class="form-control">
            <h4>Persons</h4>
            <table class="table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="person in persons">
                        <td>
                            <input title="Name" v-model="personEdit.name" v-if="isEditing && personEdit.id === person.id" @keydown="resetErrors">
                            <span v-if="!isEditing || personEdit.id !== person.id">{{ person.name }}</span>
                        </td>
                        <td>
                            <input title="Description" v-model="personEdit.description" v-if="isEditing && personEdit.id === person.id" @keydown="resetErrors">
                            <span v-if="!isEditing || personEdit.id !== person.id">{{ person.description }}</span>
                        </td>
                        <td>
                            <i class="fa fa-edit" @click="enableEdit(person)"></i>
                        </td>
                        <td>
                            <i class="fa fa-trash" @click="deletePerson(person.id)"></i>
                        </td>
                        <td>
                            <button v-if="isEditing && personEdit.id === person.id" class="btn btn-success" @click="editPerson(person.id)">Save</button>
                            <button v-if="isEditing && personEdit.id === person.id" class="btn btn-danger" @click="disableEdit">Cancel</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    const endpoint = '/api/persons/';

    export default {
        data() {
            return {
                isLoading: false,
                isEditing: false,
                isDisabled: false,
                person: {
                    name: 'Default',
                    description: 'Default 1',
                },
                personEdit: {
                    id: null,
                    name: null,
                    description: null,
                },
                persons: [],
                errors: []
            }
        },
        created() {
            this.getPeople();
        },
        methods: {
            addPerson() {
                axios.post(endpoint, this.$data.person)
                    .then(response => {
                        this.persons.push(Vue.util.extend({}, response.data.person));
                        this.resetInput();
                        alert(response.data.message);
                    })
                    .catch(error => {
                        this.isDisabled = true;
                        this.errors = error.response.data.errors;
                    })
            },

            getPeople() {
                axios.get(endpoint)
                    .then(response => this.persons = response.data.persons)
                    .catch(() => alert(response.data.errors.message))
            },

            editPerson(id) {
                axios.put(endpoint + id, this.$data.personEdit)
                    .then(response => {
                        const position = this.persons.findIndex((element) => {
                            return element.id === id
                        });
                        this.persons[position] = response.data.person;
                        this.disableEdit();
                        alert(response.data.message);
                    })
                    .catch(error => {
                        this.isDisabled = true;
                        this.errors = error.response.data.errors;
                    })
            },

            enableEdit(person) {
                this.isEditing = true;

                if (this.isEditing) {
                    this.personEdit.id = person.id;
                    this.personEdit.name = person.name;
                    this.personEdit.description = person.description;
                } else {
                    this.personEdit.id = null;
                }
            },

            disableEdit() {
                this.isEditing = false;

                this.personEdit.id = null;
                this.personEdit.name = null;
                this.personEdit.description = null;
            },

            deletePerson(id) {
                axios.delete(endpoint + id)
                    .then(response => {
                        const position = this.persons.findIndex((element) => {
                            return element.id === id
                        });
                        this.persons.splice(position, 1);
                        alert(response.data.message);
                    })
                    .catch(error => alert(error))
            },

            resetInput() {
                this.person.name = '';
                this.person.description = '';
            },

            resetErrors() {
                this.errors = [];
                this.isDisabled = false;
            }
        }
    }
</script>
