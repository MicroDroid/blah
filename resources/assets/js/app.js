require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import AuthService from './services/auth';

const getMetaContentByName = (name,content) => {
	var content = (content==null)?'content':content;
	var query = document.querySelector("meta[name='"+name+"']");
	if (query) return query.getAttribute(content);
}

const jwt = getMetaContentByName('jwt');
if (jwt)
	AuthService.receiveToken(jwt);

AuthService.checkAuth(() => {
	AuthService.setHeaders();
});

Vue.use(VueRouter);

const routes = [
	{name: 'home',         path: '/',                  component: require('./components/pages/Home.vue')},
];

const router = new VueRouter({
	linkActiveClass: 'active',
	routes
});

const app = new Vue({
	router
}).$mount('#app');
