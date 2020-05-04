<!DOCTYPE html>
<html>
  <head>
<!-- Core build with no theme, formatting, non-essential modules -->
<link href="//cdn.quilljs.com/1.2.3/quill.core.css" rel="stylesheet">
<script src="//cdn.quilljs.com/1.2.3/quill.core.js"></script>

<!-- Main Quill library -->
<script src="//cdn.quilljs.com/1.2.3/quill.js"></script>
<script src="//cdn.quilljs.com/1.2.3/quill.min.js"></script>

<!-- Theme included stylesheets -->
<link href="//cdn.quilljs.com/1.2.3/quill.snow.css" rel="stylesheet">
<link href="//cdn.quilljs.com/1.2.3/quill.bubble.css" rel="stylesheet">
  </head>
  <body>
    <div id="editor">
      <p>Hello World!</p>
      <p>Some initial <strong>bold</strong> text</p>
      <p><br></p>
    </div>
<script>
  var quill = new Quill('#editor', {
    theme: 'snow'
  });
</script>
  </body>
</html>