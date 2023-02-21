<?php
    $title = "Accueil";

    ob_start();
?>

<section class="container">
        
    <h1>Bienvenue sur mon site MVC</h1>
    <p>Voici la liste des utilisateurs :</p>

    <?php
        
        while($utilisateur = $requete->fetch()) {
    
    ?>
        <p><b><?= $utilisateur['pseudo'] ?> : <?= $utilisateur['email'] ?></p>
    <?php
        }
    ?>

</section>
    <form action="test" method="post">
        <section class="container"
        <h2>TEST</h2>
        <label for="story">Tell us your story:</label>
        <br>
        <br>
        <!--
        <textarea id="default-editor">
            It was a dark and stormy night...
        </textarea>-->
        <tinymce-editor
                api-key="no-api-key"
                height="500"
                menubar="false"
                toolbar="undo redo | blocks | bold italic backcolor |
        alignleft aligncenter alignright alignjustify |
        bullist numlist outdent indent | removeformat | help"
                content_style="body
      {
        font-family:Helvetica,Arial,sans-serif;
        font-size:14px
      }"
        >

            <!-- Adding some initial editor content -->
            &lt;p&gt;Welcome to the TinyMCE Web Component example!&lt;/p&gt;

        </tinymce-editor>
        <button type="submit" class="btn  btn-primary">Submit</button>
    </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-webcomponent@2/dist/tinymce-webcomponent.min.js"></script>
    <!--<script>
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
    </script>-->


<?php
    $content = ob_get_clean();

    require('base.php');
?>