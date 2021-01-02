<template>
   <v-container>
       <v-card >
       <v-form @submit.prevent="update">
            <v-text-field
                v-model="form.title"
                label="Title"
                type="text"
                required
            ></v-text-field>

             <vue-simplemde v-model="form.body"  />
             <v-card-actions>
                 <v-btn icon small type="submit">
                     <v-icon color="teal">save</v-icon>
                 </v-btn>

                 <v-btn icon small @click="cancel" >
                     <v-icon color="teal">cancel</v-icon>
                 </v-btn>
             </v-card-actions>
       </v-form>
       </v-card>
   </v-container>
</template>

<script>
import VueSimplemde from 'vue-simplemde'
export default {
    props:['showquestion'],
   data(){
       return{
           form:{
               title:null,
               body:null
           }
       }

   },
   components:{
         VueSimplemde
    },
    methods:{
        cancel(){
            EventBus.$emit('cancelEditing')
        },
        update(){
            axios.patch(`/api/question/${this.form.slug}`,this.form)
            .then(res=>this.cancel())
        }
    },
    created(){
        this.form=this.showquestion
    }
}
</script>

<style>

</style>