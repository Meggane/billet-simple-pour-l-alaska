class Tickets {
    insertTicket() {
        tinyMCE.init({
            mode: "exact",
            elements: "content_insert_ticket",
            plugins: [
                "advlist autolink lists link image charmap print preview",
                "searchreplace code fullscreen quickbars",
                "media table paste imagetools wordcount help"
            ],
            toolbar: "insertfile undo redo | styleselect | fontselect | fontsizeselect | bold italic underline | forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tiny.cloud/css/codepen.min.css'
            ],
            paste_data_images: true,
            image_title: true,
            image_description: false,
            file_picker_types: "image",
            imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions",
            images_upload_handler: function (blobInfo, success, failure) {
                let xhr, formData;

                xhr = new XMLHttpRequest();
                xhr.open('POST', 'upload.php');

                xhr.onload = function() {
                    let json;

                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.location);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);
            },
        });
    }
}

let tickets = new Tickets();
tickets.insertTicket();