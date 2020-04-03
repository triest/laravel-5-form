<template>

    <form id="form">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" rows="5" name="name" id="name" v-model="name">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="phone" class="form-control" name="phone" id="phone" v-model="phone" width="10">
        </div>
        <textarea id="description" name="description" v-model="description" style="resize: none" cols="30"></textarea>
        <br>
        <button type="button" class="btn btn-primary" v-on:click="saves()">
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
                        alert("Data accepted");
                        let link = document.createElement('a');
                        link.href = "/blog/public";
                        link.click()
                    } else {
                        alert("Error")
                    }
                }).catch(error => {
                    // error.response can be null
                    if (error.response && error.response.status === 422) {
                        let errors = error.response.data.errors;
                        let array = (Object.values(errors));
                        let message = "";
                        array.forEach(element => message += " " + element + "\n");
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
    textarea,
    input[type] {
        width: 250px;
    }

    #form {
        position: center;
    }
</style>