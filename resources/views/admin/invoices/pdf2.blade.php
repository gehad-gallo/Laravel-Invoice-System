<!DOCTYPE html>
<html>
<head>
<style>
   body {
          margin: 0;
          padding: 0;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
      }

      .content {
          padding: 10px;
          border: 1px inset;
          width: 95%;
          max-width: 800px; /* Adjust as needed */
          background-color: #fff; /* Optional background color for the content */
      }
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  border:15px;
}

th {
  background-color: #dddddd;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;

}
   .left {
    float: left;
  }

  .right {
    float: right;
  }

  .clearfix::after {
    content: "";
    clear: both;
    display: table;
  }
</style>
</head>
<body style="border-style: inset, width: 90%;">
<div class="content">
  <br><br>
<div> 
  <h5>Pixi</h5>
</div><br>

<div class="clearfix">  
  <div class="left">Office 102, Ninth Street</div>
  <div class="right">INVOICE #{{$order->id}}</div>
</div> 
<div class="clearfix">
  <div class="left">New cairo, Egypt</div>
  <div class="right">Date :{{$order->date}}</div>
</div>
<p class="mb-0">+20 222 456 7891</p>
  <table>
    <tr>
      <th></th>
      <th>Item</th>
      <th>Price</th>
      <th>Qty</th>
      <th>Cost</th>
    </tr>

      @isset($items)
      @foreach($items as $item)
          <tr>
            <td></td>
            <td>{{$item->item}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->quantity * $item->price}}</td>
          </tr>
      @endforeach
      @endisset
     
  </table>
<br>
<div class="clearfix">
  <div class="left">Salesperson: {{$invoiceSalesName}}</div>
  <div class="right">Subtotal:   {{$order->orderTotalCost()}}</div>
</div>

<div class="clearfix">
  <div class="left"></div>
  <div class="right">Discount: 00.00     </div>
</div>

<div class="clearfix">
  <div class="left"></div>
  <div class="right">Tax: 50.00      </div>
</div>

<div class="clearfix">
  <div class="left"></div>
  <div class="right">Total: {{$order->orderTotalCost() + 50     }}</div>
</div>

<br><br>
 <span>Note:</span>
            <span>Exchange and return within 14 days. Thank You!</span>
</div>
</body>


</html>

