<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    </style>
</head>
<body>

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
    this.style.height = 'auto';
    this.style.height = Math.min(this.scrollHeight, 120) + 'px';
});

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
        // El polling lo mostrará en máximo 1 segundo
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
</script>
</body>
</html>