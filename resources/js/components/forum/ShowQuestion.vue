<template>
   <v-card>
       <v-container fluid>
       <v-card-title>
           <div>
               <div class="headline">
                   {{showquestion.title}}
               </div>
                <span class="grey--text">
               {{showquestion.user}} said {{showquestion.Created_at}}
           </span>
           </div>
           <v-spacer></v-spacer>
           <v-btn color="teal">5 Replies</v-btn>

       </v-card-title>
       <v-card-text v-html="body"></v-card-text>
       <v-card-actions v-if="own">
           <v-btn icon small color="black" @click="edit">
               <v-icon color="green">edit</v-icon>
           </v-btn>
           <v-btn icon small color="grey" @click="destroy">
               <v-icon color="red">delete</v-icon>
           </v-btn>
       </v-card-actions>

   </v-container>
   </v-card>
</template>

<script>

export default {
   props:['showquestion'],
   data(){
      return{
          own: User.own(this.showquestion.user_id)
      }
   },
   computed:{
       body(){
           return md.parse(this.showquestion.body)
       }
   },
   methods:{
       destroy(){
           axios.delete(`/api/question/${this.showquestion.slug}`)
           .then(res =>this.$router.push('/forum'))
           .catch(error =>console.log(error.response.showquestion))
       },
       edit(){
           EventBus.$emit('startEditing')
       }
   }
}
</script>

<style>

</style>