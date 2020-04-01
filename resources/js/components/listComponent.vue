<template>
    <div>
        <table class="table  table-striped">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="bid in bids" v-on:click="showModalF(bid.id)">
                <td>{{bid.id}}</td>
                <td>{{bid.name}}</td>
            </tr>
            </tbody>
        </table>
        <modal v-if="showModal===true" :item_id="item_id" v-on:close="showModal = false" @close='clous()'>></modal>
    </div>
</template>

<script>
    import modal from './modal.vue';

    export default {
        name: "listComponent",
        data() {
            return {
                bids: "",
                showModal: false,
                item_id: null,
            }
        },
        mounted() {
            console.log("list")
            this.get()
        },
        methods: {
            get() {
                axios.get('bids')
                    .then((response) => {
                        this.bids = response.data;
                    });
            },
            showModalF(id) {
                this.item_id = id;
                this.showModal = true;
            },
            close() {
                this.showModal = false;
                this.get();
            }
        }
    }
</script>

<style scoped>

</style>