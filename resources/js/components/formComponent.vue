<template>

    <form id="form">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" id="name" v-model="name" placeholder="name">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="phone" class="form-control" name="phone" id="phone" v-model="phone" width="30">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
            </small>
        </div>
        <textarea id="description" name="description" v-model="description" style="resize: none" cols="30"></textarea>
        <br>
        <button type="button" v-on:click="saves()">
            Save
        </button>
    </form>
</template>

<script>
    export default {
        name: "formComponent",
        data() {
            return {
                name: "",
                phone: "",
                description: "",
                info: null
            }
        },
        mounted() {
            console.log("form")
        },
        methods: {
            saves() {
                console.log("save")
                let form = document.getElementById("form");

                let data = new FormData();
                data.append("name", this.name);
                data.append("phone", this.phone);
                data.append("description", this.description);

                axios.post('form', data).then(function (response) {
                    if (response.status == "200") {
                        alert("Data accepted")
                    } else {
                        alert("Error")
                    }
                }).catch(error => {
                    // error.response can be null
                    if (error.response && error.response.status === 422) {
                        let errors = error.response.data.errors;
                        let array = (Object.values(errors));
                        let message = "";
                        array.forEach(element => message += " " + element);
                        alert(message)

                    }
                })
            },

            validate() {

            }
        }
    }
</script>

<style scoped>

</style>