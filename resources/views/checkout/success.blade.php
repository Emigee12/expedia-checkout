<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmed</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .success-message { text-align: center; padding: 50px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); max-width: 500px; }
        h1 { color: #28a745; margin-bottom: 20px; }
        p { font-size: 16px; margin-bottom: 30px; }
        .back-btn { display: inline-block; padding: 12px 24px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; font-size: 16px; }
        .back-btn:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div class="success-message">
        <h1>✅ You've successfully booked your trip!</h1>
        {{-- <p>Your traveler and payment information has been stored in our database.</p> --}}
        <a href="/" class="back-btn">Go Home</a>
    </div>
</body>
</html>