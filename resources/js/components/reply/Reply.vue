<template>
  <div class="mt-4">
      <v-card>
          <v-card-title>
              <div class="headline"> {{data.user}} </div>
              <div class="ml-2"> said {{data.time}}</div>
          </v-card-title>
          <v-divider></v-divider>
          <v-card-text v-html="data.reply"> </v-card-text>
          <v-divider></v-divider>

          <v-card-actions v-if="own">
              <v-btn small fab>
                  <v-icon color="cyan" dark>mdi-pencil</v-icon>
              </v-btn>

              <v-btn small fab>
                  <v-icon color="red" dark>mdi-delete</v-icon>
              </v-btn>
          </v-card-actions>
      </v-card>
  </div>
</template>

<script>
export default {
    name: "Reply",
    props: ['data'],
    computed:{
        own(){
            return User.own(this.data.user_id)
        }
    }
}
</script>

<style scoped>

</style>
