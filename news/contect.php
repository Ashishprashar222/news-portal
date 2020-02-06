

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Host Programming</title>

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="style/blog.css" rel="stylesheet">

      <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </head>

  <body>

    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <a class="text-muted" href="#"> <div id="google_translate_element"></div></a>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">Online News portal</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="text-muted" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
            </a>
           
          </div>
        </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
         <a class="p-2 text-muted" href="index.php">Home</a>
          <a class="p-2 text-muted" href="category_page.php?single=World">World</a>
         
          <a class="p-2 text-muted" href="category_page.php?single=Technology">Technology</a>
          
          <a class="p-2 text-muted" href="category_page.php?single=Culture">Culture</a>
          <a class="p-2 text-muted" href="category_page.php?single=Business">Business</a>
          <a class="p-2 text-muted" href="category_page.php?single=Politics">Politics</a>
         
          <a class="p-2 text-muted" href="category_page.php?single=Science">Science</a>
          <a class="p-2 text-muted" href="category_page.php?single=Health">Health</a>
          <a class="p-2 text-muted" href="category_page.php?single=Style">Style</a>
          <a class="p-2 text-muted" href="contect.php">Contact Us</a>
          
        </nav>
      </div>

     <div class="card" style="width:100%; height:350px;" >
      <img class="card-img-top" src="https://content.thriveglobal.com/wp-content/uploads/2018/03/news-1.jpg" alt="Card image" height="350">
      <div class="card-img-overlay">
        <h4 class="card-title">News</h4>
        <p class="card-text">Online news portal</p>
       
      </div>
    </div>

           <div class="row mb-2">
    <?php
    include('db/connection.php');
     $query1 =mysqli_query($conn,"select * from news order by id desc limit 1,2 ");
      while($row=mysqli_fetch_array($query1)){
         $category=$row['category'];
         $date=$row['date'];
         $title=$row['title'];
         $thumbnail=$row['thumbnail'];

      

    ?>

        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
             
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary"><?php echo $category ; ?></strong>
              <h3 class="mb-0">
                <a class="text-dark" href="single_page.php?single=<?php echo $row['id']; ?> "><?php echo $title; ?></a>
              </h3>
              <div class="mb-1 text-muted"><?php echo $date; ?></div>
            
              <a href="single_page.php?single=<?php echo $row['id']; ?> ">Continue reading</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" src="images/<?php echo $thumbnail;?>" alt="Card image cap" width="150">
          </div>
        </div>
      <?php } ?>
        
    </div>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            Contact Us
          </h3>


          <div class="blog-post">
     <form action="contect.php" method="post" class="needs-validation" novalidate>
      <div class="form-group">

    <label for="uname">Enter Your Name:</label>
    <input type="text" class="form-control" id="uname" placeholder="Enter Your Name" name="name" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group">
    <label for="pwd">Email:</label>
    <input type="email" class="form-control" id="pwd" placeholder="Enter email" name="email" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
 <div class="form-group">
  <label for="comment">Comment:</label>
  <textarea name="comment" class="form-control" rows="5" id="comment"></textarea>
</div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<?php
 include('db/connection.php');

 if (isset($_POST['submit'])) {
  $name=$_POST['name'];
  $email=$_POST['email'];
  $comment=$_POST['comment'];

  $query=mysqli_query($conn,"insert into comment(name,email,comment)values('$name','$email','$comment') ");
  if ($query) {
    echo "<script>alert('your comment has been send ')";
    
  }else{
    echo "Please try again";

  
  }
 }



?>

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>


           
          </div><!-- /.blog-post -->
  
        
        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">News Portal is a collection of<em> innovative and powerful news brands</em> that deliver compelling, diverse and visually engaging stories on your platform of choice.</p>
          </div>

           <div class="p-3">
            <h4 class="font-italic">Calender</h4>
            <ol class="list-unstyled mb-0">
              
              <li><a href="calender/calendar 2020">calender 2020</a></li>
              <li><a href="calender/december">December 2019</a></li>
              <li><a href="calender/november">November 2019</a></li>
              <li><a href="calender/october">October 2019</a></li>
              <li><a href="calender/september">September 2019</a></li>
              <li><a href="calender/august">August 2019</a></li>
              <li><a href="calender/july">July 2019</a></li>
              <li><a href="calender/june">June 2019</a></li>
              <li><a href="calender/may">May 2019</a></li>
              <li><a href="calender/april">April 2019</a></li>
            </ol>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="https://www.instagram.com/accounts/login/?hl=en">instagram</a></li>
              <li><a href="https://twitter.com/hashtag/login?lang=en">Twitter</a></li>
              <li><a href="https://en-gb.facebook.com/login/">Facebook</a></li>
            </ol>
          </div>
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main><!-- /.container -->

    <footer class="blog-footer">
      <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>
