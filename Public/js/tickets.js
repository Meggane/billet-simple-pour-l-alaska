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
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                    var file = this.files[0];
                    var reader = new FileReader();

                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                    reader.readAsDataURL(file);
                };
                input.click();
            }
        });
    }
}

let tickets = new Tickets();
tickets.insertTicket();