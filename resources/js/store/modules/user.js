export default {
    state: {
        user: JSON.parse(localStorage.getItem('user')) || {}
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
            localStorage.setItem('user', JSON.stringify(payload))
        },
        async subscribeOnPosts({commit, getters}) {
            await axios.post('/api/subscribe/posts', {
                'user_id': getters.user.id
            }).then((response) => {
                commit('subscribeOnPosts', response.data.user)
            }).catch((error) => {
                throw error
            })
        },
        async subscribeOnProducts({commit, getters}) {
            await axios.post('/api/subscribe/products', {
                'user_id': getters.user.id
            }).then((response) => {
                commit('subscribeOnProducts',response.data.user)
            }).catch((error) => {
                throw error
            })
        },
        async unSubscribeOnPosts({commit, getters}) {
            await axios.post('/api/unsubscribe/posts', {
                'user_id': getters.user.id
            }).then((response) => {
                commit('unSubscribeOnPosts', response.data.user)
            }).catch((error) => {
                throw error
            })
        },
        async unSubscribeOnProducts({commit, getters}) {
            await axios.post('/api/unsubscribe/products', {
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
