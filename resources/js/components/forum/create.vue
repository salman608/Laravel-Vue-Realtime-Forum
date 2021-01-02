<template>
   <v-container grid-list-xl>
        <v-form @submit.prevent="create">
            <v-text-field
                v-model="form.title"
                label="Title"
                type="text"
                required
            ></v-text-field>

            <v-select
            :items="categories"
            item-text="name"
            item-value="id"
            v-model="form.category_id"
            label="Category"

            ></v-select>




            <v-btn color="success" type="submit">
                Create Question
            </v-btn>

        </v-form>
    </v-container>
</template>

<script>
import VueSimplemde from 'vue-simplemde'
export default {
    data(){
        return{
           form:{
               title:'',
               category_id:'',
               body:''
           },
           categories:{},
           errors:{}
        }
    },
    components:{
         VueSimplemde
    },
    created(){
       axios.get('/api/category')
       .then(res=>this.categories=res.data.data)
    },
  methods:{
      create(){
         axios.post('/api/question',this.form)
       .then(res=>this.$router.push(res.data.path))
       .catch(error=>this.errors=error.response.data.error)
      }
  }
}
</script>

<style>
@import '~simplemde/dist/simplemde.min.css';
</style>