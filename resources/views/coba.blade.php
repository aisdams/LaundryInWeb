<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Invoice</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 14px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border: 1px solid #ddd;
    }
    th {
      background-color: #f2f2f2;
    }
    .invoice-header {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }
    .invoice-header h1 {
      margin: 0;
    }
    .invoice-header p {
      margin: 0;
    }
    .invoice-footer {
      margin-top: 20px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="invoice-header">
    <div>
      <h1>Invoice</h1>
      <p>Date: 10 March 2023</p>
    </div>
    <div>
      <p>Invoice Number: INV-123456</p>
    </div>
  </div>
  <table>
    <thead>
      <tr>
        <th>Description</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Item 1</td>
        <td>2</td>
        <td>$10.00</td>
        <td>$20.00</td>
      </tr>
      <tr>
        <td>Item 2</td>
        <td>1</td>
        <td>$20.00</td>
        <td>$20.00</td>
      </tr>
    </tbody>
  </table>
  <div class="invoice-footer">
    <p>Thank you for your business!</p>
  </div>
</body>
</html>