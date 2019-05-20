
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('chat', require('./components/ChatComponent.vue').default);
Vue.component('chat-component', require('./components/ChatAll.vue').default);
Vue.component('form-component', require('./components/FormComponent.vue').default);

const app = new Vue({
    el: '#app',
    data: {
		messages : []
    },
    created() {
    	this.fetchMessages();
    	Echo.private('chat')
    	.listen('.App\\Events\\MessageSent',(data) => {
    		this.messages.push({
    			user : {
    				name : data.message.user.name
    			},
    			content : data.message.content
    		});
    	});

  //   	Echo.join(`chat`)
		// .here((users) => {
		    
		// })
		// .joining((user) => {
		//     console.log(user.name);
		// })
		// .leaving((user) => {
		//     console.log(user.name);
		// });
	},
    methods: {
    	fetchMessages() {
            axios.get('fetchMessage').then(response => {
                this.messages = response.data;
            });
        },
    	addMessage(message) {
    		this.messages.push({
    			user : {
    				name : message.name
    			},
    			content : message.message
    		});
    		axios.post('messages',message);
    	}
    }
});