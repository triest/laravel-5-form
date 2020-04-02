<template>
    <div>
        <table class="table  table-striped align-content-center"  align="center" width="sm-1">
            <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">date</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="bid in bids" v-on:click="showModalF(bid.id)" style="cursor:pointer">
                <td>{{bid.name}}</td>
                <td>{{bid.created_at}}</td>
            </tr>
            </tbody>
            <a class="previous " v-if="prev_page_url!=null"><a v-on:click="get_next(prev_page_url)"> < </a></a>
            <span v-if="total!=1">{{current_page}}</span>
            of
            {{last_page}}
            <a href="#" class="next " v-if="next_page_url!=null"><a v-on:click="get_next(next_page_url)"> > </a></a>
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
                        this.last_page = data.last_page;
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
            }
        }
    }
</script>

<style scoped>
    a {
        text-decoration: none;
        display: inline-block;
        padding: 3px 3px;
    }

    a:hover {
        background-color: #ddd;
        color: black;
    }

    .previous {
        background-color: #f1f1f1;
        color: black;
        cursor:pointer;
    }

    .next {
        background-color: #9d98af;
        color: white;
        cursor:pointer;
    }

    .round {
        border-radius: 50%;
    }
</style>