<?php
$title = "Test";
$PorteFolioActif = true;
$content = "<h1>TEST</h1>";
ob_start();
?>
    <form action="test" method="post">
        <section class="container">
            <h2>TEST</h2>
            <label>Tell us your story:</label>
            <br>
            <br>
            <textarea id="default-editor">
                It was a dark and stormy night...
            </textarea>
            <button type="submit" class="btn  btn-primary">Submit</button>
        </section>
    </form>
    <script>
        tinymce.init({
            selector: 'textarea#default-editor',
            referrer_policy: 'origin',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ]
        });
    </script>
<?php
$content = ob_get_clean();

require('base.php');