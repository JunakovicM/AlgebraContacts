<?php

require_once 'core/init.php';


Helper::getHeader('Algebra Contacts', 'main-header');

$validation = new Validation();

if(Input::exists()){
    
    $validate = $validation->check([
        'name' => [
            'required' => true,
            'min' => 2,
            'max' => 25,

        ],
        'username'     => [
            'required' =>  true,
            'min'      => 2,
            'max'      => 25,
            'unique'   => 'users'

        ],
        'password' => [
            'required' => true,
            'min'      => 8
            /*
            DZ -password mora imati min 1 veliko slovo,
            min jedno malo slovo
            i min jedan broj
            */

        ],
        'confirm_password' => [
            'required' => true,
            'matches'  => 'password'
        ]

    ]);

    
    
   


}

?>

<div class="row">
   <div class="col-md-4 offset-4"></div>
    <div class="panel panel-primary">
        <div class="panel-heading">
       <h3 class="panel-title">Create an account</h3>
    </div>
    <div class="panel-body">
      <form method="POST">
       <div class="form-group <?php echo ($validation->hasError('name')) ? 'has-error' : '' ; ?>">
        <label for="name" class="control-label">Name*</label>
        <input type="text" class="form-control" id="name"
         name="name" placeholder="Enter your name" 
         value="<?php echo Input::get('name') ?>">
         <?php echo ($validation->hasError('name')) ? '<p 
         class="text-danger"> '.$validation->hasError
         ('name'). '</p>' : '' ; ?>
      </div>
      <div class="form-group">
        <label for="name" class="control-label">Username*</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username here">
      </div>
      <div class="form-group">
        <label for="password" class="control-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password here">
      </div>
      <div class="form-group">
        <label for="confirm_password" class="control-label">Confirm_Password</label>
        <input type="password" class="form-control" id="confrim_password" name="confirm_password" placeholder="Enter your password again">
     </div>
     <button type="submit" class="btn btn-primary">Create an acount</button>
        </form>
      </div>
    </div>
  </div>
</div>



    
<?php

Helper::getFooter();

?>