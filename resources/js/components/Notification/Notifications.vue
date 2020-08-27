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
                <a :href="`/notify/${this.userId}/list`">Просмотреть все <i class="fas fa-chevron-right"></i></a>
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
                if (this.notifications.length) {
                    axios.post('/notify/read')
                        .then((response) => {
                            console.log(response)
                            this.notifications = [];
                        });
                }
            },
            readNotification($event) {
                const idx = this.notifications.findIndex(notification => notification.id === $event);
                let {url} = this.notifications.find(notification => notification.id === $event);

                axios.post(`/notify/read/${$event}`).then((response) => {
                    console.log(response)
                    this.notifications = [
                        ...this.notifications.slice(0, idx),
                        ...this.notifications.slice(idx + 1)
                    ];
                });
                //window.location = url;
            }
        }
    }
</script>
