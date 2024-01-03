import { createRouter, createWebHistory } from "vue-router";
import HomePage from "../views/HomePage.vue";
import Login from "../views/LoginPage.vue";
import CreatePage from "../views/CreatePage.vue";
import EditPage from "../views/EditPage.vue";
import ShowPage from "../views/ShowPage.vue";
import auth from "../service/middleware";

const routes = [
  {
    path: "/",
    name: "login",
    component: Login,
  },
  {
    path: "/home",
    name: "home",
    component: HomePage,
    beforeEnter: auth,
  },
  {
    path: "/create",
    name: "create",
    component: CreatePage,
    beforeEnter: auth,
  },
  {
    path: "/edit",
    name: "edit",
    component: EditPage,
    beforeEnter: auth,
  },
  {
    path: "/show",
    name: "show",
    component: ShowPage,
    beforeEnter: auth,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
