ClassicEditor
    .create( document.querySelector( '.editor' ), {

        licenseKey: '',



    } )
    .then( editor => {
        window.editor = editor;




    } )
    .catch( error => {
        console.error( 'Oops, something went wrong!' );
        console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
        console.warn( 'Build id: lp0vpe6exd3-2ymwfqz77b1u' );
        console.error( error );
    } );
