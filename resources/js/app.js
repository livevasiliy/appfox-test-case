require('./bootstrap');
import Vue from 'vue';

import Notifications from "./components/Notification/Notifications";

Vue.component('notifications', Notifications).default


new Vue({
    el: '#app'
});
