<?php
//===============================================================//
// ********************** Public Section ************************//
//===============================================================//

// Home Section
$map->get('index','/',['App\Controllers\HomeController','index']);

// Auth Section
$map->get('login.GET', '/login', ['App\Controllers\AuthController','login']);
$map->post('login.POST', '/login', ['App\Controllers\AuthController','login',]);
$map->get('logout','/logout',['App\Controllers\AuthController','logout']);
$map->get('register.GET','/register',['App\Controllers\AuthController','register']);
$map->post('register.POST','/register',['App\Controllers\AuthController','register']);

// Products Section
$map->get('products','/products',['App\Controllers\ProductsController','index']);
$map->get('products.details','/product/details',['App\Controllers\ProductsController','details']);

// Cart Section
$map->get('cart.index','/cart',['App\Controllers\CartController','index']);
$map->get('cart.store','/cart/store',['App\Controllers\CartController','addToCart']);

//===============================================================//
// ********************* Admin Section *************************//
//===============================================================//
$map->get('admin.index', '/admin',['App\Controllers\Admin\HomeController','index']);

// Category Section
$map->get('admin.category.index','/admin/category',['App\Controllers\Admin\CategoryController','index']);
$map->get('admin.category.add','/admin/category/add',['App\Controllers\Admin\CategoryController','add']);
$map->post('admin.category.store','/admin/category/store',['App\Controllers\Admin\CategoryController','store']);
$map->get('admin.category.delete','/admin/category/delete',['App\Controllers\Admin\CategoryController','delete']);
$map->get('admin.category.edit','/admin/category/edit',['App\Controllers\Admin\CategoryController','edit']);
$map->post('admin.category.edit.POST','/admin/category/edit',['App\Controllers\Admin\CategoryController','edit']);

// Import Section
$map->get('admin.import.index','/admin/import',['App\Controllers\Admin\ImportController','index']);
$map->post('admin.import.search', '/admin/import/search',['App\Controllers\Admin\ImportController','search']);
$map->get('admin.import.details', '/admin/import/details',['App\Controllers\Admin\ImportController','details']);
$map->get('admin.import.store','/admin/import/store',['App\Controllers\Admin\ImportController','store']);

// Import List Section
$map->get('admin.importList','/admin/importList',['App\Controllers\Admin\ImportProductsController','index']);
$map->get('admin.importList.details','/admin/importList/details',['App\Controllers\Admin\ImportProductsController','details']);
$map->get('admin.importList.publish','/admin/importList/publish',['App\Controllers\Admin\ImportProductsController','publish']);
$map->get('admin.importList.delete','/admin/importList/delete',['App\Controllers\Admin\ImportProductsController','delete']);


// Products Section
$map->post('admin.products.store','/admin/products/store',['App\Controllers\Admin\ProductsController','store']);
$map->get('admin.products.index','/admin/products',['App\Controllers\Admin\ProductsController','index']);
$map->get('admin.products.delete','/admin/products/delete',['App\Controllers\Admin\ProductsController','delete']);
$map->get('admin.products.details','/admin/products/details',['App\Controllers\Admin\ProductsController','details']);
$map->get('admin.products.edit.GET','/admin/products/edit',['App\Controllers\Admin\ProductsController','edit']);
$map->post('admin.products.edit.POST','/admin/products/edit',['App\Controllers\Admin\ProductsController','edit']);




