<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Unsubscribe</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background: #f4f6f9; }
        .unsub-card {
            max-width: 500px;
            margin: 100px auto;
            padding: 40px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,.08);
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="unsub-card">
        @if(!empty($error) && $error)
            <h3 class="text-danger">Invalid Link</h3>
            <p class="text-muted mt-3">This unsubscribe link is not valid or has already been used.</p>
        @else
            <h3 class="text-success">Successfully Unsubscribed</h3>
            <p class="text-muted mt-3">You have been unsubscribed from our newsletter. You will no longer receive emails from us.</p>
        @endif
        <a href="{{ url('/') }}" class="btn btn-dark mt-3">Go to Homepage</a>
    </div>
</body>
</html>
