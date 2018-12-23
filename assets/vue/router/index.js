import Vue from 'vue';
import VueRouter from 'vue-router';
import Index from "../views/Index";
import adminIndex from "../views/admin/Index";
import rulesIndex from "../views/admin/rules/Index";
import servicesIndex from "../views/admin/services/Index";
import rulesMutation from "../views/admin/rules/Mutation";
import servicesMutation from "../views/admin/services/Mutation";

Vue.use(VueRouter);

export default new VueRouter({
  mode: 'history',
  routes: [
    { path: '/', component: Index },
    { path: '/admin', component: adminIndex },
    { path: '/admin/rules', component: rulesIndex },
    { path: '/admin/rules/create', component: rulesMutation },
    { path: '/admin/rules/edit/{id}', component: rulesMutation },
    { path: '/admin/services', component: servicesIndex },
    { path: '/admin/services/create', component: servicesMutation },
    { path: '/admin/services/edit/{id}', component: servicesMutation },
    { path: '*', redirect: '/' }
  ],
});