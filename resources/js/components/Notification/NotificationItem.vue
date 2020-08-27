<template>
    <button class="d-inline-block dropdown-item dropdown-item-unread" @click.prevent="$emit('readNotification', id)">
        <NewPost v-if="typeNotify === 'new_post'" />
        <NewProduct v-else-if="typeNotify === 'new_product'" />
        <div class="dropdown-item-desc d-inline-block ml-2">
            {{ message }}
        </div>
    </button>
</template>

<script>
    import NewPost from "./Types/NewPost";
    import NewProduct from "./Types/NewProduct";

    export default {
        props: [
            'message',
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

<style scoped lang="scss">
    .dropdown-item-unread {
        background-color: #f8f9fa;
    }
</style>
