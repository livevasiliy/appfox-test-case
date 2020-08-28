<template>
    <li class="nav-item dropdown dropdown-list-toggle">
        <a
            href="#"
            data-toggle="dropdown"
            class="nav-link notification-toggle nav-link-lg"
            :class="{'beep': notifications.length > 0}"
        >
            <i class="far fa-bell"></i>
            {{ notifications.length }}
        </a>
        <div class="dropdown-menu dropdown-list dropdown-menu-right">
            <div class="dropdown-header" v-if="notifications.length > 0">
                Уведомления
                <div class="float-right">
                    <a
                        href="#"
                        class="check-as-read"
                        @click="makeAsRead"
                    >
                        Отметить как прочитанное
                    </a>
                </div>
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
                <notification-item
                    :id="notification.id"
                    :message="notification.message"
                    :date="notification.date"
                    :type-notify="notification.typeNotify"
                    :url="notification.url"
                    v-if="notifications.length !== 0"
                    v-for="notification in notifications"
                    :key="notification.id"
                    @readNotification="readNotification($event, notification.id)"
                />
                <notification-empty v-if="notifications.length === 0"/>
            </div>
            <div class="dropdown-footer text-center" v-if="notifications.length > 0">
                <a :href="`/notify/${userId}/list`">Просмотреть все <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </li>
</template>
<script>
    import NotificationItem from './NotificationItem';
    import NotificationEmpty from './NotificationEmpty';
    import {mapActions, mapGetters} from "vuex";

    export default {
        props: ['unreads', 'userId', 'user'],
        data() {
            return {
                unreadNotifications: []
            }
        },
        beforeMount: function () {
            for (let {id, type, data: {typeNotify, message, url}} of this.unreads) {
                this.unreadNotifications.push({id, type, typeNotify, message, url});
            }
        },
        mounted() {
            Echo.private('App.User.' + this.userId)
                .notification((notification) => {
                    this.unreadNotifications.push(notification);
                });
            this.$store.dispatch('fetchUnreadNotifications', this.unreadNotifications)
        },
        components: {
            NotificationItem,
            NotificationEmpty
        },
        methods: {
            ...mapActions(['makeAsRead', 'readNotification'])
        },
        computed: {
            ...mapGetters(['notifications'])
        }
    }
</script>
