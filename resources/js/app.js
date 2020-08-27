import NotificationList from "./components/Notification/NotificationList";

require('./bootstrap');
import Vue from 'vue';
import store from './store'
import Notifications from "./components/Notification/Notifications";
import Subscriptions from "./components/Subscriptions/Subscriptions";

Vue.component('notifications', Notifications).default
Vue.component('subscriptions', Subscriptions).default
Vue.component('list-notifications', NotificationList).default


new Vue({
    el: '#app',
    store
});
