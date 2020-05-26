tinymce.init({
    selector: '#img-wysiswg',
    plugins: "image",
    menubar: false,
    toolbar: "image",
    height: '19vh',
    content_style: "body { font-size: 110%; }",
    branding: false    
});

tinymce.init({
    selector: '#textarea-wysiswg',
    menubar: false,
    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
              'bullist numlist outdent indent | print preview media fullpage | fontsizeselect',
    fontsize_formats: '40px',  
    plugins: "advlist link image lists",
    content_style: "body { font-size: 120%; font-family: 'Open sans', sans-serif; }",
    branding: false
});

