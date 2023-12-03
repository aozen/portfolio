@extends('components.master')
@section('title', ' | Editor')
@section('head_js')
    <script src="https://cdn.tiny.cloud/1/ig8t0mxa35onbhql3exl3b6p8fi76djyi00620a7pduivaay/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
@section('content')
    <div class="mx-6">
        <textarea class="tinyMce"></textarea>
    </div>
@endsection

@section('tail_js')
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            tinymce.init({
                selector: 'textarea',
                plugins: 'codesample code link autolink autosave charmap emoticons fullscreen help image lists media preview quickbars searchreplace table wordcount',
                toolbar1: 'undo redo | styles | bold italic | numlist bullist | outdent indent',
                toolbar2: 'table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
                toolbar3: 'codesample code copySourceCode | image media link emoticons charmap | restoredraft searchreplace wordcount | fullscreen preview | help',
                image_list: '{{ route('feature.latest-images') }}',
                height: 1100,
                fullscreen_native: true,
                image_caption: true,
                image_title: true,
                link_context_toolbar: true,
                link_default_target: '_blank',
                codesample_global_prismjs: true,
                setup: function (editor) {
                    editor.ui.registry.addButton('copySourceCode', {
                        icon: 'copy',
                        tooltip: 'Copy Source Code',
                        onAction: function () {
                            let content = editor.getContent();

                            navigator.clipboard.writeText(content).then(function () {
                                console.log('Source code copied to clipboard');
                            }).catch(function (err) {
                                console.error('Unable to copy source code to clipboard', err);
                            });
                        }
                    });
                },
            });
        });

    </script>
@endsection
