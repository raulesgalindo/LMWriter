<!-- Create the toolbar container -->
<div id="toolbar">
<button class="ql-bold">Bold</button>
<button class="ql-italic">Italic</button>
</div>
<input type="text" class="form-control" id="content" value="{{ $file->content }}">


<!-- Main Quill library -->
<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
  var editor = new Quill('#content', {
    modules: { toolbar: '#toolbar' },
    theme: 'snow'
  });
</script>