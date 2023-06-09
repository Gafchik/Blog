<script>
import rules from "../../../constants/field-validation-rules";
import {mapActions, mapGetters} from "vuex";

const trans_prefix = 'home_page';
export default {
    name: "Profile",
    data() {
        return {
            rules,
            trans_prefix,
            form: {
                title: '',
                text: '',
            }
        }
    },
    mounted() {
        this.getPublication()
    },
    computed:{
        ...mapGetters('authStore',{
            currentUser: 'currentUser'
        }),
        ...mapGetters('publication',{
            myPublication: 'myPublication'
        }),
    },
    methods:{
        ...mapActions('publication',{
            sendPublicationAsync: 'sendPublicationAsync',
            getPublicationAllAsync: 'getPublicationAllAsync',
            getPublicationMyAsync: 'getPublicationMyAsync',
            deletePublicationAsync: 'deletePublicationAsync',
        }),
        send(){
            if (this.$refs.form.validate()) {
                this.sendPublicationAsync(this.form).then(() => {
                    this.getPublication()
                })
            }
        },
        getHeaders(){
            return [
                {
                    text: this.$t(`${trans_prefix}.tableHeaders.title`),
                    value: 'title',
                    align: 'center',
                },{
                    text: this.$t(`${trans_prefix}.tableHeaders.text`),
                    value: 'text',
                    align: 'center',
                },{
                    text: this.$t(`${trans_prefix}.tableHeaders.created_at`),
                    value: 'created_at',
                    align: 'center',
                },{
                    text: this.$t(`${trans_prefix}.tableHeaders.updated_at`),
                    value: 'updated_at',
                    align: 'center',
                },{
                    text: '',
                    value: 'action',
                    align: 'center',
                },
            ]
        },
        deletePublication(item){
            this.deletePublicationAsync({id: item.id}).then(() => {
                this.getPublication()
            })
        },
        editPublication(item){

        },
        getPublication(){
            this.getPublicationAllAsync();
            this.getPublicationMyAsync();
        }
    }
}
</script>

<template>
        <v-card class="w-75">
            <v-expansion-panels>
                <v-expansion-panel>
                    <v-expansion-panel-title>
                        {{$t(this.trans_prefix+`.panel.titles.im`)}}
                    </v-expansion-panel-title>
                    <v-expansion-panel-text>
                        <v-card>
                           <v-card-title>
                               {{$t(this.trans_prefix+`.panel.body.im.name`,{name: this.currentUser.name})}}
                           </v-card-title>
                            <v-card-title>
                                {{$t(this.trans_prefix+`.panel.body.im.email`,{email: this.currentUser.email})}}
                            </v-card-title>
                        </v-card>
                    </v-expansion-panel-text>
                </v-expansion-panel>
                <v-expansion-panel>
                    <v-expansion-panel-title>
                        {{$t(this.trans_prefix+`.panel.titles.send`)}}
                    </v-expansion-panel-title>
                    <v-expansion-panel-text>
                        <v-card>
                            <v-form ref="form">
                                <v-text-field
                                    :rules="[rules.required]"
                                    maxlength="50"
                                    counter
                                    outlined
                                    :label="$t(this.trans_prefix+`.new_massage.title_massage`)"
                                    v-model="form.title"/>
                                <v-textarea
                                    variant="filled"
                                    :label="$t(this.trans_prefix+`.new_massage.text_massage`)"
                                    auto-grow
                                    v-model="form.text"/>
                            </v-form>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="green" @click="send()">
                                    <v-icon>done</v-icon>
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-expansion-panel-text>
                </v-expansion-panel>
                <v-expansion-panel>
                    <v-expansion-panel-title>
                        {{$t(this.trans_prefix+`.panel.titles.myPublic`)}}
                    </v-expansion-panel-title>
                    <v-expansion-panel-text>
                        <v-table height="300px">
                            <thead>
                            <tr>
                                <th class="text-center" v-for="header in getHeaders()">
                                    {{header.text}}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr
                                v-for="item in myPublication"
                                :key="item.id"
                            >
                                <td>{{ item.title }}</td>
                                <td>{{ item.text }}</td>
                                <td>{{ item.created_at }}</td>
                                <td>{{ item.updated_at }}</td>
                                <td>
                                    <v-row>
                                        <v-btn color="blue" text @click="editPublication(item)">
                                            <v-icon>edit</v-icon>
                                        </v-btn>
                                        <v-btn color="red" text @click="deletePublication(item)">
                                            <v-icon>delete</v-icon>
                                        </v-btn>
                                    </v-row>
                                </td>
                            </tr>
                            </tbody>
                        </v-table>
                    </v-expansion-panel-text>
                </v-expansion-panel>
            </v-expansion-panels>
        </v-card>
</template>
