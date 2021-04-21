<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>A Simple Page with CKEditor 4</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <!-- Make sure the path to CKEditor is correct. -->
   <script src="http://localhost/centrar_ckeditor/js/ckeditor/ckeditor.js"></script>

</head>

<body>
   <div class="container">
      <div class="row bg-warning vh-100 align-items-center justify-content-center">
         <div class="col-8">
            <form>
               <textarea name="" id="contenido" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor 4.
            </textarea>
               <script>
                  CKEDITOR.replace('contenido');
               </script>
            </form>
         </div>
      </div>
   </div>
</body>

</html>