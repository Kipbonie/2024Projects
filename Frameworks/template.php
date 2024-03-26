<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle ?? "Compliance Framework Dashboard"; ?></title>
  <style>
    /* ... your custom CSS styles ... */
  </style>
</head>
<body>
  <h1>Compliance Framework Dashboard</h1>
  <ul class="frameworks">
    <?php foreach ($frameworks as $framework => $data): ?>
      <li>
        <a href="<?php echo $data["page"]; ?>">
          <?php echo $data["name"]; ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

  <?php if (isset($pageContent)): ?>
    <h2><?php echo $pageTitle; ?></h2>
    <?php echo $pageContent; ?>
  <?php endif; ?>
</body>
</html>
