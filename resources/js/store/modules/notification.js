export default {
    state: {
        notifications: JSON.parse(localStorage.getItem('notifications')) || []
    },
    mutations: {
        makeAsRead(state, payload) {
            state.notifications = payload
            localStorage.setItem('notifications', JSON.stringify(state.notifications))
        },
        readNotification(state, payload) {
            state.notifications = payload
            localStorage.setItem('notifications', JSON.stringify(state.notifications))
        },
        fetchNotifications(state, payload) {
            state.notifications = payload
            localStorage.setItem('notifications', JSON.stringify(state.notifications))
        },
        fetchUnreadNotifications(state, payload) {
            state.notifications = payload
            localStorage.setItem('notifications', JSON.stringify(state.notifications))
        }
    },
    actions: {
        makeAsRead({commit, getters}) {
            if (getters.notifications.length) {
                axios.post('/notify/read')
                    .then((response) => {
                        commit('makeAsRead', response.data)
                    }).catch((error) => {
                    throw error
                });
            }
        },
        readNotification({commit, getters}, payload) {
            const idx = getters.notifications.findIndex(notification => notification.id === payload);
            let {url} = getters.notifications.find(notification => notification.id === payload);

            axios.post(`/notify/read/${payload}`).then((response) => {
                let _notifications = [
                    ...getters.notifications.slice(0, idx),
                    ...getters.notifications.slice(idx + 1)
                ];
                commit('readNotification', _notifications);
            });
        },
        fetchNotifications({commit}, payload) {
            let _notifications = []
            Echo.private('App.User.' + payload)
                .notification((notification) => {
                    _notifications.push(notification)
                });
            commit('fetchNotifications', _notifications)
        },
        fetchUnreadNotifications({commit}, payload) {
            commit('fetchUnreadNotifications', payload)
        }
    },
    getters: {
        notifications: s => s.notifications
    }
}
