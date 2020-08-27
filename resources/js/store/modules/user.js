export default {
    state: {
        user: {}
    },
    mutations: {
        setUser(state, payload) {
            state.user = payload
        },
        subscribeOnPosts(state, payload) {
            state.user = payload
        },
        subscribeOnProducts(state, payload) {
            state.user = payload
        },
        unSubscribeOnPosts(state, payload) {
            state.user = payload
        },
        unSubscribeOnProducts(state, payload) {
            state.user = payload
        },
    },
    actions: {
        setUser({commit}, payload) {
            commit('setUser', payload)
        },
        subscribeOnPosts({commit, getters}) {
            axios.post('/api/subscribe/posts', {
                'user_id': getters.user.id
            }).then((response) => {
                commit('subscribeOnPosts', response.data.user)
            }).catch((error) => {
                throw error
            })
        },
        subscribeOnProducts({commit, getters}) {
            axios.post('/api/subscribe/products', {
                'user_id': getters.user.id
            }).then((response) => {
                commit('subscribeOnProducts',response.data.user)
            }).catch((error) => {
                throw error
            })
        },
        unSubscribeOnPosts({commit, getters}) {
            axios.post('/api/unsubscribe/posts', {
                'user_id': getters.user.id
            }).then((response) => {
                commit('unSubscribeOnPosts', response.data.user)
            }).catch((error) => {
                throw error
            })
        },
        unSubscribeOnProducts({commit, getters}) {
            axios.post('/api/unsubscribe/products', {
                'user_id': getters.user.id
            }).then((response) => {
                commit('unSubscribeOnProducts', response.data.user)
            }).catch((error) => {
                throw error
            })
        }
    },
    getters: {
        user: s => s.user
    }
}
