z<?php
//DELETE USER
global $db;
if(isset($_POST['delete_user']) && !empty($_POST['delete_user'])){
    $id = $_POST['delete_user'];
    $sql = "SELECT * FROM users WHERE id= '".$id."'";
    $result = $db->query($sql);
    
    try{
        if ($result->rowCount() != 1) {
            throw new Exception ('Invalid User!');      
        }
        $db->query("DELETE FROM users WHERE id= '".$id."'"); 
         ?><p class="alert">User deleted!</p><?php
    }catch (Exception $e){
        ?><p class="alert alert-error"><?=$e->getMessage();?></p><?php
        
    }      
}

//EDIT USER CARD
if(isset($_POST['edit_user']) && !empty($_POST['edit_user'])){
    $id = $_POST['edit_user'];
    $sql = "SELECT * FROM users WHERE id= '".$id."'";
    $query = $db->prepare($sql);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);        
    if (isset($user)){?>
        <div class="grey-background"></div>
        <div class="edit-user-card">
            <p class="id">ID#_<?= $user["id"]; ?></p>                
            <form method="POST" name="edit_user_data" action=""> 
                <input type="hidden"  name="id_edit" value="<?=$user["id"];?>">
                <label for="username_edit">USERNAME</label></br>          
                <input type="text"  name="username_edit" value="<?=$user["username"];?>"></br>
                <label for="email_edit">EMAIL</label></br>          
                <input  type="text"  name="email_edit" value="<?=$user["email"];?>"></br>
                <label for="admin_edit">TYPE</label></br>    
                <select name="admin_edit">
                    <option value="0" <?php if (isset($user["admin"]) && $user["admin"] == '0') { ?>selected="true" <?php }; ?>>User</option>
                    <option value="1" <?php if (isset($user["admin"]) && $user["admin"] == '1') { ?>selected="true" <?php }; ?>>Admin</option>  
                </select>                
                <a href="/admin.php?menu=users">Cancel</a>              
                <button type="submit">Valide</button>               
            </form>
        </div> 
                      
   <?php }  
}  

//EDIT USER REQUEST
if(isset($_POST['username_edit']) || isset($_POST['email_edit']) || isset($_POST['admin_edit'])){
    $id= $_POST['id_edit'];
    $username = $_POST['username_edit'];
    $email = $_POST['email_edit'];
    $admin = $_POST['admin_edit'];
    
    try{       
        if(empty($username) || empty($email)){
            throw new Exception ('Error: empty field!');            
        }
        $sql = "UPDATE users SET username='$username', admin='$admin',  email='$email' WHERE id=$id";
        $query = $db->prepare($sql);
        $query->execute();        
    ?><p class="alert">Successful edition!</p><?php
    }catch (Exception $e){
        ?><p class="alert alert-error"><?=$e->getMessage();?></p><?php
    }
}

//IMPORT USERS LIST
$sql = "SELECT * FROM users";
$result = $db->query($sql);
?>

<div class="table-header-users">
    <ul>       
        <li>User name</li>
        <li>Email</li>
        <li>Admin</li>
        <li>Delete user</li>
        <li>Edit user</li>        
    </ul>
</div>

<?php while ($user = $result->fetch()) { ?>
    <div class="display_users">           
        <p class="username"><?= $user["username"]; ?></p>
        <p class="email"><?= $user["email"]; ?></p>
        <p class="type"><?= $user["admin"]; ?></p>
        <form method="POST" action="">            
            <button class="delete" type="submit"  name="delete_user" value="<?=$user["id"];?>">Delete</button>
        </form>
        <form method="POST" action="">
            <button class="edit" type="submit"  name="edit_user" value="<?=$user["id"];?>">Edit</button>
        </form>        
     </div>
<?php }?>