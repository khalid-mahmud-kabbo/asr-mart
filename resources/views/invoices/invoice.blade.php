<h1>Invoice for Order #{{ $order->Order_Number }}</h1>
<p>Name: {{ $shipping['name'] ?? '' }}</p>
<p>Email: {{ $shipping['email'] ?? '' }}</p>
<p>Order Date: {{ $order->created_at }}</p>

<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($order->orderItems) && $order->orderItems->isNotEmpty())
            @foreach ($order->orderItems as $item)
                <tr>
                    <td>{{ $item->en_Product_Name }}</td>
                    <td>{{ $item->Quantity }}</td>
                    <td>{{ $item->Price }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3">No items found.</td>
            </tr>
        @endif
    </tbody>
</table>

<p>Total: {{ $order->Discount_Price }}</p>
