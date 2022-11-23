<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CDT INVOICE</title>
    <style>
        @font-face {
  font-family: SourceSansPro;
  src: url(SourceSansPro-Regular.ttf);
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #0087C3;
  text-decoration: none;
}

body {
  position: relative;
  width: 17cm;
  height: 29.7cm;
  margin: 0 auto;
  color: #555555;
  background: #FFFFFF;
  font-family: Arial, sans-serif;
  font-size: 14px;
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 70px;
}

#company {
  float: right;
  text-align: right;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #0087C3;
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: right;
}

#invoice h1 {
  color: #0087C3;
  font-size: 1.1em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 20px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

table th {
  white-space: nowrap;
  font-weight: normal;
}

table td {
  text-align: right;
}

table td h3{
  color: #2474dc;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #FFFFFF;
  font-size: 1.2em;
  background: #2474dc;
}

table .desc {
  text-align: left;
}

table .unit {
  background: #DDDDDD;
}

table .qty {
}

table .total {
  background: #2474dc;
  color: #FFFFFF;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap;
  border-top: 1px solid #AAAAAA;
}

table tfoot tr:first-child td {
  border-top: none;
}

table tfoot tr:last-child td {
  color: #2474dc;
  font-size: 1.4em;
  border-top: 1px solid #2474dc;

}

table tfoot tr td:first-child {
  border: none;
}

#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #0087C3;
}

#notices .notice {
  font-size: 1.2em;
}

footer {center
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}

.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
</style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="public/img/cdt.png">
      </div>
      <div id="company">
        <h2 class="name">PT Cemerlang Digital Techindo</h2>
        <div><a href="mailto:company@example.com">sales@ditec.id</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">{{ $invoice->project->client_name }}</h2>
        </div>
        <div id="invoice">
          <h1>INVOICE <strong>#{{'INV/CDT/'. (\Carbon\Carbon::parse($invoice->created_at)->format('Y/m/').$invoice->id)}}</strong></h1>
          <div class="date">Date:{{ $invoice->created_at->format('D, d M Y') }}</div>
        </div>
      </div>
      <table border="0" cellspacing="1" cellpadding="1">
        <thead>
          <tr>
            <th class="no">No</th>
            <th class="unit">Project</th>
            <th class="unit">Item Name</th>
            <th class="total">Price</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="no">#</th>
            <th class="desc" style="text-align: center">@if ($invoice->project)
                <span class="cat-links">
                {{ $invoice->project->project_name }}
                </span>
            </th>
            @endif
            <th class="qty">{{ $invoice->item_name }}</th>
            <th class="total">@currency($invoice->price)</th>

            <tfoot>
                <tr>
                  <td colspan="2"></td>
                  <td colspan="2">SUBTOTAL @currency($invoice->price)</td>
                </tr>
                <tr>
                  <td colspan="2"></td>
                  <td colspan="2">GRAND TOTAL @currency($invoice->price)</td>
                </tr>
              </tfoot>
          </tr>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>