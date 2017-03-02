
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('post', require('./components/Post.vue'));
Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('chat-log', require('./components/ChatLog.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));
Vue.component('search', require('./components/Search.vue'));
Vue.component('init', require('./components/Init.vue'));
Vue.component('feed', require('./components/Feed.vue'));
Vue.component('friend', require('./components/Friend.vue'));
Vue.component('unread', require('./components/UnreadNots.vue'));
Vue.component('notification', require('./components/Notification.vue'));

import { store } from './store'

const app = new Vue({
    el: '#app',
    store,
    data: {
        messages: [],
        usersInRoom: []
      },
    methods: {
      addMessage(message) {
        // add to existing methods
        this.messages.push(message);
        // persist to the databases
        axios.post('/messages', message).then(response => {
          // do whatever
        })
      }
    },
    created() {
      axios.get('/messages').then(response => {
        this.messages = response.data;
      });

      Echo.join('chatroom')
          .here((users) => {
            this.usersInRoom = users;
          })
          .joining((user) => {
            this.usersInRoom.push(user);
          })
          .leaving((users) => {
            this.usersInRoom = this.usersInRoom.filter(u => u != user)
          })
          .listen('MessagePosted', (e) => {
            this.messages.push({
              message: e.message.message,
              user: e.user
            });
          });
    }
});
