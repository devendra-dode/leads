<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Apple Touch Icon -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('public/favicon_io/apple-touch-icon.png') ?>">

  <!-- Standard Favicons -->
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('public/favicon_io/favicon-16x16.png') ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('public/favicon_io/favicon-32x32.png') ?>">
  <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('public/favicon_io/android-chrome-192x192.png') ?>">
  <link rel="icon" type="image/png" sizes="512x512" href="<?= base_url('public/favicon_io/android-chrome-512x512.png') ?>">

  <!-- Manifest (Optional) -->
  <link rel="manifest" href="<?= base_url('public/favicon_io/site.webmanifest') ?>">

  <?php if (!empty($seoData)): ?>

    <title><?= ucwords(esc($seoData['meta_title'])) ?> | PaisaClick.com</title>

    <meta name="description" content="<?= esc($seoData['meta_description']) ?>">
    <meta name="keywords" content="<?= esc($seoData['meta_keywords']) ?>">

    <!-- Open Graph -->
    <meta property="og:title" content="<?= esc($seoData['og_title']) ?>">
    <meta property="og:description" content="<?= esc($seoData['og_description']) ?>">
    <meta property="og:image" content="<?= esc($seoData['og_image']) ?>">
    <meta property="og:url" content="<?= esc($seoData['page_url']) ?>">

    <!-- Twitter -->
    <meta name="twitter:title" content="<?= esc($seoData['twitter_title']) ?>">
    <meta name="twitter:description" content="<?= esc($seoData['twitter_description']) ?>">
    <meta name="twitter:image" content="<?= esc($seoData['twitter_image']) ?>">

    <!-- Canonical URL -->
    <link rel="canonical" href="<?= esc($seoData['canonical_url']) ?>">

    <!-- Schema JSON -->
    <script type="application/ld+json">
        <?= $seoData['schema_json'] ?>
    </script>

<?php endif; ?>

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome (for fad/dot-circle icons) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/duotone.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>public/assets/web/style.css?<?= time() ?>">
</head>

<body>

<?= view('web/templates/navigation') ?>  <!-- Include Header -->

