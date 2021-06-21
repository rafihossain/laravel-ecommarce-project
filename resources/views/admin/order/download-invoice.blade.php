<!DOCTYPE html>
                    <html lang="en">
                        <head>
                            <meta charset="utf-8" />
                            <meta name="viewport" content="width=device-width, initial-scale=1" />

                            <title>A simple, clean, and responsive HTML invoice template</title>

                            <link rel="stylesheet" href="{{ asset('/') }}/admin/css/bootstap.min.css">

                            <!-- Invoice styling -->
                            <style>
                                body {
                                    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                                    text-align: center;
                                    color: #777;
                                }

                                body h1 {
                                    font-weight: 300;
                                    margin-bottom: 0px;
                                    padding-bottom: 0px;
                                    color: #000;
                                }

                                body h3 {
                                    font-weight: 300;
                                    margin-top: 10px;
                                    margin-bottom: 20px;
                                    font-style: italic;
                                    color: #555;
                                }

                                body a {
                                    color: #06f;
                                }

                                .invoice-box {
                                    max-width: 1000px;
                                    margin: auto;
                                    padding: 30px;
                                    border: 1px solid #eee;
                                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                                    font-size: 16px;
                                    line-height: 24px;
                                    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                                    color: #555;
                                }

                                .invoice-box table {
                                    width: 100%;
                                    line-height: inherit;
                                    text-align: left;
                                    border-collapse: collapse;
                                }

                                .invoice-box table td {
                                    padding: 5px;
                                    vertical-align: top;
                                }

                                .invoice-box table tr td:nth-child(2) {
                                    text-align: right;
                                }

                                .invoice-box table tr.top table td {
                                    padding-bottom: 20px;
                                }

                                .invoice-box table tr.top table td.title {
                                    font-size: 45px;
                                    line-height: 45px;
                                    color: #333;
                                }

                                .invoice-box table tr.information table td {
                                    padding-bottom: 40px;
                                }

                                .invoice-box table tr.heading td {
                                    background: #eee;
                                    border-bottom: 1px solid #ddd;
                                    font-weight: bold;
                                }

                                .invoice-box table tr.details td {
                                    padding-bottom: 20px;
                                }

                                .invoice-box table tr.item td {
                                    border-bottom: 1px solid #eee;
                                }

                                .invoice-box table tr.item.last td {
                                    border-bottom: none;
                                }

                                .invoice-box table tr.total td:nth-child(2) {
                                    border-top: 2px solid #eee;
                                    font-weight: bold;
                                }

                                @media only screen and (max-width: 600px) {
                                    .invoice-box table tr.top table td {
                                        width: 100%;
                                        display: block;
                                        text-align: center;
                                    }

                                    .invoice-box table tr.information table td {
                                        width: 100%;
                                        display: block;
                                        text-align: center;
                                    }
                                }
                            </style>
                        </head>

                        <body>
                            <div class="invoice-box">
                                <table>
                                    <tr class="top">
                                        <td colspan="2">
                                            <table>
                                                <tr>
                                                    <td class="title">
                                                        <img src="{{ asset('/') }}/admin/images/logo.png" alt="Company logo" style="width: 100%; max-width: 300px" />
                                                    </td>

                                                    <td>
                                                        Invoice No #: 0000{{ $order->id }}<br />
                                                        Date: {{ $order->created_at }}<br />
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr class="information">
                                        <td colspan="2">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <span style="border-bottom: 2px solid #ddd; font-size:18px;">Shipping Info:</span> <br/><br/>
                                                        {{ $shipping->full_name }}<br />
                                                        {{ $shipping->address }}<br />
                                                        {{ $shipping->phone }}<br />
                                                        {{ $shipping->email_address }}
                                                    </td>

                                                    <td>
                                                        <span style="border-bottom: 2px solid #ddd; font-size:18px;">Billing Info:</span> <br/><br/>
                                                        {{ $customer->first_name.' '.$customer->last_name }}<br />
                                                        {{ $customer->address }}<br />
                                                        {{ $customer->phone }}<br />
                                                        {{ $customer->email_address }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <table class="table" border="1">
                                        <thead class="card-header">
                                        <tr>
                                            <td><strong>Item</strong></td>
                                            <td><strong>Rate</strong></td>
                                            <td><strong>Experience</strong></td>
                                            <td><strong>Quantity</strong></td>
                                            <td><strong>Amount</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php ($sum = 0)
                                        @foreach($orderDetails as $orderDetail)
                                            <tr>
                                                <td>{{ $orderDetail->product_name }}</td>
                                                <td>{{ $orderDetail->product_price }} TK</td>
                                                <td>Experience Review</td>
                                                <td>{{ $orderDetail->product_quantity }}</td>
                                                <td>{{ $total = $orderDetail->product_price*$orderDetail->product_quantity }} TK</td>
                                            </tr>
                                            @php( $sum = $sum + $total )
                                        @endforeach
                                        </tbody>
                                        <tfoot class="card-footer">
                                            <tr>
                                                <td colspan="4" class="text-right"><strong>Total:</strong></td>
                                                <td class="text-right">{{ $sum }}TK</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </table>
                            </div>
                        </body>
                    </html>