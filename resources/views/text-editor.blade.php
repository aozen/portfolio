<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- YES JQUERY ON 2023 -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea',
            height: 1100,
            menubar: false,
            resize: true,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code codesample',
                'stickytoolbar autoresize'
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code codesample',
            toolbar2: 'link image',
        });

        tinymce.PluginManager.add('stickytoolbar', function(editor, url) {
            editor.on('init', function() {
                setSticky();
            });

            $(window).on('scroll', function() {
                setSticky();
            });

            function setSticky() {
                var container = editor.editorContainer;
                var toolbars = $(container).find('.mce-toolbar-grp');
                var statusbar = $(container).find('.mce-statusbar');

                if (isSticky()) {
                    $(container).css({
                        paddingTop: toolbars.outerHeight()
                    });

                    if (isAtBottom()) {
                        toolbars.css({
                            top: 'auto',
                            bottom: statusbar.outerHeight(),
                            position: 'absolute',
                            width: '100%',
                            borderBottom: 'none'
                        });
                    } else {
                        toolbars.css({
                            top: 0,
                            bottom: 'auto',
                            position: 'fixed',
                            width: $(container).width(),
                            borderBottom: '1px solid rgba(0,0,0,0.2)'
                        });
                    }
                } else {
                    $(container).css({
                        paddingTop: 0
                    });

                    toolbars.css({
                        position: 'relative',
                        width: 'auto',
                        borderBottom: 'none'
                    });
                }
            }

            function isSticky() {
                var container = editor.editorContainer,
                    editorTop = container.getBoundingClientRect().top;

                if (editorTop < 0) {
                    return true;
                }

                return false;
            }

            function isAtBottom() {
                var container = editor.editorContainer,
                    editorTop = container.getBoundingClientRect().top;

                var toolbarHeight = $(container).find('.mce-toolbar-grp').outerHeight();
                var footerHeight = $(container).find('.mce-statusbar').outerHeight();

                var hiddenHeight = -($(container).outerHeight() - toolbarHeight - footerHeight);

                if (editorTop < hiddenHeight) {
                    return true;
                }

                return false;
            }
        });
    </script>
    <title>Rich Text Editor</title>
</head>

<body>
<h1>TinyMCE Text Editor</h1>
<form>
    <textarea id="mytextarea">Hello, World!</textarea>
</form>
</body>
</html>
