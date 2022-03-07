ClassicEditor.create(document.querySelector('.myckeditor5'))
        .then(editor => {
                console.log(editor);
        })
        .catch(error => {
                console.error(error);
        });
