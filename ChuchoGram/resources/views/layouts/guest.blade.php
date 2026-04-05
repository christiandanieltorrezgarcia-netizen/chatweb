<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ChuchoGram') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:          #1e2124;
            --bg-card:     #2f3136;
            --bg-input:    #40444b;
            --accent:      #7289da;
            --accent-dark: #5b6eae;
            --accent-glow: rgba(114,137,218,.25);
            --text:        #dcddde;
            --text-muted:  #72767d;
            --text-bright: #ffffff;
            --error:       #ed4245;
            --success:     #43b581;
            --border:      #202225;
            --radius:      8px;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: radial-gradient(circle at 1px 1px, rgba(114,137,218,.08) 1px, transparent 0);
            background-size: 32px 32px;
            pointer-events: none;
            z-index: 0;
        }

        .auth-wrapper {
            width: 100%;
            max-width: 440px;
            position: relative;
            z-index: 1;
        }

        .brand {
            text-align: center;
            margin-bottom: 28px;
        }

        .brand-logo {
            width: 64px; height: 64px;
            background: linear-gradient(135deg, var(--accent) 0%, #5865f2 100%);
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            margin-bottom: 14px;
            box-shadow: 0 8px 32px rgba(114,137,218,.3);
        }

        .brand-name {
            font-size: 26px;
            font-weight: 700;
            color: var(--text-bright);
        }

        .brand-tagline {
            font-size: 14px;
            color: var(--text-muted);
            margin-top: 4px;
        }

        .auth-card {
            background: var(--bg-card);
            border-radius: 16px;
            padding: 32px;
            border: 1px solid rgba(255,255,255,.04);
            box-shadow: 0 20px 60px rgba(0,0,0,.4);
        }

        .auth-card h2 {
            font-size: 22px;
            font-weight: 700;
            color: var(--text-bright);
            margin-bottom: 6px;
        }

        .auth-card .subtitle {
            font-size: 14px;
            color: var(--text-muted);
            margin-bottom: 24px;
        }

        .form-group { margin-bottom: 18px; }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid rgba(255,255,255,.04);
            border-radius: var(--radius);
            padding: 10px 14px;
            font-size: 15px;
            color: var(--text-bright);
            font-family: inherit;
            transition: border-color .2s, box-shadow .2s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px var(--accent-glow);
        }

        .form-input::placeholder { color: var(--text-muted); }

        .form-error {
            font-size: 12px;
            color: var(--error);
            margin-top: 6px;
        }

        .alert {
            padding: 12px 14px;
            border-radius: var(--radius);
            font-size: 14px;
            margin-bottom: 18px;
        }

        .alert-success {
            background: rgba(67,181,129,.1);
            color: var(--success);
            border: 1px solid rgba(67,181,129,.2);
        }

        .alert-error {
            background: rgba(237,66,69,.1);
            color: var(--error);
            border: 1px solid rgba(237,66,69,.2);
        }

        .alert-info {
            background: rgba(114,137,218,.1);
            color: #a8b4e8;
            border: 1px solid rgba(114,137,218,.2);
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .checkbox-group input[type="checkbox"] {
            width: 16px; height: 16px;
            accent-color: var(--accent);
            cursor: pointer;
        }

        .checkbox-group label {
            font-size: 14px;
            color: var(--text-muted);
            cursor: pointer;
        }

        .btn {
            width: 100%;
            padding: 11px 20px;
            border-radius: var(--radius);
            font-size: 15px;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            border: none;
            transition: background .2s, transform .1s;
        }

        .btn:active { transform: scale(.98); }

        .btn-primary {
            background: var(--accent);
            color: #fff;
            box-shadow: 0 4px 16px rgba(114,137,218,.3);
        }

        .btn-primary:hover { background: var(--accent-dark); }

        .auth-links {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
            flex-wrap: wrap;
            gap: 8px;
        }

        .auth-link {
            font-size: 13px;
            color: var(--accent);
            text-decoration: none;
            transition: color .15s;
        }

        .auth-link:hover { color: #a8b4e8; text-decoration: underline; }

        .divider {
            height: 1px;
            background: rgba(255,255,255,.06);
            margin: 22px 0;
        }

        .e2e-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            font-size: 12px;
            color: var(--text-muted);
            margin-top: 20px;
        }

        .e2e-badge .dot {
            width: 6px; height: 6px;
            background: var(--success);
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <div class="brand">
            <div class="brand-logo">💬</div>
            <div class="brand-name">ChuchoGram</div>
            <div class="brand-tagline">Tu espacio de chat seguro</div>
        </div>

        <div class="auth-card">
            {{ $slot }}
        </div>
    </div>
</body>
</html>