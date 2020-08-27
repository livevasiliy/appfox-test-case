<template>
    <div class="btn-group" role="group">
        <button
            type="button"
            class="btn btn-secondary mr-2"
            v-if="user.has_subscribe_on_new_posts === false"
            @click.prevent="subscribeOnPosts"
        >Подписаться на новости</button>
        <button
            type="button"
            class="btn btn-secondary"
            v-if="user.has_subscribe_on_new_products === false"
            @click.prevent="subscribeOnProducts"
        >Подписаться на товары</button>
        <button
            type="button"
            class="btn btn-danger mr-2"
            v-if="user.has_subscribe_on_new_posts === true"
            @click.prevent="unSubscribeOnPosts"
        >Отписаться на новости</button>
        <button
            type="button"
            class="btn btn-danger"
            v-if="user.has_subscribe_on_new_products === true"
            @click.prevent="unSubscribeOnProducts"
        >Отписаться на товары</button>
    </div>
</template>

<script>
    export default {
        props: {
            user: {
                type: Object,
                required: true
            },
        },
        data() {
            return {}
        },
        methods: {
            subscribeOnPosts() {
                axios.post('/subscribe/posts', {
                    'user_id': this.user.id
                }).then((response) => {
                    console.log(response.data)
                    this.user = response.data.user
                }).catch((error) => {
                    throw error
                })
            },
            subscribeOnProducts() {
                axios.post('/subscribe/products', {
                    'user_id': this.user.id
                }).then((response) => {
                    console.log(response.data)
                     this.user = response.data.user
                }).catch((error) => {
                    throw error
                })
            },
            unSubscribeOnPosts() {
                axios.post('/unsubscribe/posts', {
                    'user_id': this.user.id
                }).then((response) => {
                    console.log(response.data)
                     this.user = response.data.user
                }).catch((error) => {
                    throw error
                })
            },
            unSubscribeOnProducts() {
                axios.post('/unsubscribe/products', {
                    'user_id': this.user.id
                }).then((response) => {
                        console.log(response.data)
                     this.user = response.data.user
                }).catch((error) => {
                    throw error
                })
            }
        }
    }
</script>

<style scoped>

</style>
