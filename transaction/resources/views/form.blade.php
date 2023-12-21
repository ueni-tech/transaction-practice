<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>トランザクション</title>
</head>
<body>
  <form action="{{ route('sampleStore') }}" method="post">
    @csrf
    <input type="text" name="content1">
    <input type="text" name="content2">
    <button type="submit">送信</button>
  </form>

  @foreach ($notes as $note)
  <p>{{ $loop->iteration }}: {{ $note->content }}</p>
  @endforeach
</body>
</html>