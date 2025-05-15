<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chatbot dengan Llama</title>
</head>
<body>
    <h1>Chatbot LlaMA</h1>

    <form action="/ask-llama" id="chat-form" method="POST">
    @csrf
    <textarea name="prompt" placeholder="Tulis pertanyaanmu broo...." cols="60" rows="5">
        {{ old('prompt', session('prompt')) }}
    </textarea>
    <br>
    <button type="submit">Kirim wak</button>
    </form>

    @if (session('response'))
        <div style="margin-top: 20px;">
            <strong>Jawaban: </strong>
            <p>{{ session('response') }}</p>
            <textarea id="markdown" style="display: none;">{{ session('response') }}</textarea>
            <div id="preview"></div>
        </div>
    @endif


</body>

<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script>
    const markdown = document.getElementById('markdown').value;
    document.getElementById('preview').innerHTML = marked.parse(markdown);
</script>

</html>