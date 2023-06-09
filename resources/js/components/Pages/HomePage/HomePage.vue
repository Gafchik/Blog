<script>
import {mapActions, mapGetters} from "vuex";

const trans_prefix = 'home_page';
export default {
    name: "HomePage",
    data() {
        return {
            trans_prefix,
            page: 1,
            pageSize: 3,
            listCount: 0,
            historyList: []
        }
    },
    created() {
        this.getPublicationAllAsync().then(() => {
            this.initPage();
            this.updatePage(this.page);
        });
    },
    methods: {
        ...mapActions('publication',{
            getPublicationAllAsync: 'getPublicationAllAsync',
        }),
        initPage: function() {
            this.listCount = this.publication.length;
            if (this.listCount < this.pageSize) {
                this.historyList = this.publication;
            } else {
                this.historyList = this.publication.slice(0, this.pageSize);
            }
        },
        updatePage: function(pageIndex) {
            let start = (pageIndex - 1) * this.pageSize;
            let end = pageIndex * this.pageSize;
            this.historyList = this.publication.slice(start, end);
            this.page = pageIndex;
        }
    },
    computed: {
        ...mapGetters('authStore',{
            currentUser: 'currentUser'
        }),
        ...mapGetters('publication',{
            publication: 'publication'
        }),
        pages() {
            if (this.pageSize == null || this.listCount == null) return 0;
            return Math.ceil(this.listCount / this.pageSize);
        }
    },
}
</script>

<style scoped>

</style>
<template>
    <v-card class="w-75">
        <v-alert
            v-show="!currentUser.isLogin"
            class="mb-1"
            type="success"
            :title="$t(this.trans_prefix+`.alert.title`)"
            :text="$t(this.trans_prefix+`.alert.text`)"
        ></v-alert>
        <div v-for="item in historyList" :key="item.id">
            <v-card :title="item.title" class="my-1">
                <v-card-subtitle>
                    {{$t(this.trans_prefix+`.card_massage.create`,{create: item.created_at})}}
                </v-card-subtitle>
                <v-card-subtitle>
                    {{$t(this.trans_prefix+`.card_massage.edit`,{edit: item.updated_at})}}
                </v-card-subtitle>
                <v-card-subtitle>
                    {{$t(this.trans_prefix+`.card_massage.user`,{user: item.user_name})}}
                </v-card-subtitle>
                <v-card-text>
                    {{item.text}}
                </v-card-text>
            </v-card>
        </div>
        <v-pagination class="pagination mb-2" v-model="page" :length="pages" @click="updatePage(this.page)"></v-pagination>
    </v-card>
</template>
