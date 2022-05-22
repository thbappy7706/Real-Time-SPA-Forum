<template>
    <v-card>
        <v-container fluid>
            <v-card-title>
                <div>
                    <div class="headline">
                        {{data.title}}
                    </div>
                    <span class="grey--text">{{data.user}} said {{data.time}}</span>
                </div>
                <v-spacer></v-spacer>
                <v-btn color="teal" dark>5  Replies</v-btn>
            </v-card-title>

            <v-card-text v-html="data.body"></v-card-text>

<!--            <v-card-actions v-if="own">-->
<!--                <v-btn icon small @click="edit">-->
<!--                    <v-icon color="orange">edit</v-icon>-->
<!--                </v-btn>-->
<!--                <v-btn icon small @click="destroy">-->
<!--                    <v-icon color="red">delete</v-icon>-->
<!--                </v-btn>-->
<!--            </v-card-actions>-->
        </v-container>
    </v-card>
</template>

<script>
export default {
    name: "ShowQuestion",
    props:['data']
}
</script>

<style scoped>

</style>
