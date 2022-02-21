import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)


import Login from './components/auth/Login';
import Register from './components/auth/Regeister';
import Logout from './components/auth/logout';

import Home from './components/Home';


import EmployeCreate from './components/employee/create';
import EmployeAll from './components/employee/index';
import EmployeeEditPage from './components/employee/edit';

import SupplierCreate from './components/supplier/create';
import SupplierAll from './components/supplier/index';
import SupplierEdit from './components/supplier/edit';


import CategoryAll from './components/category/index';
import CategoryCreate from './components/category/create';
import CategoryEdit from './components/category/edit';


import Product from './components/product/index';
import ProductCreate from './components/product/create';
import ProductEdit from './components/product/edit';
import Stock from './components/product/stock'
import StockUpdate from './components/product/stock-update'


import Expense from './components/expense/index';
import ExpenseCreate from './components/expense/create';
import ExpenseEdit from './components/expense/edit';

import Salary from './components/salaray/index';
import SalaryShow from './components/salaray/show';

import EmployeeSalary from './components/salaray/all_employee';
import SalaryCreate from './components/salaray/create';

import Customer from './components/customer/index';
import CustomerCreate from './components/customer/create';
import CustomerEdit from './components/customer/edit';

import PoinToSale from './components/pos/pointosale';

//Order

import Order from './components/order/order';
import OrderView from './components/order/view';
import OrderSearch from './components/order/search';

const routes = [
    { path: '/', component: Login, name: 'login' },
    { path: '/logout', component: Logout, name: 'logout' },
    { path: '/register', component: Register, name: 'register' },
    { path: '/home', component: Home, name: 'home' },
    { path: '/employeecreate', component: EmployeCreate, name: 'EmployeeCreate' },
    { path: '/employee', component: EmployeAll, name: 'EmployeeIndex' },
    { path: '/employee-edit/:id', component: EmployeeEditPage, name: 'EmployeeEdit' },
    { path: '/supplier/create', component: SupplierCreate, name: 'SupplierCreate' },

    { path: '/supplier', component: SupplierAll, name: 'SupplierAll' },
    { path: '/supplier/edit/:id', component: SupplierEdit, name: 'SupplierEdit' },

    { path: '/category', component: CategoryAll, name: 'CategoryAll' },
    { path: '/category/create', component: CategoryCreate, name: 'CategoryCreate' },
    { path: '/category/edit/:id', component: CategoryEdit, name: 'CategoryEdit' },

    { path: '/product', component: Product, name: 'Product' },
    { path: '/product/create', component: ProductCreate, name: 'ProductCreate' },
    { path: '/product/edit/:id', component: ProductEdit, name: 'ProductEdit' },
    { path: '/stock', component: Stock, name: 'Stock' },
    { path: '/stock/update/:id', component: StockUpdate, name: 'StockUpdate' },

    { path: '/expense', component: Expense, name: 'Expense' },
    { path: '/expense/create', component: ExpenseCreate, name: 'ExpenseCreate' },
    { path: '/expense/edit/:id', component: ExpenseEdit, name: 'ExpenseEdit' },


    { path: '/salary', component: Salary, name: 'Salary' },
    { path: '/salary/show/:id', component: SalaryShow, name: 'SalaryShow' },
    { path: '/given-salary', component: EmployeeSalary, name: 'EmployeeSalary' },
    { path: '/pay-salary/:id', component: SalaryCreate, name: 'SalaryCreate' },

    { path: '/customer', component: Customer, name: 'Customer' },
    { path: '/customer/create', component: CustomerCreate, name: 'CustomerCreate' },
    { path: '/customer/edit/:id', component: CustomerEdit, name: 'CustomerEdit' },

    { path: '/pos', component: PoinToSale, name: 'PoinToSale' },

    { path: '/order', component: Order, name: 'Order' },
    { path: '/order/view/:id', component: OrderView, name: 'order-view' },
    { path: '/search', component: OrderSearch, name: 'OrderSearch' },
]

const router = new VueRouter({
    routes,
    mode: 'history',
    hashbang: false,
})

export default router;