<!DOCTYPE html>
<html lang="en">
   <?php
   $directory = 'storage/ComposerImage/';

   //get all image files with a .jpg extension.
   $images = glob('' . $directory . '*.png');

   // get random image index
   $rand_img = array_rand($images, 1);

// display the image
?>
   <head>
      <title>Crud Project</title>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet"  href="/style.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
   <body>
      <header>
         <div class="header">
            <nav class="navabr navbar-style" >
               <div class="container" >
                  <div class="navbar-header">
                     <img  src="{{$images[$rand_img]}}" width = 100px alt="" />
                  </div>
                  <h1>Crud Posts Project</h1>
                  <ul class="nav navbar-nav navbar-right">
                     <li><a href="#">Home</a></li>
                     <li><a href="#">About us</a></li>
                     <li><a href="#">Contact us</a></li>
                     <li><a href="#">Support</a></li>
                  </ul>
                  <button type="button" class="btn btn-primary" name= "buttonadd" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add New Post</button>
               </div>
         </div>
         </nav>
         </div>
      </header>
      <div>
      <h1>Table of the Contents of database</h1>
         <!-- Start of the post model -->
         <form action ="/post" method ="POST" enctype = "multipart/form-data">
            @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label for="recipient-name" class="col-form-label">Tile:</label>
                           <input name = "title"type="text" class="form-control" id="recipient-name" required>
                        </div>
                        <div class="form-group">
                           <label for="message-text" class="col-form-label">Blog:</label>
                           <textarea name ="blog" class="form-control" id="message-text" required></textarea>
                        </div>
                        <!-- Checkbox -->
                        <div class =form-group>
                           <label class="Checkbox1" for="Checkbox1">
                           active
                           </label>
                           <input
                              name = "check"
                              value = 1
                              type="checkbox"
                              id="check"
                              required
                              />
                        </div>
                        <!-- image button -->
                        <div class =form-group>
                           <input name = "image" type="file" class="btnImageFile" required >
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button  type= "submit" class="btn btn-primary">Make a POST</button>
                     </div>
                  </div>
               </div>
            </div>
         </form>
         <!-- End of the post model -->
      </div>
      <form >
         <div>
         </div>
         <div class="container text-center" >
         <div class="row ">
            <div class="col-12  ">
               <table class="table table-bordered">
                  <thead>
                     <tr >
                        <th scope="col">Title</th>
                        <th scope="col">Active</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                     </tr>
                  </thead>
                  @foreach($posts as $post)
                  <tbody>
                     <tr>
                        <th scope="row">{{$post->title}}</th>
                        @if($post->active == 1)
                        <td>✅</td>
                        @else
                        <td>❌</td>
                        @endif
                        <td >
                           <img hight = 100px width = 50px src="{{'storage/images/'.$post->image}}"/>
                        </td>
                        <td >
                           <a href="/edit/{{ $post->id }}" class="btn btn-primary">Edit</a>
                           <a href="/postView/{{$post->id}}" class="btn btn-success">View</a>
                           <a href="delete/{{$post->id}}" class="btn btn-danger">Delete</a>
                        </td>
                     </tr>
                  </tbody>
                  @endforeach
               </table>
            </div>
         </div>
      </form>
   </body>
</html>