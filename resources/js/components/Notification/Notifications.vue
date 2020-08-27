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
            <div class="dropdown-header">
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
                    :type-notify="notification.typeNotify"
                    :url="notification.url"
                    v-if="notifications.length !== 0"
                    v-for="notification in notifications.slice(0, 5)"
                    :key="notification.id"
                    @readNotification="readNotification($event)"
                />
                <notification-empty v-if="notifications.length === 0"/>
            </div>
            <div class="dropdown-footer text-center">
                <a :href="`/notify/${JSON.parse(user).id}/list`">Просмотреть все <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </li>
</template>
<script>
    import NotificationItem from './NotificationItem';
    import NotificationEmpty from './NotificationEmpty';
    import {mapActions, mapGetters} from "vuex";

    export default {
        props: ['user', 'unreads'],
        beforeMount: function () {
            let _notifications = []
            for (let {id, type, data: {typeNotify, message, url}} of JSON.parse(this.unreads)) {
                _notifications.push({id, type, typeNotify, message, url});
            }
            this.$store.dispatch('fetchUnreadNotifications', _notifications)
        },
        created() {
            this.$store.dispatch('setUser', JSON.parse(this.user))
            this.$store.dispatch('fetchNotifications', this.user.id)
        },
        components: {
            NotificationItem,
            NotificationEmpty
        },
        methods: {
            ...mapActions(['makeAsRead', 'readNotification', 'fetchNotifications']),
        },
        computed: {
            ...mapGetters(['notifications'])
        }
    }
</script>
