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
                    @readNotification="readNotification($event, notification.id)"
                />
                <notification-empty v-if="notifications.length === 0"/>
            </div>
            <div class="dropdown-footer text-center">
                <a :href="`/users/${this.userId}/notify/list`">Просмотреть все <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </li>
</template>
<script>
    import NotificationItem from './NotificationItem';
    import NotificationEmpty from './NotificationEmpty';

    export default {
        props: ['userId', 'unreads'],
        data() {
            return {
                notifications: []
            }
        },
        beforeMount: function () {
            for (let {id, type, data: {typeNotify, message, url}} of JSON.parse(this.unreads)) {
                this.notifications.push({id, type, typeNotify, message, url});
            }
        },
        created() {
            console.log('NOTIFICATIONS MOUNTED')
            Echo.private('App.User.' + this.userId)
                .notification((notification) => {
                    this.notifications.push(notification)
                });
        },
        components: {
            NotificationItem,
            NotificationEmpty
        },
        methods: {
            makeAsRead() {
                if (this.unreadNotifications.length) {
                    axios.post('http://appfox.loc/notify/read')
                        .then((response) => {
                            this.unreadNotifications = [];
                        });
                }
            },
            readNotification($event, id) {
                const idx = this.unreadNotifications.findIndex(notification => notification.id === id);
                let {url} = this.unreadNotifications.find(notification => notification.id === id);
                window.location = url;
                axios.post(`http://appfox.loc/notify/read/${id}`);
                this.notifications = [
                    ...this.notifications.slice(0, idx),
                    ...this.notifications.slice(idx + 1)
                ];
            }
        }
    }
</script>
