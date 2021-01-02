<template>
<v-container fluid grid-list-md>
   <v-layout roe warp>
       <v-flex xs8>
          <question v-for="question in questions" :key="question.path"
          :question=question>

          </question>
       </v-flex>
       SideBar
   </v-layout>
</v-container>

</template>

<script>
import question from './question'
export default {
    data(){
       return{
           questions:{}
       }
    },
    components:{
        question
    },
    created(){
        axios.get('/api/question')
        .then(res=>this.questions=res.data.data)

    }
};
</script>

<style></style>
