<template>
    <ul>
        <NotificationItem
            :id="notification.id"
            :message="notification.message"
            :type-notify="notification.typeNotify"
            :url="notification.url"
            v-if="notifications.length !== 0"
            v-for="notification in notifications"
            :key="notification.id"
            @readNotification="readNotification($event)"
        />
        <NotificationEmpty v-else />
    </ul>
</template>

<script>
    import NotificationItem from "./NotificationItem";
    import NotificationEmpty from "./NotificationEmpty";
    import {mapActions, mapGetters} from "vuex";
    export default {
        components: {
            NotificationItem,
            NotificationEmpty
        },
        methods: {
            ...mapActions(['makeAsRead', "readNotification"]),
        },
        computed: {
            ...mapGetters(['notifications'])
        }
    }
</script>
