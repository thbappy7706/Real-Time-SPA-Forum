<template>
    <div class="text-center">
        <v-menu offset-y>
            <template v-slot:activator="{ on, attrs }">
                <v-btn large fab v-bind="attrs" v-on="on">
                    <v-icon color="red" dark>mdi-bell</v-icon> 5
                </v-btn>

            </template>
            <v-list>
                <v-list-item
                    v-for="(item, index) in items"
                    :key="index"
                >
                    <v-list-item-title>{{ item.title }}</v-list-item-title>
                </v-list-item>
            </v-list>
        </v-menu>
    </div>
</template>

<script>
export default {
    name: "AppNotification",
    data: () => ({
        items: [
            { title: 'Click Me' },
            { title: 'Click Me' },
            { title: 'Click Me' },
            { title: 'Click Me' },
        ],
    }),
}
</script>

<style scoped>
.v-btn--fab.v-size--large {
    height: 40px;
    width: 40px;
    margin-top: 1.5rem;
    margin-right: 2rem;
    background-color: transparent;
}
</style>



