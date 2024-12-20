
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.





# Laravel Blog Project

這是我基於 Laravel 框架開發的 Blog 項目，作為學習 Laravel 的練習。

## 學習資料來源

- **Laravel 5.7 實務專題範例教學**: 主流 PHP 開發框架入門  
- 觀看網址: [WebTechKnowledge YouTube Channel](https://www.youtube.com/@WebTechKnowledge)

## 安裝步驟

### 1. 安裝套件

- 安裝 **Jetstream** 與 **Livewire**：
```bash
  composer require laravel/jetstream
  php artisan jetstream:install livewire 
```  
- 安裝 **SweetAlert** ：
```bash
 composer require realrashid/sweet-alert
 php artisan sweetalert:publish
```
   
## 模板來源
Blog 模板：yaminshakil/Blog_Template
Admin 模板：yaminshakil/Admin_Template

## SweetAlert 警告視窗
SweetAlert 官方 CDN：SweetAlert CDN
https://cdnjs.com/libraries/sweetalert

## 功能介紹
註冊與登入
管理員,貼文管理與更改貼文發布狀態。
會員,可以新增、刪除貼文以及評論。

## 部署網址 [https://tutorialblog.ct.ws/](https://tutorialblog.ct.ws/)
-預設管理員：
帳號: admin@gmail.com
密碼: 12345678

-預設會員：
帳號: user@gmail.com
密碼: 12345678
