<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1>Feedback Form</h1>

    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('feedback.submit') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>

      <div class="form-group">
        {{-- <label for="email1">Email</label>
        <input type="email1" class="form-control" id="email1" name="email1" required> --}}
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
<div class="form-group">
  <label for="message">Message</label>
  <textarea class="form-control" id="message" name="message" rows="3" maxlength="300" required oninput="updateCharCount()"></textarea>
  <small id="charCount" class="form-text text-muted">0/300 characters</small>
</div>

<div class="form-group d-flex justify-content-between">
  <button type="submit" class="btn btn-primary">Submit</button>
</div> <script>
    function updateCharCount() {
      const message = document.getElementById('message');
      const count = message.value.length;
      document.getElementById('charCount').innerText = `${count}/300 characters`;
    }
    function generateMessage() {
  const messages = [
    "Your team deserves a standing ovation 👏",
    "Website looks great — like, award-winning great!",
    "Wow, I actually enjoyed filling out this form 😄",
    "Can I get your dev's autograph?",
    "If I could rate this 11/10, I would."
  ];
  const randomMsg = messages[Math.floor(Math.random() * messages.length)];
  document.getElementById('message').value = randomMsg;
  updateCharCount();
}

  </script>
</body>
</html>
