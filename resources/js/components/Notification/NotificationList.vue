<template>
    <ul>
        <NotificationEmpty v-if="notifications.length === 0" />
        <NotificationItem
            v-else
            :id="notification.id"
            :message="notification.message"
            :type-notify="notification.typeNotify"
            :url="notification.url"
            v-for="notification in this.notifications"
            :key="notification.id"
            @readNotification="readNotification($event)"
        />
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
