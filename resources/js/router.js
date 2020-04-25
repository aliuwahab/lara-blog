import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);
import About from './components/pages/About';

const routes = [
    {
        path: '/about',
        component: About
    }
];

export default new Router ({
    mode: 'history',
    routes
})
