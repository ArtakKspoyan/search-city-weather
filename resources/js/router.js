import {createWebHistory, createRouter} from "vue-router";
import Home from "./pages/Home";
import Register from "./pages/Register";
import Login from "./pages/Login";
import Dashboard from "./pages/Dashboard";
import Weather from "./components/Weather";
import AddWeather from "./components/AddWeather";


export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'weather',
        path: '/weather',
        component: Weather
    },
    {
        name: 'addweather',
        path: '/weather/add',
        component: AddWeather
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
