<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Web::index');
$routes->get('/page/(:segment)', 'Web::detail/$1'); 
$routes->get('/service/(:segment)', 'Web::detail/$1'); 
$routes->post('/contact-submit', 'Web::contactUs');
$routes->get('/apply-now', 'Web::applyNow');
$routes->post('/post-apply-now', 'Web::postApplyNow');
$routes->get('blogs', 'Web::blogLists');
$routes->get('blog/(:segment)', 'Web::blogDetail/$1');
$routes->get('sitemap.xml', 'Web::sitemapGenerate');





$routes->get('/login', 'Login::index');
$routes->post('/post-login', 'Login::index');

$routes->get('/dashboard', 'Dashboard::index', ['filter'=>'auth']);
$routes->get('/change-password', 'Dashboard::changePassword', ['filter' => 'auth']); 
$routes->post('/update-password', 'Dashboard::updatePassword', ['filter' => 'auth']); 

$routes->get('/logout', 'User::logout', ['filter'=>'auth']);

$routes->get('/users', 'User::index', ['filter'=>'auth']);
$routes->get('/fetchUsers', 'User::fetchUsers', ['filter'=>'auth']);
$routes->get('user/edit/(:num)', 'User::edit/$1', ['filter'=>'auth']);
$routes->post('user/update/(:num)', 'User::update/$1', ['filter'=>'auth']);

$routes->get('/services', 'Service::index', ['filter'=>'auth']);
$routes->get('/fetchServices', 'Service::fetchServices', ['filter'=>'auth']);
$routes->get('services/create', 'Service::create', ['filter'=>'auth']);
$routes->post('services/store', 'Service::store', ['filter'=>'auth']);
$routes->get('services/edit/(:num)', 'Service::edit/$1', ['filter'=>'auth']);
$routes->post('services/update/(:num)', 'Service::update/$1', ['filter'=>'auth']);

$routes->get('/pages', 'Page::index', ['filter'=>'auth']);
$routes->get('/fetchPages', 'Page::fetchPages', ['filter'=>'auth']);
$routes->get('pages/create', 'Page::create', ['filter'=>'auth']);
$routes->post('pages/store', 'Page::store', ['filter'=>'auth']);
$routes->get('pages/edit/(:num)', 'Page::edit/$1', ['filter'=>'auth']);
$routes->post('pages/update/(:num)', 'Page::update/$1', ['filter'=>'auth']);

$routes->get('/seo-meta', 'SeoMeta::index', ['filter' => 'auth']);
$routes->get('/fetchSeoMeta', 'SeoMeta::fetchSeoMeta', ['filter'=>'auth']);
$routes->get('seo-meta/create', 'SeoMeta::create', ['filter'=>'auth']);
$routes->post('seo-meta/store', 'SeoMeta::store', ['filter'=>'auth']);
$routes->get('seo-meta/edit/(:num)', 'SeoMeta::edit/$1', ['filter'=>'auth']);
$routes->post('seo-meta/update/(:num)', 'SeoMeta::update/$1', ['filter'=>'auth']);

$routes->get('/lead', 'Lead::index', ['filter'=>'auth']);
$routes->get('/fetchLeads', 'Lead::fetchLeads', ['filter'=>'auth']);
$routes->get('lead/edit/(:num)', 'Lead::edit/$1', ['filter'=>'auth']);
$routes->post('lead/update/(:num)', 'Lead::update/$1', ['filter'=>'auth']);
$routes->post('lead/save_remark', 'Lead::saveRemark', ['filter'=>'auth']);

$routes->get('/blog', 'Blog::index', ['filter'=>'auth']);
$routes->get('/fetchBlogs', 'Blog::fetchBlogs', ['filter'=>'auth']);
$routes->get('blog/create', 'Blog::create', ['filter'=>'auth']);
$routes->post('blog/store', 'Blog::store', ['filter'=>'auth']);
$routes->get('blog/edit/(:num)', 'Blog::edit/$1', ['filter'=>'auth']);
$routes->post('blog/update/(:num)', 'Blog::update/$1', ['filter'=>'auth']);



$routes->get('/homeBanner', 'HomeBanner::index', ['filter'=>'auth']);
$routes->get('/fetchBanners', 'HomeBanner::fetchBanners', ['filter'=>'auth']);
$routes->get('homeBanner/create', 'HomeBanner::create', ['filter'=>'auth']);
$routes->post('homeBanner/store', 'HomeBanner::store', ['filter'=>'auth']);
$routes->get('homeBanner/edit/(:num)', 'HomeBanner::edit/$1', ['filter'=>'auth']);
$routes->post('homeBanner/update/(:num)', 'HomeBanner::update/$1', ['filter'=>'auth']);

$routes->get('/homeTextSlider', 'HomeTextSlider::index', ['filter'=>'auth']);
$routes->get('/fetchTextSliders', 'HomeTextSlider::fetchTextSliders', ['filter'=>'auth']);
$routes->get('homeTextSlider/create', 'HomeTextSlider::create', ['filter'=>'auth']);
$routes->post('homeTextSlider/store', 'HomeTextSlider::store', ['filter'=>'auth']);
$routes->get('homeTextSlider/edit/(:num)', 'HomeTextSlider::edit/$1', ['filter'=>'auth']);
$routes->post('homeTextSlider/update/(:num)', 'HomeTextSlider::update/$1', ['filter'=>'auth']);

$routes->get('/partners', 'Partner::index', ['filter'=>'auth']);
$routes->get('/fetchPartners', 'Partner::fetchPartners', ['filter'=>'auth']);
$routes->get('partners/create', 'Partner::create', ['filter'=>'auth']);
$routes->post('partners/store', 'Partner::store', ['filter'=>'auth']);
$routes->get('partners/edit/(:num)', 'Partner::edit/$1', ['filter'=>'auth']);
$routes->post('partners/update/(:num)', 'Partner::update/$1', ['filter'=>'auth']);

