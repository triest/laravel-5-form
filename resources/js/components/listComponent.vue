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
            <div v-if="prev_page_url!=null"><a v-on:click="get_next(prev_page_url)">Next Page</a></div>
            <div v-if="total!=1">{{current_page}}</div>
            {{total}}
            <div v-if="next_page_url!=null"><a v-on:click="get_next(next_page_url)">Prevesion Page</a></div>
        </table>
        <modal v-if="showModal===true" :item_id="item_id" v-on:close="showModal = false" @close='close()'>></modal>
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
                current_page: 1,
                first_page_url: null,
                last_page_url: null,
                next_page_url: null,
                prev_page_url: null,
                total: null,
            }
        },
        mounted() {
            this.get()
        },
        methods: {
            get() {
                axios.get('bids')
                    .then((response) => {
                        let data = response.data;
                        this.bids = data.data;
                        this.current_page = data.current_page;
                        this.first_page_url = data.first_page_url;
                        this.last_page_url = data.last_page_url;
                        this.next_page_url = data.next_page_url;
                        this.prev_page_url = data.prev_page_url;
                        this.total = data.total;
                        console.log(this.total)
                    });
            },
            get_next: function (url) {

                axios.get(url)
                    .then((response) => {
                        let data = response.data;
                        this.bids = data.data;
                        this.current_page = data.current_page;
                        this.first_page_url = data.first_page_url;
                        this.last_page_url = data.last_page_url;
                        this.next_page_url = data.next_page_url;
                        this.prev_page_url = data.prev_page_url;
                        this.total = data.total;
                        console.log(this.total)
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