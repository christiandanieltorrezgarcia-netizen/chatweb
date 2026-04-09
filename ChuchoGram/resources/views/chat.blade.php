<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<<<<<<< HEAD
    <title>Chuchogram</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --bg:       #17212b;
            --sidebar:  #232e3c;
            --input-bg: #1c2733;
            --accent:   #2b9af3;
            --bubble-out: #2b5278;
            --bubble-in:  #232e3c;
            --text:     #e8f4fd;
            --muted:    #8eadc7;
            --border:   #1c2733;
            --online:   #4caf73;
        }
        body { font-family: 'Inter', sans-serif; background: var(--bg); color: var(--text); height: 100vh; display: flex; flex-direction: column; overflow: hidden; }

        /* Header */
        .chat-header {
            background: var(--sidebar);
            padding: 14px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border);
            flex-shrink: 0;
        }
        .chat-header .title { font-size: 17px; font-weight: 600; display: flex; align-items: center; gap: 10px; }
        .chat-header .title .avatar {
            width: 36px; height: 36px; background: var(--accent); border-radius: 50%;
            display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px;
        }
        .lock-badge {
            display: flex; align-items: center; gap: 5px;
            font-size: 12px; color: #4caf73;
            background: rgba(76,175,80,.12); padding: 5px 12px; border-radius: 20px;
        }
        .lock-badge svg { width: 13px; height: 13px; fill: #4caf73; }
        .btn-logout {
            background: transparent; border: 1px solid rgba(255,255,255,.12); border-radius: 8px;
            padding: 7px 14px; color: var(--muted); font-size: 13px; cursor: pointer;
            font-family: inherit; transition: all .2s; margin-left: 12px;
        }
        .btn-logout:hover { background: rgba(229,57,53,.1); color: #ef9a9a; border-color: rgba(229,57,53,.3); }

        /* Messages */
        .messages-area {
            flex: 1; overflow-y: auto; padding: 16px 20px;
            display: flex; flex-direction: column; gap: 4px;
        }
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-thumb { background: #5d7a96; border-radius: 2px; }

        .msg-meta { font-size: 12px; color: var(--muted); margin-bottom: 4px; }
        .msg-meta strong { color: var(--accent); }

        .bubble-wrap { display: flex; flex-direction: column; }
        .bubble-wrap.out { align-items: flex-end; }
        .bubble-wrap.in  { align-items: flex-start; }

        .bubble {
            max-width: 68%; padding: 9px 13px; border-radius: 12px;
            font-size: 14px; line-height: 1.5; word-break: break-word;
        }
        .bubble-wrap.out .bubble { background: var(--bubble-out); border-bottom-right-radius: 3px; }
        .bubble-wrap.in  .bubble { background: var(--bubble-in); border-bottom-left-radius: 3px; border: 1px solid rgba(255,255,255,.05); }
        .bubble .time { font-size: 11px; color: rgba(255,255,255,.4); margin-top: 3px; display: block; text-align: right; }
        .bubble .sender-name { font-size: 12px; color: var(--accent); font-weight: 600; margin-bottom: 3px; display: block; }

        /* Input */
        .input-area {
            padding: 12px 16px; background: var(--sidebar);
            border-top: 1px solid var(--border); display: flex; gap: 10px; align-items: flex-end;
            flex-shrink: 0;
        }
        .input-area textarea {
            flex: 1; background: var(--input-bg); border: none; border-radius: 22px;
            padding: 10px 16px; font-size: 14px; color: var(--text); font-family: inherit;
            resize: none; max-height: 120px; min-height: 42px; line-height: 1.4;
        }
        .input-area textarea:focus { outline: none; }
        .input-area textarea::placeholder { color: #5d7a96; }
        .btn-send {
            width: 42px; height: 42px; background: var(--accent); border: none;
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            cursor: pointer; flex-shrink: 0; transition: background .2s, transform .1s;
        }
        .btn-send:hover  { background: #1a7ad4; }
        .btn-send:active { transform: scale(.9); }
        .btn-send svg { width: 20px; height: 20px; fill: #fff; transform: translateX(2px); }
=======
    <title>ChuchoGram</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --bg:         #17212b;
            --sidebar:    #232e3c;
            --input-bg:   #232e3c;
            --border:     #0d1117;
            --accent:     #2b9af3;
            --bubble-out: #2b5278;
            --bubble-in:  #232e3c;
            --bubble-ai:  #1e2d1e;
            --text:       #e8f4fd;
            --muted:      #6c8a9e;
            --online:     #43b581;
            --ai-color:   #7ec8a0;
            --footer-bg:  #1a2433;
        }
        body { font-family: 'Outfit', sans-serif; background: var(--bg); color: var(--text); height: 100vh; display: flex; overflow: hidden; }

        /* ── SIDEBAR ── */
        .sidebar { width: 220px; background: var(--sidebar); display: flex; flex-direction: column; border-right: 1px solid var(--border); flex-shrink: 0; }
        .sidebar-top { padding: 14px; border-bottom: 1px solid var(--border); display: flex; align-items: center; gap: 10px; }
        .chat-avatar { width: 42px; height: 42px; border-radius: 50%; background: var(--accent); display: flex; align-items: center; justify-content: center; font-size: 22px; flex-shrink: 0; }
        .chat-info .name { font-size: 15px; font-weight: 600; color: #fff; }
        .chat-info .members { font-size: 12px; color: var(--muted); }
        .sidebar-body { flex: 1; padding: 12px 8px; overflow-y: auto; }
        .section-label { font-size: 11px; font-weight: 700; color: var(--muted); text-transform: uppercase; letter-spacing: .5px; padding: 0 8px 8px; }
        .member { display: flex; align-items: center; gap: 8px; padding: 6px 8px; border-radius: 6px; transition: background .15s; }
        .member:hover { background: #2b3a4a; }
        .member-av { width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700; color: #fff; flex-shrink: 0; }
        .member-name { font-size: 13px; color: #aab8c2; flex: 1; }
        .online-dot { width: 8px; height: 8px; border-radius: 50%; background: var(--online); flex-shrink: 0; }
        .online-dot.ai { background: var(--accent); }
        .sidebar-footer { padding: 10px 8px; border-top: 1px solid var(--border); display: flex; align-items: center; gap: 8px; background: var(--footer-bg); }
        .my-av { width: 32px; height: 32px; border-radius: 50%; background: var(--accent); display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 700; color: #fff; flex-shrink: 0; }
        .my-info { flex: 1; overflow: hidden; }
        .my-info .name { font-size: 13px; font-weight: 600; color: #fff; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .my-info .status { font-size: 11px; color: var(--online); }
        .icon-btns { display: flex; gap: 2px; }
        .icon-btn { width: 28px; height: 28px; border-radius: 5px; background: transparent; border: none; color: var(--muted); cursor: pointer; display: flex; align-items: center; justify-content: center; transition: background .15s, color .15s; text-decoration: none; }
        .icon-btn:hover { background: #2b3a4a; color: var(--text); }
        .icon-btn svg { width: 16px; height: 16px; fill: currentColor; }

        /* ── MAIN ── */
        .main { flex: 1; display: flex; flex-direction: column; overflow: hidden; }
        .chat-header { padding: 12px 16px; border-bottom: 1px solid var(--border); display: flex; align-items: center; gap: 10px; background: var(--sidebar); flex-shrink: 0; }
        .header-av { width: 36px; height: 36px; border-radius: 50%; background: var(--accent); display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0; }
        .header-info .name { font-size: 15px; font-weight: 600; color: #fff; }
        .header-info .sub { font-size: 12px; color: var(--muted); }
        .e2e-badge { margin-left: auto; font-size: 11px; color: var(--online); background: rgba(67,181,129,.1); padding: 3px 10px; border-radius: 20px; display: flex; align-items: center; gap: 4px; white-space: nowrap; }

        /* ── MESSAGES ── */
        .msgs { flex: 1; overflow-y: auto; padding: 12px 16px; display: flex; flex-direction: column; gap: 6px; }
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-thumb { background: #1c2a38; border-radius: 2px; }
        .day-div { display: flex; align-items: center; gap: 10px; margin: 8px 0; color: var(--muted); font-size: 12px; }
        .day-div::before, .day-div::after { content: ''; flex: 1; height: 1px; background: #1c2a38; }
        .msg-row { display: flex; flex-direction: column; }
        .msg-row.out { align-items: flex-end; }
        .msg-row.in  { align-items: flex-start; }
        .msg-row.ai  { align-items: flex-start; }
        .sender-name { font-size: 12px; font-weight: 600; margin-bottom: 2px; padding: 0 4px; }
        .bubble { max-width: 68%; padding: 8px 12px 6px; font-size: 14px; line-height: 1.5; color: var(--text); word-break: break-word; }
        .msg-row.out .bubble { background: var(--bubble-out); border-radius: 14px 14px 4px 14px; }
        .msg-row.in  .bubble { background: var(--bubble-in); border-radius: 14px 14px 14px 4px; border: 1px solid #1c2a38; }
        .msg-row.ai  .bubble { background: var(--bubble-ai); border-radius: 14px 14px 14px 4px; border: 1px solid #2a4a2a; }
        .time { font-size: 11px; color: rgba(255,255,255,.35); float: right; margin-left: 10px; margin-top: 3px; }
        .mention-tag { color: var(--accent); font-weight: 600; background: rgba(43,154,243,.12); border-radius: 3px; padding: 0 2px; }
        .empty-state { text-align: center; color: var(--muted); margin: auto; padding: 40px 20px; }
        .empty-state .icon { font-size: 48px; margin-bottom: 12px; }
        .empty-state h3 { font-size: 18px; color: #fff; margin-bottom: 6px; }

        /* ── TYPING ── */
        .typing { display: none; align-items: center; gap: 6px; padding: 4px 16px; font-size: 13px; color: var(--muted); font-style: italic; }
        .typing-dots span { display: inline-block; width: 5px; height: 5px; background: var(--muted); border-radius: 50%; animation: bounce .8s infinite; }
        .typing-dots span:nth-child(2) { animation-delay: .2s; }
        .typing-dots span:nth-child(3) { animation-delay: .4s; }
        @keyframes bounce { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-4px)} }

        /* ── INPUT ── */
        .input-area { padding: 10px 16px 14px; flex-shrink: 0; }
        .input-box { background: var(--input-bg); border-radius: 22px; display: flex; align-items: flex-end; gap: 8px; padding: 8px 14px; }
        .input-box textarea { flex: 1; background: transparent; border: none; font-size: 14px; color: var(--text); font-family: inherit; resize: none; max-height: 120px; min-height: 24px; line-height: 1.5; padding: 2px 0; }
        .input-box textarea:focus { outline: none; }
        .input-box textarea::placeholder { color: #4a6070; }
        .btn-send { width: 34px; height: 34px; background: var(--accent); border: none; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; flex-shrink: 0; margin-bottom: 2px; transition: background .15s, transform .1s; }
        .btn-send:hover { background: #1a7ad4; }
        .btn-send:active { transform: scale(.92); }
        .btn-send svg { width: 16px; height: 16px; fill: #fff; transform: translateX(1px); }
        .input-hint { font-size: 11px; color: #4a6070; margin-top: 5px; padding: 0 4px; }
        .input-hint .mention { color: var(--accent); font-weight: 600; }

        /* ── ARCHIVOS ── */
        .bubble img { max-width: 100%; max-height: 300px; border-radius: 8px; display: block; margin-top: 4px; cursor: zoom-in; }
        .bubble video { max-width: 100%; max-height: 300px; border-radius: 8px; display: block; margin-top: 4px; }
        .bubble audio { width: 100%; margin-top: 4px; }
        .file-name { font-size: 12px; color: rgba(255,255,255,.5); margin-top: 4px; display: block; }

        /* ── BOTÓN ADJUNTAR ── */
        .attach-btn { width: 34px; height: 34px; background: transparent; border: none; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; color: var(--muted); transition: color .15s, background .15s; flex-shrink: 0; }
        .attach-btn:hover { color: var(--accent); background: rgba(43,154,243,.1); }
        .attach-btn svg { width: 18px; height: 18px; fill: currentColor; }
        .file-preview { display: none; align-items: center; gap: 8px; padding: 6px 14px; background: rgba(43,154,243,.1); border-radius: 8px; margin-bottom: 6px; font-size: 13px; color: var(--accent); }
        .file-preview.show { display: flex; }
        .file-preview .remove { cursor: pointer; color: var(--muted); font-size: 16px; margin-left: auto; }
        .file-preview .remove:hover { color: #ed4245; }

        /* ── GRABACIÓN ── */
        .record-btn { width: 34px; height: 34px; background: transparent; border: none; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; color: var(--muted); transition: color .15s, background .15s; flex-shrink: 0; }
        .record-btn:hover { color: var(--accent); background: rgba(43,154,243,.1); }
        .record-btn.recording { color: #ed4245; background: rgba(237,66,69,.15); animation: pulse 1s infinite; }
        .record-btn svg { width: 18px; height: 18px; fill: currentColor; }
        @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:.5} }
        .record-timer { font-size: 12px; color: #ed4245; font-weight: 600; display: none; padding: 0 4px; min-width: 32px; }
        .record-timer.show { display: block; }
        .cancel-record-btn { width: 28px; height: 28px; background: rgba(237,66,69,.15); border: none; border-radius: 50%; display: none; align-items: center; justify-content: center; cursor: pointer; flex-shrink: 0; transition: background .15s; }
        .cancel-record-btn:hover { background: rgba(237,66,69,.3); }
        .cancel-record-btn svg { width: 16px; height: 16px; fill: #ed4245; }

        /* ── LIGHTBOX ── */
        .lightbox { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.85); z-index: 1000; align-items: center; justify-content: center; cursor: zoom-out; }
        .lightbox.open { display: flex; }
        .lightbox img { max-width: 90vw; max-height: 90vh; border-radius: 8px; object-fit: contain; }
        .lightbox-close { position: fixed; top: 16px; right: 20px; font-size: 28px; color: #fff; cursor: pointer; background: none; border: none; line-height: 1; }
>>>>>>> origin/master
    </style>
</head>
<body>

<<<<<<< HEAD
<div class="chat-header">
    <div class="title">
        <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
        <div>
            <div>Chuchogram</div>
            <div style="font-size:12px;color:var(--muted);font-weight:400;">{{ auth()->user()->name }}</div>
        </div>
    </div>
    <div style="display:flex;align-items:center;gap:10px;">
        <div class="lock-badge">
            <svg viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
            Cifrado E2E
        </div>

        <a href="{{ route('password.change') }}" class="btn-logout" style="text-decoration:none; margin-right:8px;">
            🔑 Cambiar contraseña
        </a>
        <form method="POST" action="{{ route('logout') }}" style="margin:0;">
            @csrf
            <button type="submit" class="btn-logout">Salir</button>
        </form>
    </div>
</div>

<div class="messages-area" id="messagesArea">
    @forelse($messages as $mensaje)
        @php $isMe = $mensaje->user_id === auth()->id(); @endphp
        <div class="bubble-wrap {{ $isMe ? 'out' : 'in' }}">
            <div class="bubble">
                @if(!$isMe)
                    <span class="sender-name">{{ $mensaje->user->name ?? 'Usuario' }}</span>
                @endif
                {{ $mensaje->mensaje }}
                <span class="time">{{ $mensaje->created_at->format('H:i') }}</span>
            </div>
        </div>
    @empty
        <div style="text-align:center;color:#5d7a96;margin-top:40px;font-size:14px;">
            No hay mensajes aún. ¡Sé el primero en escribir!
        </div>
    @endforelse
</div>

<div class="input-area">
    <textarea id="msgInput" placeholder="Escribe un mensaje..." rows="1"></textarea>
    <button class="btn-send" id="btnSend">
        <svg viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
    </button>
</div>

<script>
const area = document.getElementById('messagesArea');
const input = document.getElementById('msgInput');
const csrf = document.querySelector('meta[name="csrf-token"]').content;
const ME = {{ auth()->id() }};

// Scroll to bottom
area.scrollTop = area.scrollHeight;

// Auto-resize textarea
input.addEventListener('input', function() {
=======
@php
    $aiUserId = (int) config('services.ai_user_id');
    $me = auth()->user();
    $memberColors = ['#2b9af3','#e07b39','#a55eea','#e91e8c','#f5a623','#26c6da','#66bb6a'];
    $colorMap = [];
    $idx = 0;
    foreach($messages->pluck('user')->unique('id')->filter() as $u) {
        $colorMap[$u->id] = $memberColors[$idx % count($memberColors)];
        $idx++;
    }
    $colorMap[$me->id] = '#5bc8f5';
@endphp

{{-- SIDEBAR --}}
<aside class="sidebar">
    <div class="sidebar-top">
        <div class="chat-avatar">💬</div>
        <div class="chat-info">
            <div class="name">ChuchoGram</div>
            <div class="members">Chat general</div>
        </div>
    </div>

    <div class="sidebar-body">
        <div class="section-label">En línea</div>
        <div class="member">
            <div class="member-av" style="background: var(--ai-color); color: #0d1f0d;">C</div>
            <div class="member-name">ChuchoGram IA</div>
            <div class="online-dot ai"></div>
        </div>
        <div class="member">
            <div class="member-av" style="background: var(--accent);">{{ strtoupper(substr($me->name, 0, 1)) }}</div>
            <div class="member-name">{{ $me->name }} <span style="font-size:11px;color:var(--muted)">(tú)</span></div>
            <div class="online-dot"></div>
        </div>
    </div>

    <div class="sidebar-footer">
        <div class="my-av">{{ strtoupper(substr($me->name, 0, 1)) }}</div>
        <div class="my-info">
            <div class="name">{{ $me->name }}</div>
            <div class="status">En línea</div>
        </div>
        <div class="icon-btns">
            <a href="{{ route('password.change') }}" class="icon-btn" title="Cambiar contraseña">
                <svg viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
            </a>
            <form method="POST" action="{{ route('logout') }}" style="margin:0">
                @csrf
                <button type="submit" class="icon-btn" title="Salir">
                    <svg viewBox="0 0 24 24"><path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5-5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg>
                </button>
            </form>
        </div>
    </div>
</aside>

{{-- MAIN --}}
<main class="main">
    <div class="chat-header">
        <div class="header-av">💬</div>
        <div class="header-info">
            <div class="name">General</div>
            <div class="sub">Menciona <strong style="color:var(--accent)">@chuchogram</strong> para hablar con la IA</div>
        </div>
        <div class="e2e-badge">🔒 Cifrado E2E</div>
    </div>

    <div class="msgs" id="msgsArea">
        @if($messages->isEmpty())
            <div class="empty-state">
                <div class="icon">👋</div>
                <h3>¡Bienvenido a ChuchoGram!</h3>
                <p>Sé el primero en escribir. Menciona <strong style="color:var(--accent)">@chuchogram</strong> para invocar la IA.</p>
            </div>
        @else
            <div class="day-div">Hoy</div>
            @foreach($messages as $msg)
            @php
                $isMe = $msg->user_id === $me->id;
                $isAi = $msg->user_id === $aiUserId;
                $name = $msg->user->name ?? 'Usuario';
                $color = $isAi ? '#7ec8a0' : ($isMe ? '#5bc8f5' : ($colorMap[$msg->user_id] ?? '#aab8c2'));
                $rowClass = $isAi ? 'ai' : ($isMe ? 'out' : 'in');
                $text = $msg->mensaje ? e($msg->mensaje) : '';
                $text = preg_replace('/(@chuchogram)/i', '<span class="mention-tag">$1</span>', $text);
                $fileUrl = $msg->file_path ? asset('storage/' . $msg->file_path) : null;
            @endphp
            <div class="msg-row {{ $rowClass }}">
                <div class="sender-name" style="color:{{ $color }}">
                    {{ $isAi ? 'ChuchoGram IA' : $name }}
                </div>
                <div class="bubble"
                    @if($fileUrl) data-file-url="{{ $fileUrl }}" data-file-type="{{ $msg->file_type }}" data-file-name="{{ $msg->file_name }}" @endif>
                    {!! $text !!}
                    <span class="time">{{ $msg->created_at->format('H:i') }}</span>
                </div>
            </div>
            @endforeach
        @endif
    </div>

    <div class="typing" id="typing">
        <div class="typing-dots"><span></span><span></span><span></span></div>
        ChuchoGram IA está escribiendo...
    </div>

    <div class="input-area">
        <div class="file-preview" id="filePreview">
            <span id="filePreviewName"></span>
            <span class="remove" id="removeFile">✕</span>
        </div>
        <div class="input-box">
            <button class="attach-btn" id="attachBtn" title="Adjuntar archivo">
                <svg viewBox="0 0 24 24"><path d="M16.5 6v11.5c0 2.21-1.79 4-4 4s-4-1.79-4-4V5a2.5 2.5 0 0 1 5 0v10.5c0 .55-.45 1-1 1s-1-.45-1-1V6H10v9.5a2.5 2.5 0 0 0 5 0V5c0-2.21-1.79-4-4-4S7 2.79 7 5v12.5c0 3.04 2.46 5.5 5.5 5.5s5.5-2.46 5.5-5.5V6h-1.5z"/></svg>
            </button>
            <button class="record-btn" id="recordBtn" title="Grabar audio">
                <svg viewBox="0 0 24 24"><path d="M12 14c1.66 0 3-1.34 3-3V5c0-1.66-1.34-3-3-3S9 3.34 9 5v6c0 1.66 1.34 3 3 3zm-1-9c0-.55.45-1 1-1s1 .45 1 1v6c0 .55-.45 1-1 1s-1-.45-1-1V5zm6 6c0 2.76-2.24 5-5 5s-5-2.24-5-5H5c0 3.53 2.61 6.43 6 6.92V21h2v-3.08c3.39-.49 6-3.39 6-6.92h-2z"/></svg>
            </button>
            <span class="record-timer" id="recordTimer">0:00</span>
            <button class="cancel-record-btn" id="cancelRecordBtn" title="Cancelar grabación">
                <svg viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
            </button>
            <input type="file" id="fileInput" style="display:none" accept="image/jpg,image/jpeg,image/png,image/gif,image/webp,audio/mp3,audio/ogg,audio/wav,video/mp4,video/webm">
            <textarea id="msgInput" placeholder="Escribe un mensaje..." rows="1"></textarea>
            <button class="btn-send" id="btnSend">
                <svg viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
            </button>
        </div>
        <div class="input-hint">
            <kbd>Enter</kbd> enviar · <kbd>Shift+Enter</kbd> nueva línea ·
            Menciona <span class="mention">@chuchogram</span> para la IA
        </div>
    </div>

    <div class="lightbox" id="lightbox">
        <button class="lightbox-close" id="lightboxClose">✕</button>
        <img id="lightboxImg" src="" alt="">
    </div>
</main>

<script>
const area    = document.getElementById('msgsArea');
const input   = document.getElementById('msgInput');
const typing  = document.getElementById('typing');
const csrf    = document.querySelector('meta[name="csrf-token"]').content;
const ME      = {{ $me->id }};
const AI_ID   = {{ $aiUserId }};
const MY_NAME = @json($me->name);

let selectedFile = null;

function scrollBottom() { area.scrollTop = area.scrollHeight; }
scrollBottom();

input.addEventListener('input', function () {
>>>>>>> origin/master
    this.style.height = 'auto';
    this.style.height = Math.min(this.scrollHeight, 120) + 'px';
});

<<<<<<< HEAD
// Enter to send
input.addEventListener('keydown', function(e) {
    if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        sendMessage();
    }
});

document.getElementById('btnSend').addEventListener('click', sendMessage);

    async function sendMessage() {
        const text = input.value.trim();
        if (!text) return;
        input.value = '';
        input.style.height = 'auto';

        try {
            await fetch('/chat', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
                body: JSON.stringify({ mensaje: text })
            });
        } catch(e) { console.error(e); }
    }

// Agregar burbuja al DOM
function appendBubble(sender, texto, isOut) {
    // Quitar mensaje de "no hay mensajes" si existe
    const empty = area.querySelector('div[style*="text-align:center"]');
    if (empty) empty.remove();

    const wrap = document.createElement('div');
    wrap.className = 'bubble-wrap ' + (isOut ? 'out' : 'in');

    const time = new Date().toTimeString().slice(0, 5);
    const senderName = !isOut ? `<span class="sender-name">${sender}</span>` : '';

    wrap.innerHTML = `
        <div class="bubble">
            ${senderName}
            ${texto}
            <span class="time">${time}</span>
        </div>`;

    area.appendChild(wrap);
    area.scrollTop = area.scrollHeight;
}

// Polling cada 1 segundo — trae mensajes nuevos de TODOS incluido yo mismo
let lastMessageId = {{ $messages->isNotEmpty() ? $messages->last()->id : 0 }};

setInterval(async () => {
    try {
        const res = await fetch(`/chat/poll?last_id=${lastMessageId}`, {
            headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': csrf }
        });
        const data = await res.json();

        data.forEach(msg => {
            lastMessageId = msg.id;
            const isOut = msg.user_id === ME;
            appendBubble(msg.sender, msg.mensaje, isOut);
        });
    } catch(e) {}
}, 1000);
=======
input.addEventListener('keydown', function (e) {
    if (e.key === 'Enter' && !e.shiftKey) { e.preventDefault(); sendMessage(); }
});
document.getElementById('btnSend').addEventListener('click', sendMessage);

document.getElementById('attachBtn').addEventListener('click', () => {
    document.getElementById('fileInput').click();
});

document.getElementById('fileInput').addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;
    if (file.size > 50 * 1024 * 1024) {
        alert('El archivo no puede superar 50MB.');
        this.value = '';
        return;
    }
    selectedFile = file;
    document.getElementById('filePreviewName').textContent = '📎 ' + file.name;
    document.getElementById('filePreview').classList.add('show');
});

document.getElementById('removeFile').addEventListener('click', () => {
    selectedFile = null;
    document.getElementById('fileInput').value = '';
    document.getElementById('filePreview').classList.remove('show');
});

async function sendMessage() {
    const text = input.value.trim();
    if (!text && !selectedFile) return;

    input.value = '';
    input.style.height = 'auto';

    const formData = new FormData();
    if (text) formData.append('mensaje', text);
    if (selectedFile) formData.append('file', selectedFile);
    formData.append('_token', csrf);

    appendMsg({
        userId: ME, sender: MY_NAME,
        mensaje: text || null,
        file: selectedFile ? { type: selectedFile.type, name: selectedFile.name, url: URL.createObjectURL(selectedFile) } : null,
        isAi: false, isMe: true, time: now()
    });

    selectedFile = null;
    document.getElementById('fileInput').value = '';
    document.getElementById('filePreview').classList.remove('show');

    if (text && text.toLowerCase().includes('@chuchogram')) {
        typing.style.display = 'flex';
        scrollBottom();
    }

    try {
        await fetch('/chat', { method: 'POST', body: formData });
    } catch(e) { console.error(e); }
    finally { typing.style.display = 'none'; }
}

function now() {
    return new Date().toLocaleTimeString('es', { hour: '2-digit', minute: '2-digit' });
}

function escHtml(str) {
    return str.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
}

function renderFile(file) {
    if (!file || !file.url) return '';
    if (file.type && file.type.startsWith('image/') || /\.(jpg|jpeg|png|gif|webp)$/i.test(file.url)) {
        return `<img src="${file.url}" alt="${file.name ?? ''}" onclick="openLightbox(this.src)">`;
    }
    if (file.type && file.type.startsWith('audio/') || /\.(mp3|ogg|wav)$/i.test(file.url)) {
        return `<audio controls src="${file.url}"></audio>`;
    }
    if (file.type && file.type.startsWith('video/') || /\.(mp4|webm)$/i.test(file.url)) {
        return `<video controls src="${file.url}"></video>`;
    }
    return `<span class="file-name">📎 ${file.name ?? 'Archivo'}</span>`;
}

function appendMsg({ userId, sender, mensaje, file, isAi, isMe, time }) {
    const empty = area.querySelector('.empty-state');
    if (empty) {
        empty.remove();
        const d = document.createElement('div');
        d.className = 'day-div'; d.textContent = 'Hoy';
        area.appendChild(d);
    }

    const rowClass = isAi ? 'ai' : (isMe ? 'out' : 'in');
    const color    = isAi ? '#7ec8a0' : (isMe ? '#5bc8f5' : '#aab8c2');
    const name     = isAi ? 'ChuchoGram IA' : sender;
    const htmlText = mensaje ? escHtml(mensaje).replace(/(@chuchogram)/gi, '<span class="mention-tag">$1</span>') : '';
    const htmlFile = file ? renderFile(file) : '';

    const row = document.createElement('div');
    row.className = 'msg-row ' + rowClass;
    row.innerHTML = `
        <div class="sender-name" style="color:${color}">${name}</div>
        <div class="bubble">${htmlText}${htmlFile}<span class="time">${time}</span></div>`;
    area.appendChild(row);
    scrollBottom();
}

document.querySelectorAll('.bubble[data-file-url]').forEach(bubble => {
    const url  = bubble.dataset.fileUrl;
    const type = bubble.dataset.fileType + '/';
    const name = bubble.dataset.fileName;
    bubble.insertAdjacentHTML('afterbegin', renderFile({ url, type, name }));
});

let lastId = {{ $messages->isNotEmpty() ? $messages->last()->id : 0 }};

setInterval(async () => {
    try {
        const res  = await fetch(`/chat/poll?last_id=${lastId}`, {
            headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': csrf }
        });
        const data = await res.json();
        data.forEach(msg => {
            lastId = msg.id;
            if (msg.user_id === ME) return;
            typing.style.display = 'none';
            appendMsg({
                userId:  msg.user_id,
                sender:  msg.sender,
                mensaje: msg.mensaje,
                file:    msg.file_path ? { url: msg.file_path, type: msg.file_type + '/', name: msg.file_name } : null,
                isAi:    msg.user_id === AI_ID,
                isMe:    false,
                time:    now(),
            });
        });
    } catch(e) {}
}, 2000);

// ── LIGHTBOX ──
function openLightbox(src) {
    document.getElementById('lightboxImg').src = src;
    document.getElementById('lightbox').classList.add('open');
}
document.getElementById('lightbox').addEventListener('click', () => {
    document.getElementById('lightbox').classList.remove('open');
});
document.getElementById('lightboxClose').addEventListener('click', (e) => {
    e.stopPropagation();
    document.getElementById('lightbox').classList.remove('open');
});

// ── GRABACIÓN DE AUDIO ──
let mediaRecorder  = null;
let audioChunks    = [];
let recordInterval = null;
let recordSeconds  = 0;
let cancelled      = false;

const recordBtn       = document.getElementById('recordBtn');
const recordTimer     = document.getElementById('recordTimer');
const cancelRecordBtn = document.getElementById('cancelRecordBtn');

function stopRecordingUI() {
    clearInterval(recordInterval);
    recordSeconds = 0;
    recordTimer.textContent = '0:00';
    recordTimer.classList.remove('show');
    recordBtn.classList.remove('recording');
    cancelRecordBtn.style.display = 'none';
}

recordBtn.addEventListener('click', async () => {
    if (mediaRecorder && mediaRecorder.state === 'recording') {
        cancelled = false;
        mediaRecorder.stop();
        return;
    }

    try {
        const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
        audioChunks  = [];
        cancelled    = false;
        mediaRecorder = new MediaRecorder(stream);

        mediaRecorder.ondataavailable = e => audioChunks.push(e.data);

        mediaRecorder.onstop = async () => {
            stopRecordingUI();
            stream.getTracks().forEach(t => t.stop());

            if (cancelled) return;

            const blob = new Blob(audioChunks, { type: 'audio/ogg; codecs=opus' });
            const file = new File([blob], 'audio-' + Date.now() + '.ogg', { type: 'audio/ogg' });

            const formData = new FormData();
            formData.append('file', file);
            formData.append('_token', csrf);

            appendMsg({
                userId: ME, sender: MY_NAME, mensaje: null,
                file: { type: 'audio/', name: file.name, url: URL.createObjectURL(blob) },
                isAi: false, isMe: true, time: now()
            });

            try {
                await fetch('/chat', { method: 'POST', body: formData });
            } catch(e) { console.error(e); }
        };

        mediaRecorder.start();
        recordBtn.classList.add('recording');
        recordTimer.classList.add('show');
        cancelRecordBtn.style.display = 'flex';

        recordInterval = setInterval(() => {
            recordSeconds++;
            const m = Math.floor(recordSeconds / 60);
            const s = recordSeconds % 60;
            recordTimer.textContent = m + ':' + String(s).padStart(2, '0');
        }, 1000);

    } catch(e) {
        alert('No se pudo acceder al micrófono. Verifica los permisos.');
    }
});

cancelRecordBtn.addEventListener('click', () => {
    if (mediaRecorder && mediaRecorder.state === 'recording') {
        cancelled = true;
        mediaRecorder.stop();
    }
});
>>>>>>> origin/master
</script>
</body>
</html>