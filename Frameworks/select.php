<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Select Compliance Framework</title>
  <!-- Link to Bootstrap CSS (you may use CDN link) -->
  <link rel="stylesheet" href="path/to/bootstrap.css">
  <style>
    body {
      background-color: f5f5f5;
      padding: 20px;
    }

    h1 {
      color: #007bff;
      text-align: center;
    }

    ul {
      list-style-type: none;
      padding: 0;
      text-align: center;
    }

    li {
      margin: 10px;
    }

    a {
      display: block;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    a:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Select a Compliance Framework</h1>
    <ul>
      <li><a href="iso.php?framework=ISO">ISO 27001</a></li>
      <li><a href="soc2.php?framework=SOC">SOC</a></li>
      <li><a href="HIPAA.php?framework=HIPAA">HIPAA</a></li>
      <li><a href="COBIT.php?framework=COBIT 5">COBIT 5</a></li>
      <li><a href="PCI.php?framework=PCI DSS">PCI DSS</a></li>
      <li><a href="NIST.php?framework=NIST">NIST</a></li>
      <li><a href="GDPR.php?framework=GDPR">GDPR</a></li>
    </ul>
  </div>

  <!-- Link to Bootstrap JS (you may use CDN link) -->
  <script src="path/to/bootstrap.js"></script>
</body>
</html>
