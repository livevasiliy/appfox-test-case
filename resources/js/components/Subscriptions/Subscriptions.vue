<template>
    <div class="btn-group" role="group">
        <button
            type="button"
            class="btn btn-secondary mr-2"
            v-if="fechechedUser.has_subscribe_on_new_posts === false"
            @click.prevent="subscribeOnPosts"
        >Подписаться на новости</button>
        <button
            type="button"
            class="btn btn-danger mr-2"
            v-if="fechechedUser.has_subscribe_on_new_posts === true"
            @click.prevent="unSubscribeOnPosts"
        >Отписаться на новости</button>
        <button
            type="button"
            class="btn btn-secondary"
            v-if="fechechedUser.has_subscribe_on_new_products === false"
            @click.prevent="subscribeOnProducts"
        >Подписаться на товары</button>
        <button
            type="button"
            class="btn btn-danger"
            v-if="fechechedUser.has_subscribe_on_new_products === true"
            @click.prevent="unSubscribeOnProducts"
        >Отписаться на товары</button>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";

    export default {
        props: {
            user: {
                type: Object,
                required: true
            }
        },
        mounted() {
            this.$store.dispatch('setUser', this.user)
        },
        methods: {
            ...mapActions([
                "subscribeOnPosts",
                "subscribeOnProducts",
                "unSubscribeOnPosts",
                "unSubscribeOnProducts"
            ])
        },
        computed: {
            ...mapGetters({
                fechechedUser: 'user'
            })
        }
    }
</script>

<style scoped>

</style>
