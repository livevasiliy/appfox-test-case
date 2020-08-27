export default {
    state: {
        notifications: []
    },
    mutations: {
        makeAsRead(state, payload) {
            state.notifications = payload
        },
        readNotification(state, payload) {
            state.notifications = payload
        },
        fetchNotifications(state, payload) {
            state.notifications = payload
        },
        fetchUnreadNotifications(state, payload) {
            state.notifications = payload
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
                commit('readNotification',[
                    ...getters.notifications.slice(0, idx),
                    ...getters.notifications.slice(idx + 1)
                ]);
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
