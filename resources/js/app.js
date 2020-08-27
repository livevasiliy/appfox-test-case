require('./bootstrap');
import Vue from 'vue';
import Notifications from "./components/Notification/Notifications";
import Subscriptions from "./components/Subscriptions/Subscriptions";

Vue.component('notifications', Notifications).default
Vue.component('subscriptions', Subscriptions).default


new Vue({
    el: '#app'
});
