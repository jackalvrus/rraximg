<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php include 'common/head.php'; ?>
</head>
<body>

    <?php
    include 'common/header.php';
    include 'common/loggedIn.php';

    if($username) {
    ?>
        <div class="uploadCentering">
            <div class="uploadWrapper">
                <div class="addFiles btn btn-default btn-lg fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                    <input id="fileupload" type="file" name="files[]" multiple>
                </div>

                <div id="progress" class="progressWrapper progress">
                    <div class="progressBar progress-bar progress-bar-success progress-bar-striped active"></div>
                </div>

                <div id="files" class="uploadedFiles files"></div>
            </div>
        </div>
    <?php
    } else {
        echo $loginMessage;
    }
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/vendor/jquery.ui.widget.js"></script>
    <script src="js/load-image.all.min.js"></script>
    <script src="js/jquery.iframe-transport.js"></script>
    <script src="js/jquery.fileupload.js"></script>
    <script src="js/jquery.fileupload-process.js"></script>
    <script src="js/jquery.fileupload-image.js"></script>
    <script src="js/jquery.fileupload-validate.js"></script>

    <script>
    /*jslint unparam: true, regexp: true */
    /*global window, $ */
    $(function () {
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = '/img/processAjax.php';

        $('#fileupload').fileupload({
            url: url,
            dataType: 'json',
            autoUpload: true,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            disableImageResize: /Android(?!.*Chrome)|Opera/
                .test(window.navigator.userAgent),
            imageMaxWidth: 2048,
            imageMaxHeight: 1536,
            maxFileSize: 7000000,
            previewMaxWidth: 120,
            previewMaxHeight: 120,
            previewCrop: true
        }).on('fileuploadadd', function (e, data) {
            $('#progress').show();

            data.context = $('<div class="fileUploadList" />').appendTo('#files');

            $.each(data.files, function (index, file) {
                var node = $('<div class="fileUploadListItem" />');
                node.appendTo(data.context);
            });
        }).on('fileuploadprocessalways', function (e, data) {
            var index = data.index,
                file = data.files[index],
                node = $(data.context.children()[index]);
            if (file.preview) {
                node
                    .prepend('<br>')
                    .prepend(file.preview);
            }
            if (file.error) {
                node
                    .append('<br>')
                    .append($('<span class="text-danger"/>').text(file.error));
            }
            if (index + 1 === data.files.length) {
                data.context.find('button')
                    .text('Upload')
                    .prop('disabled', !!data.files.error);
            }
        }).on('fileuploadprogressall', function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }).on('fileuploaddone', function (e, data) {
            $.each(data.result.files, function (index, file) {
                if (file.url) {
                    var link = $('<a>')
                        .attr('target', '_blank')
                        .prop('href', file.url);
                    $(data.context.children()[index])
                        .wrap(link);
                } else if (file.error) {
                    var error = $('<span class="text-danger"/>').text(file.error);
                    $(data.context.children()[index])
                        .append('<br>')
                        .append(error);
                }
            });
            $('#progress').hide();
            $('.addFiles').hide();
        }).on('fileuploadfail', function (e, data) {
            $.each(data.files, function (index) {
                var error = $('<span class="text-danger"/>').text('File upload failed.');
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            });
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
    </script>

</body>
</html>
