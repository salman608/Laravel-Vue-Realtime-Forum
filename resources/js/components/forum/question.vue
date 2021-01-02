<template>

      <v-card>

        <v-card-title primary-title>
          <div>
            <h3 class="headline mb-0" color="dark--text">
                <router-link :to="question.path">
                    {{question.title}}
                </router-link>

                </h3>
            <div color="grey--text">
                {{question.user}} said
                {{question.Created_at}}
                </div>
          </div>
        </v-card-title>
        <v-card-text>{{question.body}}</v-card-text>
      </v-card>

</template>

<script>
export default {
  props:['question']
}
</script>

<style>

</style>