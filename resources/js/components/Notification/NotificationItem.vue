<template>
    <button class="dropdown-item dropdown-item-unread" @click="$emit('readNotification')">
        <NewPost v-if="typeNotify === 'new_post' "/>
        <NewProduct v-else-if="typeNotify === 'new_product' "/>
        <div class="dropdown-item-desc">
            {{ message }}
            <div class="time text-primary">{{ date }}</div>
        </div>
    </button>
</template>

<script>
    import NewPost from "./Types/NewPost";
    import NewProduct from "./Types/NewProduct";

    export default {
        props: [
            'message',
            'date',
            'typeNotify',
            'url',
            'id'
        ],
        name: "NotificationItem",
        components: {
            NewPost,
            NewProduct
        }
    }
</script>

<style scoped>

</style>
