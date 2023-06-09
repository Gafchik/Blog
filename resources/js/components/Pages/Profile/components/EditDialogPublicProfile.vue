<script>
import rules from "../../../../constants/field-validation-rules";
import {mapActions, mapGetters} from "vuex";
const trans_prefix = 'home_page';
export default {
    name: "EditDialogPublicProfile",
    data(){
        return {
            trans_prefix,
            rules,
            form:{
                id: null,
                title: '',
                text: '',
            }
        }
    },
    computed:{
        ...mapGetters('publication',{
            dialog: 'dialog',
            editItem: 'editItem'
        }),
    },
    methods:{
        ...mapActions('publication',{
            openDialog: 'openDialog',
            closeDialog: 'closeDialog',
            editPublicationAsync: 'editPublicationAsync',
            getPublicationAllAsync: 'getPublicationAllAsync',
            getPublicationMyAsync: 'getPublicationMyAsync',
        }),
        resetForm(){
            this.form.id = null
            this.form.title = ''
            this.form.text = ''
        },
        closeMyDialog(){
            this.resetForm();
            this.closeDialog();
        },
        edit(){
            if (this.$refs.form.validate()) {
                this.editPublicationAsync(this.form).then(() => {
                    this.getPublicationAllAsync()
                    this.getPublicationMyAsync()
                    this.closeMyDialog()
                })
            }
        }
    },
    watch: {
        'dialog'(newValue) {
            if(newValue && !this.form.id){
                this.form.id = this.editItem.id
                this.form.title = this.editItem.title
                this.form.text = this.editItem.text
            }
        }
    },
}
</script>

<template>
    <v-dialog
            v-model="dialog"
            persistent
            width="auto"
        >
            <v-card>
                <v-card-text>
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
                            :rules="[rules.required]"
                            :label="$t(this.trans_prefix+`.new_massage.text_massage`)"
                            auto-grow
                            v-model="form.text"/>
                    </v-form>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="green-darken-1"
                        variant="text"
                        @click="closeMyDialog()"
                    >
                        <v-icon>close</v-icon>
                    </v-btn>
                    <v-btn
                        color="green-darken-1"
                        variant="text"
                        @click="edit()"
                    >
                        <v-icon>done</v-icon>
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
</template>
