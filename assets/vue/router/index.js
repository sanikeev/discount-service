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
    { name: 'Home', path: '/', component: Index },
    { name: 'Admin', path: '/admin', component: adminIndex },
    { name: 'Rules', path: '/admin/rules', component: rulesIndex },
    { name: 'RulesCreate', path: '/admin/rules/create', component: rulesMutation },
    { name: 'RulesEdit', path: '/admin/rules/edit/:id', component: rulesMutation },
    { name: 'Services', path: '/admin/services', component: servicesIndex },
    { name: 'ServicesCreate', path: '/admin/services/create', component: servicesMutation },
    { name: 'ServicesEdit', path: '/admin/services/edit/:id', component: servicesMutation },
    // { path: '*', redirect: '/' }
  ],
});